import { editState } from "../states/editState.js";
import { getEditView } from "../ajax/cms_edit_ajax.js";
import {
    updateTableData,
    deleteTableData,
    copyTableData,
} from "../ajax/cms_table_ajax.js";
import {
    summernoteSetting,
    colorPickerSetting,
    datePickerSetting,
    timePickerSetting,
} from "./editSetting.js";
import VerifyController from "../verify/VerifyContorller.js";

function debounce(func, delay = 250) {
    let timer = null;
    return function (...args) {
        let context = this;
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

/**
 * @param {HTMLElement} editTarget
 */
export function EditController(
    editTarget,
    {
        afterSave = (response) => {
            return Promise.resolve(true);
        },
        afterDelete = (response) => {
            return Promise.resolve(true);
        },
        afterCopy = (response) => {
            return Promise.resolve(true);
        },
        afterCreate = (response) => {
            return Promise.resolve(true);
        },
        afterSearch = (ajaxData) => {
            return Promise.resolve(true);
        },
    } = {}
) {
    var editArea = $(editTarget);
    var verifyControl = new VerifyController(editArea);
    var editOriginalData;
    editState.editArea = editArea;

    return {
        clickEditButton,
        clickCreateButton,
        clickSearchButton,
        clickBatchButton,
        isContent,
        isSonContent,
        closeContent,
        clearEditArea,
        openContent,
        hasAuth
    };

    function refresh(formKey = null) {
        return new Promise(async (res) => {
            try {
                editState.editing = true;
                let response = await getEditView({
                    action: editState.action,
                    ids: editState.ids,
                    isSonContent: editState.isSonContent,
                    formKey,
                });
                editArea.html(response.view);
                editArea.find(".editorBody").scrollbar();

                $(editArea.find(".radio_area label.active").get().reverse()).map(function () {
                    radio_area_set(this);
                });

                if (editArea.find('input[name*="[url_name]"]')) {
                    let models = editArea.find('input[name*="[url_name]"]').get().map(function (url_el) {
                        return $(url_el).attr('name').replace('[url_name]', '');
                    });
                }
                divToForm();
                tabInit();
                openContent();

                let script = document.createElement('script');
                script.text = response.jscode;
                document.getElementsByTagName('head')[0].appendChild(script).parentNode.removeChild(script);

                buttonInit();

                switch (editState.action) {
                    case "batch":
                        editOriginalData = formatDataBatch();
                        break;
                    case "search":
                        editOriginalData = formatDataSearch();
                        break;
                    default:
                        editOriginalData = formatData();
                }

                res(true);
                editState.editing = false;
            } catch (e) {
                console.log(e);
                res(false);
            }
        });
    }

    /**
     * @param { JQuery < HTMLElement >} parent
     */
    function divToForm(parent = null) {
        parent = parent == null ? editArea : parent;
        return parent.find("div.covertoform").map(function () {
            let child = $(this);
            let formEl = document.createElement("form");
            formEl.innerHTML = this.innerHTML;
            for (const attr of this.attributes) {
                formEl.setAttribute(attr.name, attr.value);
            }
            $(this).parent().append(formEl);
            divToForm($(formEl));
            child.remove();
            return formEl;
        });
    }

    /**
     * @param {JQuery<HTMLElement>} target
     * @returns
     */
    function divToFormReverse(target) {
        return target.find("div.covertoform").map(function () {
            let child = $(this);
            let formEl = document.createElement("form");
            formEl.innerHTML = this.innerHTML;
            for (const attr of this.attributes) {
                formEl.setAttribute(attr.name, attr.value);
            }
            $(this).parent().append(formEl);
            child.remove();
            return formEl;
        });
    }

    async function clickSearchButton(ids) {
        return new Promise(async (res) => {
            editState.action = "search";
            if ($(".cmsDetailAjaxSearch").html() == "") {
                editState.editing = true;
                editState.isContent = false;
                editState.ids = ids;
                let response = await refresh();
                editState.editing = false;
                res(response);
            } else {
                res("");
                openContent();
            }
        });
    }
    async function clickBatchButton(ids) {
        return new Promise(async (res) => {
            editState.editing = true;
            editState.isContent = false;
            editState.action = "batch";
            editState.ids = ids;
            let response = await refresh();
            editState.editing = false;
            res(response);
        });
    }

    async function isContent(id) {
        editState.editing = true;
        editState.action = id == 0 ? "create" : "edit";
        editState.ids = [id];
        let response = await refresh();
        editState.isContent = true;
        editState.editing = false;
        return response;
    }

    async function isSonContent(id) {
        editState.editing = true;
        editState.action = "sonEdit";
        editState.ids = [id];
        editState.isSonContent = true;
        let response = await refresh();
        editState.isContent = true;
        editState.editing = false;
        return response;
    }

    function clickEditButton(id) {
        return new Promise(async (res) => {
            editState.editing = true;
            editState.action = "edit";
            editState.ids = [id];
            let response = await refresh();
            editState.editing = false;
            res(response);
        });
    }

    function clickCreateButton() {
        return new Promise(async (res) => {
            editState.editing = true;
            editState.action = "create";
            editState.ids = [0];
            let response = await refresh();
            editState.editing = false;
            res(response);
        });
    }
    function getUseFiles() {
        let files = [];
        $('.cmsDetailAjaxArea .editorContent .summernote-area').each(function () {
            const $this = $(this);
            const $thisForm = $this.closest('form');
            if ($thisForm.hasClass("covertoform")) {
                //子層若刪除則跳過
                if ($thisForm.children('.wait-save-box').children('input').val() == 1) return true;
            }

            let summernoteData = '';
            if ($(this).hasClass('actived')) {
                summernoteData = $.parseHTML($(this).summernote('code'))
            } else {
                summernoteData = $.parseHTML($(this).val());
            }
            $(summernoteData).find('img').each(function () {
                let src = $(this).attr('id');
                if (src) {
                    files.push(src);
                }
            });
        });
        $(".cmsDetailAjaxArea .editorContent .open_fms_lightbox.has_img").each(function () {
            const $this = $(this);
            const $thisForm = $this.closest('form');
            if ($thisForm.hasClass("covertoform")) {
                //子層若刪除則跳過
                if ($thisForm.children('.wait-save-box').children('input').val() == 1) return true;
            }

            const src = $this.find('input').val();
            if (src) files.push(src);
        });
        $(".cmsDetailAjaxArea .editorContent .file-picker").each(function () {
            const $this = $(this);
            const $thisForm = $this.closest('form');
            if ($thisForm.hasClass("covertoform")) {
                //子層若刪除則跳過
                if ($thisForm.children('.wait-save-box').children('input').val() == 1) return true;
            }

            const src = $this.find('[class*="filepicker_value"]').val() || '';
            if (src) files.push(src);
        });
        return files;
    }
    function formatData(checkSelect = false) {
        if (checkSelect) {
            $(".cmsDetailAjaxArea .editorContent select").each(function () {
                let _this = $(this);
                if (_this.prop("multiple") === true) {
                    if (_this.val().length == 0) {
                        _this.parent().append(
                            "<input class='save_befor_del' type='hidden' name='" +
                            _this.attr("name").replace("[]", "") +
                            "' value=''>"
                        );
                    }
                }
            });
            //圖片集不存空值
            $('.picture_box.img_list .open_fms_lightbox:not(.has_img) input').prop('disabled', true);
        }
        let json1 = $(
            ".cmsDetailAjaxArea .editorContent > form"
        ).serializeJSON();
        if (json1[json1.modelName] == undefined) json1[json1.modelName] = {};
        let data1 = json1[json1.modelName];
        let child = $(".cmsDetailAjaxArea .editorContent li.son-table > form")
            .get()
            .map(function (el) {
                let json2 = $(el).serializeJSON();
                let data2 = json2[json2.modelName];
                let isDelete = data2.wait_save_del ?? 0;
                delete data2.wait_save_del;
                return {
                    ids: [parseInt(data2.id) || 0],
                    data: data2,
                    parentKey: json2.SecondIdColumn,
                    modelName: json2.modelName,
                    delete: isDelete,
                    child: $(el)
                        .find("ul.son-table > form")
                        .get()
                        .map(function (el) {
                            let json3 = $(el).serializeJSON();
                            let data3 = json3[json3.modelName];
                            let isDelete = data3.wait_save_del ?? 0;
                            delete data3.wait_save_del;
                            return {
                                ids: [parseInt(data3.id) || 0],
                                data: data3,
                                parentKey: json3.SecondIdColumn,
                                modelName: json3.modelName,
                                delete: isDelete,
                                child: [],
                            };
                        }),
                };
            });
        if (checkSelect) {
            $(".save_befor_del").remove();
        }
        //圖片集不存空值
        $('.picture_box.img_list .open_fms_lightbox:not(.has_img) input').prop('disabled', false);
        return {
            ids: editState.ids,
            data: data1,
            modelName: json1.modelName,
            parentKey: null,
            child,
            delete: 0,
        };
    }
    function formatDataBatch() {
        let json1 = $(
            ".cmsDetailAjaxArea .editorContent > form"
        ).serializeJSON();
        let data1 = json1[json1.modelName];
        let batchSelect = json1["batch_" + json1.modelName];
        for (const key of Object.keys(batchSelect)) {
            if (batchSelect[key] == "" || batchSelect[key] == "0") {
                delete data1[key];
            }
        }
        return {
            ids: editState.ids,
            data: data1,
            modelName: json1.modelName,
            parentKey: null,
            child: [],
            delete: 0,
        };
    }
    function formatDataSearch() {
        let json1 = $("#search").serializeJSON();
        let is_select2 = $("#search select.____select2.actived.select2-hidden-accessible").attr("search-type");
        let data1 = json1[json1.modelName];
        let batchSelect = json1["batch_" + json1.modelName];
        for (const key of Object.keys(batchSelect)) {
            if (batchSelect[key] == "" || batchSelect[key] == "0") {
                delete data1[key];
                if (key.indexOf("_range_start") >= 0) {
                    delete data1[key.replace("_range_start", "_range_end")];
                }
                delete data1[key + "_target"];
            }
        }
        return {
            ids: editState.ids,
            data: data1,
            modelName: json1.modelName,
            parentKey: null,
            child: [],
            delete: 0,
            is_select2,
        };
    }
    function buttonInit() {
        /** @param {JQuery<HTMLElement>} target */
        function sonTableInit(target) {
            /**
             * 移動到該筆資料
             */
            function anchorToList() {
                const sonTable = $(this)
                    .parents(".frame")
                    .first()
                    .find("> .son-table");
                if (!$(this).hasClass('no_anchor')) {
                    if (sonTable.hasClass("tabulation_body")) {
                        const tableID = $(this).attr("data-table");
                        const table = $(this)
                            .parents(".frame")
                            .first()
                            .find(`> .son-table[data-table="${tableID}"]`);
                        $(".editorBody.scroll-content").animate({
                            scrollTop:
                                table.find("> form").last().position().top - 38,
                        });
                    } else {
                        //第三層
                        $(".editorBody.scroll-content").animate({
                            scrollTop:
                                sonTable.parents("form").first().position().top +
                                sonTable.find("> form").last().position().top -
                                80,
                        });
                    }
                } else {
                    $(this).removeClass('no_anchor');
                }
            }
            target.find(".CopySonTableDataGroup").on("click", function () {
                if (editState.changing) return;
                const isThree = $(this).hasClass("threeTableCopy");
                if (
                    (!isThree &&
                        $(this)
                            .closest(".composite_btn")
                            .closest("li")
                            .next()
                            .next(".son-table")
                            .find("form.chosen").length === 0) ||
                    (isThree &&
                        $(this)
                            .closest("ul")
                            .next()
                            .next(".son-table")
                            .find("form.chosen").length === 0)
                )
                    return;

                editState.changing = true;

                if (isThree) {
                    $(this)
                        .closest("ul")
                        .next()
                        .next(".son-table")
                        .each(function () {
                            copyFrom.call(this);
                        });
                } else {
                    console.log("copy!!!");
                    $(this)
                        .closest(".composite_btn")
                        .closest("li")
                        .next()
                        .next(".son-table")
                        .each(function () {
                            copyFrom.call(this);
                        });
                }

                FormUnitInit();
                editState.changing = false;

                function copyFrom(formSelect = ".chosen", prepend = null) {
                    let rank = prepend == null ? Math.max.apply(null, [...$(this).find(">form").get().map(function (el) { return (parseInt(el.querySelector('input[name$="[w_rank]"]')?.value) || 0); }), 0,]) : 0;
                    $(this).find(" > form" + formSelect).each(function () {
                        const direction = prepend == null;
                        const currentPrepend = prepend == null ? $(this).closest(".son-table") : $(prepend);
                        const origin = this;
                        const originJson = $(origin).serializeJSON();
                        const originData = originJson[originJson.modelName];
                        originData.id = 0;
                        originData.w_rank = rank === 0 ? originData.w_rank : ++rank;

                        const copy = document.createElement("div");

                        for (const attr of origin.attributes) {
                            copy.setAttribute(attr.name, attr.value);
                            attr.name === "data-copy" && (copy.innerHTML = attr.value);
                        }
                        currentPrepend.append(copy);
                        copy.classList.remove("active");
                        const JQueryCopy = direction ? divToFormReverse(currentPrepend) : divToForm(currentPrepend);

                        $(this).find(".son-table").each(function (index) {
                            copyFrom.call(this, "", JQueryCopy.find(".son-table").get(index));
                        });

                        for (const key of Object.keys(originData)) {
                            let input = JQueryCopy.find(`[name$="[${key}]"]`).eq(0);
                            if (!JQueryCopy.hasClass('three-item') && input.closest('.three-item').length > 0) {
                                continue;
                            }
                            input.attr("value", originData[key]).val(originData[key]);
                            JQueryCopy.find(".AutoSet_".key).html();

                            let parentElement = input.get(0)?.parentElement;
                            if (parentElement?.classList.contains("radio_btn_switch") && originData[key] == 1) {
                                parentElement?.classList.add("on");
                            } else {
                                parentElement?.classList.remove("on");
                            }

                            const img = input.siblings("img");
                            if (img.length > 0) {
                                const src = $(origin).find(`[name$="[${key}]"]`).siblings("img").attr("src");
                                if (src != null && src != "javascript:;" && src.length > 0) {
                                    input.closest(".frame.open_fms_lightbox").addClass("has_img");
                                    img.attr("src", src);
                                    const info = $(origin).find(`[name$="[${key}]"]`).closest(".frame").find(".info_detail").find("p");
                                    input.closest(".frame").find(".info_detail").find("p").each(function (index) {
                                        this.innerHTML = info.eq(index).html();
                                    });
                                } else {
                                    input.closest(".frame.open_fms_lightbox").removeClass("has_img");
                                }
                            }
                            const img_article_auto = input.closest('form').find('form:not(.three-item) .AutoSet_article_img');
                            if (img_article_auto.length > 0) {
                                const src = $(origin).find(`[name$="[${key}]"]`).siblings("img").attr("src");
                                if (src != null && src != "javascript:;" && src.length > 0) {
                                    img_article_auto.attr("src", src);
                                }
                            }

                            const file = input.closest(".file-picker");
                            if (file.length > 0) {
                                const src = $(origin).find(`[name$="[${key}]"]`);
                                const info = src.closest(".file-picker").find("input");
                                file.find("input").each(function (index) {
                                    if (index === 2) {
                                        $(this).attr("data-src", info.eq(index).attr("data-src")).attr("data-title", info.eq(index).attr("data-title"));
                                    } else {
                                        const val = info.eq(index).val();
                                        $(this).val(val).attr("value", val);
                                    }
                                });
                            }
                        }

                        if (origin.querySelector(".list_checkbox").checked) {
                            origin.querySelector(".list_checkbox").click();
                            JQueryCopy.get(0).querySelector(".list_checkbox").parentElement.classList.add("show");
                            JQueryCopy.get(0).querySelector(".list_checkbox").checked = true;
                        }

                        JQueryCopy.find(".DataSync").map(function (index, el) {
                            DataSync(el);
                        });
                        components.select2(JQueryCopy.find(".DataSyncSelect"));
                        JQueryCopy.find(".DataSyncSelect").map(function (index, el) {
                            DataSyncSelect(el);
                        });
                        JQueryCopy.find(".radio_area").map(function () {
                            let radio_area_val = $(this).find('input').val();
                            $(this).find('label').removeClass('active');
                            $(this).find('label[data-value="' + radio_area_val + '"]').addClass('active');
                        });
                        $(JQueryCopy.find(".radio_area label.active").get().reverse()).map(function () {
                            radio_area_set(this);
                        });
                        if (JQueryCopy.find('.AutoSet_article_style').length > 0) {
                            JQueryCopy.find('.AutoSet_article_style').html($(origin).find('.AutoSet_article_style').html());
                            JQueryCopy.find('.article_img').html($(origin).find('.article_img').html());
                            JQueryCopy.find('.list_box .s_img').first().html($(origin).find('.s_img').first().html());
                        }
                        sonTableInit(JQueryCopy);
                    });
                }
            });
            target.find(".addValueInTable").on("click", function () {
                if (editState.changing) return;
                editState.changing = true;
                const self = $(this);
                const isThree = self.hasClass("addInThirdTb");

                if (isThree) {
                    $(this)
                        .closest(".table_head")
                        .next("ul")
                        .removeAttr("style");
                } else {
                    const empty = $(this)
                        .closest(".composite_btn")
                        .closest("li")
                        .next(".emptyContent");
                    empty?.next(".tabulation_head").removeAttr("style");
                    empty?.remove();
                }

                const list = isThree
                    ? $(this).closest("ul").next().next(".son-table")
                    : $(this)
                        .closest(".composite_btn")
                        .closest("li")
                        .next()
                        .next(".son-table");

                const rank = Math.max.apply(null, [
                    ...list
                        .find(" > form")
                        .get()
                        .map(function (el) {

                            return (el.querySelector('input[name$="[w_rank]"]')?.value || 0);
                        }),
                    0,
                ]);
                const blank = document.createElement("div");
                blank.innerHTML = self.attr("data-content");
                const form = blank.querySelector("form");
                if (form.querySelector('input[name$="[w_rank]"]')) {
                    form.querySelector('input[name$="[w_rank]"]').value = parseInt(rank) + 1;
                }
                list.append(form);

                FormUnitInit();
                sonTableInit($(form));
                $($(form).find(".radio_area label.active").get().reverse()).map(function () {
                    radio_area_set(this);
                });
                editState.changing = false;
            });
            target
                .find(".CopySonTableDataGroup")
                .on("click", debounce(anchorToList));
            target.find(".addValueInTable").on("click", debounce(anchorToList));
        }

        sonTableInit(editArea);

        editArea.find(".editSentBtn").on("click", async function () {
            if (editState.editing) return;
            editState.editing = true;
            if (!(await verifyControl.saveVerify())) {
                editState.editing = false;
                return;
            }
            //判斷資料是否有更動 editOriginalData

            let ajaxData = "";
            if (editState.action === "batch") {
                if (
                    !confirm(
                        "如有資料已審核通過，批次修改編輯則需再次送出審核申請，是否繼續操作?"
                    )
                ) {
                    editState.editing = false;
                    return;
                }
                try {
                    ajaxData = formatDataBatch();
                    const response = await updateTableData(ajaxData);
                    await afterSave(response);
                    if (!CheckOnly(editOriginalData, ajaxData)) {
                        //$(".notify_admin").removeClass("hide");
                    } else {
                        closeContent();
                        clearEditArea();
                    }
                } catch (e) {
                    console.log(e);
                    alert("server error.");
                }
                editState.editing = false;
                return;
            }
            if (editState.action === "search") {
                try {
                    ajaxData = formatDataSearch();
                    sessionStorage.removeItem(
                        "page_" + location.href.split("/").pop()
                    );
                    sessionStorage.setItem(
                        "Search_" + location.href.split("/").pop(),
                        JSON.stringify(ajaxData)
                    );
                    ajaxData["search"] = true;
                    await afterSearch(ajaxData);
                    closeContent();
                } catch (e) {
                    console.log(e);
                    alert("server error.");
                }
                editState.editing = false;
                return;
            }
            if (editState.action === "create" || editState.action === "edit" || editState.action === "sonEdit") {
                const is_reviewed = this.getAttribute("data-reviewed");
                const reviewed_pass = this.getAttribute("data-reviewed-pass");
                if (reviewed_pass == "0" && is_reviewed == "1") {
                    if (
                        !confirm(
                            "當前資料已審核通過，若您編輯則需再次送出審核申請，是否繼續操作?"
                        )
                    ) {
                        editState.editing = false;
                        return;
                    }
                } else {
                    if (!confirm("儲存目前編輯狀態?")) {
                        editState.editing = false;
                        return;
                    }
                }

                try {
                    //修正多選問題
                    ajaxData = formatData(true);
                    //取得該筆資料所有用到的檔案
                    ajaxData['UseFiles'] = getUseFiles();
                    if (editState.has_auth > 0) {
                        ajaxData['has_auth'] = editState.has_auth;
                    }
                    const response = await updateTableData(ajaxData);
                    if (editState.action === "edit") {
                        if (!editState.isContent) {
                            await afterSave(response);
                        }
                        updateEditArea(response);
                        //判斷是否只有更改is_visible & is_preview
                        if (!CheckOnly(editOriginalData, ajaxData)) {
                            //if (is_reviewed) $(".notify_admin").removeClass("hide");
                        }
                    }

                    if (editState.action === "create") {
                        if (!editState.isContent) {
                            await afterCreate(response);
                        }
                        editState.action = "edit";
                        editState.ids = response.ids;
                        updateEditArea(response);
                        await refresh(
                            $("li[data-form].active")?.attr("data-form")
                        );
                        //限制資料筆數
                        if ($(".createBtn").attr('data-max') != "" && $('.ag-center-cols-container>div').length >= $(".createBtn").attr('data-max')) {
                            $(".createBtn").closest('.btn-item').addClass('d-none');
                            $(".cloneBtn").addClass('d-none');
                        }
                    }
                    ajaxData = formatData();
                    editOriginalData = ajaxData;
                    // refresh();
                } catch (e) {
                    console.log(e);
                    alert(JSON.parse(e.responseText).message);
                }
                editState.editing = false;
            }
        });

        editArea.find(".cms-copy-btn").on("click", async function () {
            if (editState.changing) return;
            if (!confirm("複製 1 筆資料?")) return;
            editState.editing = true;
            try {
                const response = await copyTableData({
                    ids: editState.ids,
                    modelName: $(".editorContent > form").serializeJSON()
                        .modelName,
                });
                editState.ids = Object.keys(response);
                await afterCopy(response);
                await refresh($("li[data-form].active")?.attr("data-form"));
            } catch (e) {
                alert("server error.");
            }
            editState.editing = false;
        });

        editArea.find(".cms-delete-btn").on("click", async function () {
            if (editState.changing) return;
            if (!confirm("刪除 1 筆資料?")) return;
            editState.editing = true;
            try {
                const response = await deleteTableData({
                    ids: editState.ids,
                    modelName: $(".editorContent > form").serializeJSON()
                        .modelName,
                });
                await afterDelete(response);
                closeContent();
                clearEditArea();
                //限制資料筆數
                if ($(".createBtn").attr('data-max') != "" && $('.ag-center-cols-container>div').length < $(".createBtn").attr('data-max')) {
                    $(".createBtn").closest('.btn-item').removeClass('d-none');
                    $(".cloneBtn").removeClass('d-none');
                }
            } catch (e) {
                alert("server error.");
            }
            editState.editing = false;
        });

        editArea.find(".cancel").on("click", function () {
            // let ajaxData = formatData();
            // if (JSON.stringify(editOriginalData) != JSON.stringify(ajaxData)){
            //     if (!confirm("您修改資料尚未存檔，若未存檔關閉，修改的資料將會遺失")){
            //         return false;
            //     }
            // }
            closeContent();
        });

        editArea.find(".notify_admin").on("click", function () {
            const self = $(this);
            console.log(editState.ids);
            if (confirm("是否通知管理者審核?")) {
                $.ajax({
                    url:
                        $(".base-url").val() +
                        "/Ajax/notify-admin/" +
                        $(".editorContent > form").serializeJSON().modelName,
                    type: "GET",
                    async: false,
                    data: {
                        action: self.attr("data-action"),
                        data_id: editState.ids,
                        menu_id: location.href.split("/").pop(),
                    },
                    success: function (data) {
                        if (self.attr("data-action") == "review") {
                            $(".review_info_push").addClass("active");
                        } else {
                            $(".review_info_del").addClass("active");
                        }
                        alert("已通知管理者審核");
                    },
                });
            }
        });
        editArea.find(".notify_admin_cancel").on("click", function () {
            if (confirm("是否取消審核?")) {
                const self = $(this);
                $.ajax({
                    url:
                        $(".base-url").val() +
                        "/Ajax/notify-admin/" +
                        $(".editorContent > form").serializeJSON().modelName,
                    type: "GET",
                    async: false,
                    data: {
                        cancel: true,
                        data_id: editState.ids,
                        menu_id: location.href.split("/").pop(),
                    },
                    success: function (data) {
                        $(".review_info").removeClass("active");
                    },
                });
            }
        });

        /** @param {JQuery<HTMLElement>} list */
        function CheckOnly(obj1, obj2) {
            let obj1_temp = JSON.parse(JSON.stringify(obj1));
            let obj2_temp = JSON.parse(JSON.stringify(obj2));
            delete obj1_temp.data.is_visible;
            delete obj1_temp.data.is_preview;
            delete obj2_temp.data.is_visible;
            delete obj2_temp.data.is_preview;
            if (JSON.stringify(obj1_temp) == JSON.stringify(obj2_temp)) {
                return true;
            }
            return false;
        }

        function updateEditArea(response) {
            editArea.find(".wait-save-box").each(function () {
                const self = $(this);
                if (self.hasClass("active")) {
                    self.parent().remove();
                }
            });

            let childCount = 0;
            let sonCount = 0;
            let childIds = [];
            let sonIds = [];
            response.child.map(function (child) {
                childIds.push(child.ids[0]);
                child.child.map(function (son) {
                    sonIds.push(son.ids[0]);
                });
            });

            $(".editorContent li.son-table > form").each(function () {
                let self = $(this);
                self.find('>.list_box>input[name$="[id]"]').val(
                    childIds[childCount]
                );
                childCount++;
                self.find("ul.son-table > form").each(function () {
                    let self = $(this);
                    self.find('>.list_box>input[name$="[id]"]').val(
                        sonIds[sonCount]
                    );
                    sonCount++;
                });
            });
        }
    }

    function tabInit() {
        editArea.find("li[data-form]").each(function () {
            let tab = $(this);
            let formKey = tab.attr("data-form");
            let form = $(`form#${formKey}`);
            if (tab.hasClass("opened")) {
                editState.formKey = formKey;
                FormUnitInit();
                form.addClass("active");
            } else {
                tab.one("click", () => {
                    editState.formKey = formKey;
                    addOpenedStatus(tab);
                });
                form.hide();
            }
            tab.on("click", () => {
                switchTab(form, tab);
                editState.formKey = formKey;
            });
        });

        /**
         * @param {JQuery<HTMLElement>} tab
         */
        function addOpenedStatus(tab) {
            FormUnitInit();
            tab.addClass("opened").addClass("wait-sent");
            $(".editorBody.scroll-content").animate({ scrollTop: 0 });
        }

        /**
         * @param {JQuery<HTMLElement>} form
         * @param {JQuery<HTMLElement>} tab
         */
        function switchTab(form, tab) {
            if (tab.hasClass("active")) return;
            editArea.find("form[id]").hide();
            editArea.find("li[data-form]").removeClass("active");
            form.show();
            tab.addClass("active");
            $(form.find(".radio_area label.active").get().reverse()).map(function () {
                radio_area_set(this);
            });
        }
    }

    function hasAuth(use_id = 0) {
        editState.has_auth = use_id;
    }

    //wade2025
    function closeContent() {
        editArea.find(".ajaxItem").removeClass("open")
        editArea.removeClass("open")

        setTimeout(() => {
            editArea.find(".ajaxItem").removeClass("active")
            editArea.removeClass("active")
        }, 350)

        editState.isContent = false;
        verifyControl.clearInputs();
    }

    //wade2025
    function openContent() {
        editArea.addClass("active")
        editArea.find(".ajaxItem").addClass("active")
        setTimeout(() => {
            editArea.addClass("open")
            editArea.find(".ajaxItem").addClass("open")
        }, 0)
        $(".editorBody.scroll-content").animate({ scrollTop: 0, }, 200);
    }

    function clearEditArea() {
        editArea.html("");
        editState.ids = [];
    }

    function FormUnitInit() {
        const selector = `#${editState.formKey} `;
        $(selector + "form:not(.actived)")
            .addClass("actived")
            .each(function () {
                const self = $(this);
                const copy = document.createElement("div");
                copy.innerHTML = self.html();
                copy.querySelectorAll("form").forEach((el) => {
                    el.remove();
                });
                self.attr("data-copy", copy.innerHTML);
            });
        $(selector + ".color_picker:not(.actived)")
            .addClass("actived")
            .each(function () {
                const input = $(this).children(".palette");
                input.spectrum(colorPickerSetting.call(input));
                $(this).append(
                    `<div class="ticket_field"><p>${input.val()}</p></div><div class="color_picker_btn"><a class="color_picker_add"><span class="fa fa-plus"></span>加入常用</a></div>`
                );
            });
        $(selector + ".picture_box:not(.actived)")
            .addClass("actived")
            .each(function () {
                $(this)
                    .find(".frame")
                    .each(function () {
                        const rand = Math.random().toString(36).substring(2);
                        const self = $(this);
                        const img = self
                            .find(".box img.img_key")
                            .removeClass("img_key")
                            .addClass(`img_${rand}`);
                        const input = self
                            .find(".box input.value_key")
                            .removeClass("value_key")
                            .addClass(`value_${rand}`);
                        const open = self
                            .find('.box .lbox_fms_open[data-key="key"]')
                            .attr("data-key", rand);
                        const remove = self
                            .find('.box .image_remove[data-key="key"]')
                            .attr("data-key", rand);
                        const file = self
                            .find(".info_detail .file_key")
                            .removeClass("file_key")
                            .addClass(`file_${rand}`);
                        const folder = self
                            .find(".info_detail .folder_key")
                            .removeClass("folder_key")
                            .addClass(`folder_${rand}`);
                        const type = self
                            .find(".info_detail .type_key")
                            .removeClass("type_key")
                            .addClass(`type_${rand}`);
                        const size = self
                            .find(".info_detail .size_key")
                            .removeClass("size_key")
                            .addClass(`size_${rand}`);
                    });
                if ($(this).hasClass('imageCoordinate')) {
                    $(this)
                        .each(function () {
                            const rand = Math.random().toString(36).substring(2);
                            const self = $(this);
                            const img = self
                                .find("img.img_key")
                                .removeClass("img_key")
                                .addClass(`img_${rand}`);
                            const open = self
                                .find('.lbox_fms_open[data-key="key"]')
                                .attr("data-key", rand);
                            const input = self
                                .find("input.value_key")
                                .removeClass("value_key")
                                .addClass(`value_${rand}`);
                        });
                }
            });
        $(selector + ".file-picker:not(.actived)")
            .addClass("actived")
            .each(function () {
                const rand = Math.random().toString(36).substring(2);
                const self = $(this);
                const title = self
                    .find(".filepicker_input_key")
                    .removeClass("filepicker_input_key")
                    .addClass(`filepicker_input_${rand}`);
                const value = self
                    .find(".filepicker_value_key")
                    .removeClass("filepicker_value_key")
                    .addClass(`filepicker_value_${rand}`);
                const open = self
                    .find('.lbox_fms_open[data-key="key"]')
                    .attr("data-key", rand);
                const download = self
                    .find(
                        ".file_fantasy_download.filepicker_src_key.filepicker_title_key"
                    )
                    .removeClass("filepicker_src_key filepicker_title_key")
                    .addClass(
                        `filepicker_src_${rand} filepicker_title_${rand}`
                    );
            });

        $(selector + ".datepicker-input:not(.actived)")
            .addClass("actived")
            .each(function () {
                const setting = $(this).attr("data-toolbar");
                $(this).datepicker(
                    setting in datePickerSetting
                        ? datePickerSetting[setting]
                        : datePickerSetting.default
                );
            });

        $(selector + ".timepicker-input:not(.actived)")
            .addClass("actived")
            .each(function () {
                const setting = $(this).attr("data-toolbar");
                $(this).timepicker(
                    setting in timePickerSetting
                        ? timePickerSetting[setting]
                        : timePickerSetting.default
                );
            });

        $(selector + ".summernote-area:not(.actived):not([disabled])")
            .addClass("actived")
            .each(function () {
                const setting = $(this).attr("data-toolbar");
                $(this).summernote(
                    setting in summernoteSetting
                        ? summernoteSetting[setting]
                        : summernoteSetting.default
                );
                $(this).on('summernote.change', function () {
                    let content = $(this).summernote('code');

                    // 如果内容为 <p><br></p>，则清空编辑器
                    if (content === '<p><br></p>') {
                        $(this).summernote('code', '');  // 设置内容为空
                    }
                });

                //避免完全無任何標籤，前端渲染容易跑版
                $(this).siblings('.note-editor').find('.note-editable').on('keyup', function () {
                    const editable = $(this);
                    if (editable.children().length === 0 && editable.text().trim() !== '') {
                        const text = editable.text();
                        editable.html('<p>' + text + '</p>');
                    }
                });
            });

        //表格元件
        $(selector + ".bk_spreadsheet:not(.actived):not([disabled])")
            .addClass("actived")
            .each(function () {

                function isValidJsonString(str) {
                    try {
                        const parsed = JSON.parse(str);
                        return typeof parsed === 'object' && parsed !== null;
                    } catch (e) {
                        return false;
                    }
                }
                //座標轉英文
                function toA1Notation(x, y) {
                    // 將欄索引轉成英文字母
                    function columnToLetter(column) {
                        let temp = '';
                        let letter = '';
                        column++; // 因為 A = 1
                        while (column > 0) {
                            temp = (column - 1) % 26;
                            letter = String.fromCharCode(temp + 65) + letter;
                            column = Math.floor((column - 1) / 26);
                        }
                        return letter;
                    }

                    return columnToLetter(x) + (y + 1); // y + 1 是因為列是從 1 開始
                }
                //英文轉座標
                function fromA1Notation(position) {
                    const match = position.toUpperCase().match(/^([A-Z]+)(\d+)$/);
                    if (!match) return null;

                    const colStr = match[1];
                    const rowStr = match[2];

                    // 轉換欄字母為數字
                    let col = 0;
                    for (let i = 0; i < colStr.length; i++) {
                        col = col * 26 + (colStr.charCodeAt(i) - 64); // A = 65 → 1
                    }

                    return [col - 1, parseInt(rowStr) - 1]; // Excel 是從1開始，jSpreadsheet是從0開始
                }
                //計算重疊
                function isRangeOverlap(range1, range2) {
                    const [x1a, y1a] = [range1[0], range1[1]];
                    const [x2a, y2a] = [range1[2], range1[3]];

                    const [x1b, y1b] = [range2[0], range2[1]];
                    const [x2b, y2b] = [range2[2], range2[3]];

                    // 正規化：確保 x1 <= x2, y1 <= y2
                    const minAx = Math.min(x1a, x2a);
                    const maxAx = Math.max(x1a, x2a);
                    const minAy = Math.min(y1a, y2a);
                    const maxAy = Math.max(y1a, y2a);

                    const minBx = Math.min(x1b, x2b);
                    const maxBx = Math.max(x1b, x2b);
                    const minBy = Math.min(y1b, y2b);
                    const maxBy = Math.max(y1b, y2b);

                    // 判斷是否不重疊（排除四種互不相交情況）
                    const isSeparate =
                        maxAx < minBx || // A 在 B 左邊
                        minAx > maxBx || // A 在 B 右邊
                        maxAy < minBy || // A 在 B 上方
                        minAy > maxBy;   // A 在 B 下方

                    return !isSeparate;
                }

                //檢測合併和表頭、凍結設定是否衝突 
                function verifyMerge(tmpHeader, tmpFreeze, tmpMerge, selectedRange = null) {
                    // 判斷操作是否違反常理
                    let _alert = false;

                    if (selectedRange != null) {
                        //選取區域準備合併時，檢查是否有表頭 凍結設定
                        if (tmpHeader.length > 0) {
                            //欄表頭
                            if (tmpHeader[1] != null && selectedRange[0] <= tmpHeader[0] && selectedRange[2] > tmpHeader[0]) _alert = true;
                            //列表頭
                            if (tmpHeader[0] != null && selectedRange[1] <= tmpHeader[1] && selectedRange[3] > tmpHeader[1]) _alert = true;
                        }
                        //凍結設定
                        if (tmpFreeze.length > 0) {
                            //欄凍結
                            if (tmpFreeze[1] != null && selectedRange[0] <= tmpFreeze[0] && selectedRange[2] > tmpFreeze[0]) _alert = true;
                            //列凍結
                            if (tmpFreeze[0] != null && selectedRange[1] <= tmpFreeze[1] && selectedRange[3] > tmpFreeze[1]) _alert = true;
                        }

                        if (_alert) {
                            alert('錯誤的操作');
                            return false;
                        }
                    }
                    else {
                        //設定凍結時
                        if (tmpHeader == null) {
                            //凍結欄 
                            if (tmpFreeze[0] != undefined && tmpFreeze[0] != null) {
                                let detect = [];
                                if (tmpFreeze[0] != undefined && tmpFreeze[0] != null) detect.push(tmpFreeze[0]);
                                $.each(tmpMerge, function (k, v) {
                                    let [_x1, _y] = fromA1Notation(k);
                                    let _x2 = _x1 + v[0] - 1;
                                    detect.forEach(function (val) {
                                        if (_x1 <= val && val < _x2) _alert = true;
                                    });

                                    if (_alert) return false;
                                });
                            }
                            //凍結列
                            if (tmpFreeze[1] != undefined && tmpFreeze[1] != null) {
                                let detect = [];
                                if (tmpFreeze[1] != undefined && tmpFreeze[1] != null) detect.push(tmpFreeze[1]);
                                $.each(tmpMerge, function (k, v) {
                                    let [_x, _y1] = fromA1Notation(k);
                                    let _y2 = _y1 + v[1] - 1;
                                    detect.forEach(function (val) {
                                        if (_y1 <= val && val < _y2) _alert = true;
                                    });

                                    if (_alert) return false;
                                });
                            }
                        }
                        //設定表頭時
                        if (tmpFreeze == null) {
                            //欄表頭 
                            if (tmpHeader[0] != undefined && tmpHeader[0] != null) {
                                let detect = [];
                                if (tmpHeader[0] != undefined && tmpHeader[0] != null) detect.push(tmpHeader[0]);
                                $.each(tmpMerge, function (k, v) {
                                    let [_x1, _y] = fromA1Notation(k);
                                    let _x2 = _x1 + v[0] - 1;
                                    detect.forEach(function (val) {
                                        if (_x1 <= val && val < _x2) _alert = true;
                                    });

                                    if (_alert) return false;
                                });
                            }
                            //列表頭
                            if (tmpHeader[1] != undefined && tmpHeader[1] != null) {
                                let detect = [];
                                if (tmpHeader[1] != undefined && tmpHeader[1] != null) detect.push(tmpHeader[1]);
                                $.each(tmpMerge, function (k, v) {
                                    let [_x, _y1] = fromA1Notation(k);
                                    let _y2 = _y1 + v[1] - 1;
                                    detect.forEach(function (val) {
                                        if (_y1 <= val && val < _y2) _alert = true;
                                    });

                                    if (_alert) return false;
                                });
                            }
                        }
                        if (_alert) {
                            alert('錯誤的操作');
                            return false;
                        }
                    }

                    return true;
                }
                //檢測row變更 是否會推動合併欄位導致超出凍結、表頭設定 
                function verifyRowChange(tmpHeader, tmpFreeze, tmpMerge, newY) {
                    let _alert = false;
                    //表頭 凍結列的高度 0~x
                    let detect = [];
                    if (tmpHeader[1] != undefined && tmpHeader[1] != null) detect.push(tmpHeader[1]);
                    if (tmpFreeze[1] != undefined && tmpFreeze[1] != null) detect.push(tmpFreeze[1]);

                    $.each(tmpMerge, function (k, v) {
                        let [_x, _y1] = fromA1Notation(k);
                        let _y2 = _y1 + v[1] - 1;
                        //新增列有插到合併表格
                        if (_y1 < newY && newY <= _y2) {
                            _alert = true;
                            return false;
                        }
                        //新增列將合併表格往下推
                        if (newY <= _y1) {
                            _y1++;
                            _y2++;
                            detect.forEach(function (val) {
                                if (_y1 <= val && val < _y2) _alert = true;
                            });
                        }
                        if (_alert) return false;
                    });

                    if (_alert) {
                        alert('錯誤的操作');
                        return false;
                    }
                    return true;
                }

                //檢測col變更 是否會推動合併欄位導致超出凍結設定 
                function verifyColChange(tmpHeader, tmpFreeze, tmpMerge, newX) {
                    let _alert = false;

                    let detect = [];
                    if (tmpHeader[0] != undefined && tmpHeader[0] != null) detect.push(tmpHeader[0]);
                    if (tmpFreeze[0] != undefined && tmpFreeze[0] != null) detect.push(tmpFreeze[0]);

                    $.each(tmpMerge, function (k, v) {
                        let [_x1, _y] = fromA1Notation(k);
                        let _x2 = _x1 + v[0] - 1;
                        //新增列有插到合併表格
                        if (_x1 < newX && newX <= _x2) _alert = true;
                        //新增列將合併表格往下推
                        if (newX <= _x1) {
                            _x1++;
                            _x2++;
                            detect.forEach(function (val) {
                                if (_x1 <= val && val < _x2) _alert = true;
                            });
                        }
                        if (_alert) return false;
                    });

                    if (_alert) {
                        alert('錯誤的操作');
                        return false;
                    }
                    return true;
                }

                const _thisDom = this;
                const _this = $(this);
                _this.siblings('.button-group').find('.bkSpreadsheetEditFullScreen').on('click', function () {
                    this.parentElement.parentElement.classList.toggle('fullscreen');

                    this.classList.toggle('active')

                    this.textContent = this.classList.contains('active')
                        ? this.dataset.toClose
                        : this.dataset.toOpen
                });
                //動態設定 表頭 凍結 合併 欄寬
                const disableSetMerge = _this.attr('data-disableSetMerge');
                const disableSetHeader = _this.attr('data-disableSetHeader');
                const disableSetFreeze = _this.attr('data-disableSetFreeze');
                const disableSetColWidth = _this.attr('data-disableSetColWidth');

                //初始儲存格資料
                let _data = _this.siblings('.bk_spreadsheet_value').val();
                if (_data != '' && isValidJsonString(_data)) _data = JSON.parse(_data);
                else _data = [];

                //初始合併設定 
                let _merge = _this.siblings('.bk_spreadsheet_merge').val();
                if (_merge != '' && isValidJsonString(_merge)) _merge = JSON.parse(_merge);
                else _merge = [];
                if (disableSetMerge != undefined) {
                    _merge = [];
                    _this.siblings('.bk_spreadsheet_merge').val(JSON.stringify(_merge));
                }

                //初始表頭設定 [y0,y1] 第0列到第n列
                let _header = _this.siblings('.bk_spreadsheet_header').val();
                if (_header != '' && isValidJsonString(_header)) _header = JSON.parse(_header);
                else _header = [];
                if (disableSetHeader != undefined) {
                    _header = [];
                    _this.siblings('.bk_spreadsheet_header').val(JSON.stringify(_header));
                }

                //初始凍結設定 [x,y] 第0到x欄 第0到y欄， undefined或null為不凍結
                let _freeze = _this.siblings('.bk_spreadsheet_freeze').val();
                if (_freeze != '' && isValidJsonString(_freeze)) _freeze = JSON.parse(_freeze);
                else _freeze = [];
                if (disableSetFreeze != undefined) {
                    _freeze = [];
                    _this.siblings('.bk_spreadsheet_freeze').val(JSON.stringify(_freeze));
                }

                //欄寬設定
                let _colWidth = _this.siblings('.bk_spreadsheet_col_width').val();
                if (_colWidth != '' && isValidJsonString(_colWidth)) _colWidth = JSON.parse(_colWidth);
                else _colWidth = [];
                if (disableSetColWidth != undefined) {
                    _colWidth = [];
                    _this.siblings('.bk_spreadsheet_col_width').val(JSON.stringify(_colWidth));
                }

                //預設欄寬
                const _colDefaultWidh = _this.attr('data-defaultWidth');
                //若欄寬有修改過則載入
                let _colDef = [];
                if (_colWidth.length > 0) {
                    _colWidth.forEach((item, index) => {
                        _colDef.push({ width: item });
                    })
                }
                else {
                    if (_data.length > 0) {
                        const _len = _data[0].length;
                        for (let i = 0; i < _len; i++) {
                            _colWidth.push(_colDefaultWidh);
                            if (disableSetColWidth == undefined) _this.siblings('.bk_spreadsheet_col_width').val(JSON.stringify(_colWidth));
                            _colDef.push({ width: _colDefaultWidh });
                        }
                    }
                }

                //選取範圍
                let selectedRange = [];
                //套件的合併設定
                let merge = [];

                let _jsheet;
                _jsheet = jspreadsheet(_thisDom, {
                    worksheets: [{
                        minDimensions: [1, 1],
                        //卷軸 高度不知道怎麼設定
                        tableOverflow: true,
                        defaultColWidth: 100,
                        tableWidth: "100%",
                        wordWrap: true,
                        //表格值
                        data: _data,
                        //凍結欄 但沒有凍結列 不採用預設凍結方法
                        // freezeColumns: 2,

                        //表頭設定 無設定就是 A,B,C ... 欄寬 _jsheet[0].getColumnOptions(0).width 第0欄
                        // columns: [
                        //     { width:200 },
                        //     { width:100 },
                        // //     { title:'Price', width:80 },
                        // ],
                        columns: _colDef,
                        //禁止排序
                        columnSorting: false,
                        //預設合併欄位
                        mergeCells: _merge,
                    }],

                    //偵測欄寬修改
                    onresizecolumn: function (instance, columnIndex, newWidth) {
                        const columnCount = instance.options.columns.length;

                        for (let i = 0; i < columnCount; i++) {
                            if (_colWidth[i] == undefined) _colWidth[i] = _colDefaultWidh;
                        }
                        if (typeof columnIndex === 'string' || typeof columnIndex === 'number') {
                            _colWidth[columnIndex] = newWidth;
                        }
                        if (typeof columnIndex === 'object') {
                            columnIndex.forEach((item, index) => {
                                _colWidth[item] = newWidth;
                            })
                        }
                        if (disableSetColWidth == undefined) _this.siblings('.bk_spreadsheet_col_width').val(JSON.stringify(_colWidth));
                        else _this.siblings('.bk_spreadsheet_col_width').val(JSON.stringify([]));
                    },

                    //偵測動作將值寫到input
                    onchange: function (instance, cell, x, y, value) {
                        const rv = instance.getData();
                        merge = instance.getMerge();
                        _this.siblings('.bk_spreadsheet_value').val(JSON.stringify(rv));
                        _this.siblings('.bk_spreadsheet_merge').val(JSON.stringify(merge));
                        _this.siblings('.bk_spreadsheet_header').val(JSON.stringify(_header));

                        //初始化表頭樣式
                        const rowCount = instance.getData().length;
                        const columnCount = instance.options.columns.length;
                        const rowEnd = _header[1];
                        if (rowEnd != null) {
                            for (let y = 0; y <= rowEnd; y++) {
                                for (let x = 0; x < columnCount; x++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = instance.getCell(cellName);
                                    thisCell.classList.add('bk_spreadsheet_header_style');
                                }
                            }
                        }
                        const colEnd = _header[0]
                        if (colEnd != null) {
                            for (let x = 0; x <= colEnd; x++) {
                                for (let y = 0; y < rowCount; y++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = instance.getCell(cellName);
                                    thisCell.classList.add('bk_spreadsheet_header_style');
                                }
                            }
                        }

                        //凍結樣式
                        const freezeColSet = _freeze?.[0];
                        const freezeRowSet = _freeze?.[1];
                        for (let y = 0; y < rowCount; y++) {
                            for (let x = 0; x < columnCount; x++) {
                                const cellName = toA1Notation(x, y) // A1, B1...
                                const thisCell = instance.getCell(cellName);
                                if (freezeColSet != null && freezeColSet != undefined && x == 0) thisCell.classList.add('bk_spreadsheet_freeze_col_left_style');
                                if (freezeColSet != null && freezeColSet != undefined && x == freezeColSet) thisCell.classList.add('bk_spreadsheet_freeze_col_right_style');
                                if (freezeRowSet != null && freezeRowSet != undefined && y == 0) thisCell.classList.add('bk_spreadsheet_freeze_row_top_style');
                                if (freezeRowSet != null && freezeRowSet != undefined && y == freezeRowSet) thisCell.classList.add('bk_spreadsheet_freeze_row_bottom_style');
                            }
                        }
                    },
                    //載入時渲染樣式
                    onload: function (instance) {
                        //表頭樣式
                        const rowCount = instance.worksheets[0].getData().length;
                        const columnCount = instance.worksheets[0].options.columns.length;
                        if (_header.length != 0) {
                            const rowEnd = _header[1]
                            if (rowEnd != null) {
                                for (let y = 0; y <= rowEnd; y++) {
                                    for (let x = 0; x < columnCount; x++) {
                                        const cellName = toA1Notation(x, y) // A1, B1...
                                        const thisCell = instance.worksheets[0].getCell(cellName);
                                        thisCell.classList.add('bk_spreadsheet_header_style');
                                    }
                                }
                            }
                            const colEnd = _header[0]
                            if (colEnd != null) {
                                for (let x = 0; x <= colEnd; x++) {
                                    for (let y = 0; y < rowCount; y++) {
                                        const cellName = toA1Notation(x, y) // A1, B1...
                                        const thisCell = instance.worksheets[0].getCell(cellName);
                                        thisCell.classList.add('bk_spreadsheet_header_style');
                                    }
                                }
                            }
                        }

                        //凍結樣式
                        const freezeColSet = _freeze?.[0];
                        const freezeRowSet = _freeze?.[1];
                        for (let y = 0; y < rowCount; y++) {
                            for (let x = 0; x < columnCount; x++) {
                                const cellName = toA1Notation(x, y) // A1, B1...
                                const thisCell = instance.worksheets[0].getCell(cellName);
                                if (freezeColSet != null && freezeColSet != undefined && x == 0) thisCell.classList.add('bk_spreadsheet_freeze_col_left_style');
                                if (freezeColSet != null && freezeColSet != undefined && x == freezeColSet) thisCell.classList.add('bk_spreadsheet_freeze_col_right_style');
                                if (freezeRowSet != null && freezeRowSet != undefined && y == 0) thisCell.classList.add('bk_spreadsheet_freeze_row_top_style');
                                if (freezeRowSet != null && freezeRowSet != undefined && y == freezeRowSet) thisCell.classList.add('bk_spreadsheet_freeze_row_bottom_style');
                            }
                        }
                    },
                    //偵測選取區域
                    onselection: function (instance, x1, y1, x2, y2) {
                        //左上x1y1 & 右下x2y2
                        selectedRange = [x1, y1, x2, y2];
                    },
                    //自定義右鍵事件
                    contextMenu: function (obj, x, y, e) {
                        setTimeout(() => {
                            const contextMenu = document.querySelector('.jss_contextmenu.jcontextmenu-focus');
                            if (contextMenu) {
                                // 原始位置
                                let top = parseInt(contextMenu.style.top, 10);
                                let left = parseInt(contextMenu.style.left, 10);

                                // 選單燈箱位置調整
                                // contextMenu.style.top = (top - 20) + 'px';
                                // contextMenu.style.left = (left - 300) + 'px';
                            }
                        }, 10);
                        //設定列表頭樣式
                        function setRowHeader() {
                            //表頭設定 開始&結束列
                            const rowEnd = _header[1];
                            if (rowEnd == null) return false;
                            //列寬度
                            const columnCount = _jsheet[0].options.columns.length;
                            for (let y = 0; y <= rowEnd; y++) {
                                for (let x = 0; x < columnCount; x++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = _jsheet[0].getCell(cellName);
                                    thisCell.classList.add('bk_spreadsheet_header_style');
                                }
                            }
                            _this.siblings('.bk_spreadsheet_header').val(JSON.stringify(_header));
                        }
                        function setColHeader() {
                            //表頭設定 開始&結束列
                            const colEnd = _header[0];
                            if (colEnd == null) return false;
                            //列寬度
                            const rowCount = _jsheet[0].getData().length;
                            for (let x = 0; x <= colEnd; x++) {
                                for (let y = 0; y < rowCount; y++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = _jsheet[0].getCell(cellName);
                                    thisCell.classList.add('bk_spreadsheet_header_style');
                                }
                            }
                            _this.siblings('.bk_spreadsheet_header').val(JSON.stringify(_header));
                        }
                        //清除所有儲存格的表頭樣式css
                        function removeHeader(clear = false) {
                            const columnCount = _jsheet[0].options.columns.length;
                            const rowCount = _jsheet[0].getData().length;
                            for (let y = 0; y < rowCount; y++) {
                                for (let x = 0; x < columnCount; x++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = _jsheet[0].getCell(cellName);
                                    if (thisCell.classList != undefined) thisCell.classList.remove('bk_spreadsheet_header_style');
                                }
                            }

                            if (clear) _header = [];
                            _this.siblings('.bk_spreadsheet_header').val(JSON.stringify(_header));
                        }
                        //設定凍結樣式
                        function setFreeze() {
                            //先清除樣式 對同一屬性重複設定會被視為取消
                            removeFreeze();

                            const freezeColSet = _freeze?.[0];
                            const freezeRowSet = _freeze?.[1];
                            const rowCount = _jsheet[0].getData().length;
                            const columnCount = _jsheet[0].options.columns.length;

                            for (let y = 0; y < rowCount; y++) {
                                for (let x = 0; x < columnCount; x++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = _jsheet[0].getCell(cellName);
                                    if (freezeColSet != null && freezeColSet != undefined && x == 0) thisCell.classList.add('bk_spreadsheet_freeze_col_left_style');
                                    if (freezeColSet != null && freezeColSet != undefined && x == freezeColSet) thisCell.classList.add('bk_spreadsheet_freeze_col_right_style');
                                    if (freezeRowSet != null && freezeRowSet != undefined && y == 0) thisCell.classList.add('bk_spreadsheet_freeze_row_top_style');
                                    if (freezeRowSet != null && freezeRowSet != undefined && y == freezeRowSet) thisCell.classList.add('bk_spreadsheet_freeze_row_bottom_style');
                                }
                            }
                            _this.siblings('.bk_spreadsheet_freeze').val(JSON.stringify(_freeze));
                        }
                        function removeFreeze(clear = false) {
                            const rowCount = _jsheet[0].getData().length;
                            const columnCount = _jsheet[0].options.columns.length;
                            for (let y = 0; y < rowCount; y++) {
                                for (let x = 0; x < columnCount; x++) {
                                    const cellName = toA1Notation(x, y) // A1, B1...
                                    const thisCell = _jsheet[0].getCell(cellName);
                                    if (thisCell.classList != undefined) {
                                        thisCell.classList.remove('bk_spreadsheet_freeze_col_left_style');
                                        thisCell.classList.remove('bk_spreadsheet_freeze_col_right_style');
                                        thisCell.classList.remove('bk_spreadsheet_freeze_row_top_style');
                                        thisCell.classList.remove('bk_spreadsheet_freeze_row_bottom_style');
                                    }
                                }
                            }
                            if (clear) _freeze = [];
                            _this.siblings('.bk_spreadsheet_freeze').val(JSON.stringify(_freeze));
                        }

                        //重置樣式 表頭 凍結
                        function refreshStyle() {
                            removeHeader();
                            setRowHeader();
                            setColHeader();
                            removeFreeze();
                            setFreeze();
                        }

                        //刪除欄列不會觸發onchange 暫時找不到觸發onchange方式
                        function refreshChange() {
                            _jsheet[0].setValue('A1', _jsheet[0].getData()[0][0]);
                            refreshStyle();
                        }

                        //將合併欄位設定轉寫為陣列
                        merge = _jsheet[0].getMerge();
                        let mergeRange = [];
                        Object.keys(merge).forEach(key => {
                            const letfTop = fromA1Notation(key);
                            const rightDown = [letfTop[0] + (merge[key][0] - 1), letfTop[1] + (merge[key][1] - 1)];
                            mergeRange.push(fromA1Notation(key).concat(rightDown));
                        });

                        //計算選取區域和已合併區塊是否重疊
                        let canMerge = true; //是否可操作 合併
                        let dissMerge = false; //是否可操作 取消合併
                        let dissMergeEn = ''; //操作取消合併座標
                        mergeRange.forEach(range => {
                            //判斷當前的選取區域是否為一個merge的設定
                            if (range[0] == selectedRange[0] && range[1] == selectedRange[1] && range[2] == selectedRange[2] && range[3] == selectedRange[3]) {
                                dissMerge = true;
                                dissMergeEn = toA1Notation(range[0], range[1]);
                            }
                            if (isRangeOverlap(range, selectedRange)) {
                                canMerge = false;
                            }
                        });

                        //是否可以設置表頭 有選取到第一列才可設置
                        let canSetRowHeader = false;
                        if (selectedRange[1] == 0) {
                            canSetRowHeader = true;
                        }
                        let canSetColumnHeader = false;
                        if (selectedRange[0] == 0) {
                            canSetColumnHeader = true;
                        }

                        //最終按鈕設定
                        let res = [];
                        //凍結設定
                        if (disableSetFreeze == undefined) {
                            if (_header[1] != undefined && _header[1] != null) {
                                res.push(
                                    {
                                        title: '凍結列表頭(前台顯示)',
                                        onclick: function () {
                                            _freeze[1] = _header[1];
                                            if (_freeze[0] == undefined) _freeze[0] = null;
                                            setFreeze();
                                        }
                                    },
                                );
                            }
                            if (_header[0] != undefined && _header[0] != null) {
                                res.push(
                                    {
                                        title: '凍結欄表頭(前台顯示)',
                                        onclick: function () {
                                            _freeze[0] = _header[0];
                                            if (_freeze[1] == undefined) _freeze[1] = null;
                                            setFreeze();
                                        }
                                    },
                                );
                            }
                            res.push(
                                {
                                    title: '取消所有凍結欄列',
                                    onclick: function () {
                                        removeFreeze(true);
                                    }
                                },
                            );
                            //分隔線
                            res.push({ type: 'line' });
                        }

                        //表頭設定
                        if (disableSetHeader == undefined) {
                            if (canSetRowHeader) {
                                res.push(
                                    {
                                        title: '設定選擇列為表頭',
                                        onclick: function () {
                                            let tempHeader = [null, selectedRange[3]];
                                            if (!verifyMerge(tempHeader, null, _merge, null)) return false;
                                            //當前選擇的列範圍
                                            if (_header[0] == undefined) _header = [null, selectedRange[3]];
                                            else _header[1] = selectedRange[3];
                                            if (_freeze[1] != undefined && _freeze[1] != null) _freeze[1] = selectedRange[3];
                                            refreshStyle();
                                        }
                                    },
                                );
                            }
                            if (canSetColumnHeader) {
                                res.push(
                                    {
                                        title: '設定選擇欄為表頭',
                                        onclick: function () {
                                            let tempHeader = [selectedRange[2], null];
                                            if (!verifyMerge(tempHeader, null, _merge, null)) return false;
                                            //當前選擇的列範圍
                                            if (_header[1] == undefined) _header = [selectedRange[2], null];
                                            else _header[0] = selectedRange[2];
                                            if (_freeze[0] != undefined && _freeze[0] != null) _freeze[0] = selectedRange[2];
                                            refreshStyle();
                                        }
                                    },
                                );
                            }
                            res.push(
                                {
                                    title: '取消所有表頭設定',
                                    onclick: function () {
                                        removeFreeze(true);
                                        removeHeader(true);
                                    }
                                },
                            );
                            //分隔線
                            res.push({ type: 'line' });
                        }

                        //合併設定
                        if (disableSetMerge == undefined) {
                            if (!canMerge && dissMerge) {
                                res.push(
                                    {
                                        title: '取消合併',
                                        onclick: function () {
                                            _jsheet[0].removeMerge(dissMergeEn);
                                            refreshChange();
                                        }
                                    }
                                );
                            }
                            else if (canMerge && !(selectedRange[0] == selectedRange[2] && selectedRange[1] == selectedRange[3])) {
                                res.push(
                                    {
                                        title: '合併儲存格',
                                        onclick: function () {
                                            if (!verifyMerge(_header, _freeze, _merge, selectedRange)) return false;

                                            const position = toA1Notation(selectedRange[0], selectedRange[1]);
                                            _jsheet[0].setMerge(position, (selectedRange[2] - selectedRange[0]) + 1, (selectedRange[3] - selectedRange[1]) + 1);
                                            refreshStyle();
                                        }
                                    },
                                );
                            }
                            //分隔線
                            res.push({ type: 'line' });
                        }

                        if (y != 0) {
                            res.push(
                                {
                                    title: '新增列於上方',
                                    onclick: function () {
                                        //需考慮在垂直合併欄位上往上新增列 會將合併欄位往下推 可能超過凍結列或表頭設定
                                        if (!verifyRowChange(_header, _freeze, _merge, parseInt(y))) return false;

                                        obj.insertRow(1, parseInt(y) - 1);
                                        refreshChange();
                                    }
                                },
                            );
                        }
                        res.push(
                            {
                                title: '新增列於下方',
                                onclick: function () {
                                    //需考慮在垂直合併欄位上往下新增列 會將合併欄位往下推 可能超過凍結列或表頭設定
                                    if (!verifyRowChange(_header, _freeze, _merge, parseInt(y) + 1)) return false;

                                    obj.insertRow(1, parseInt(y));
                                    refreshChange();
                                }
                            },
                            {
                                title: '刪除此列',
                                onclick: function () {
                                    obj.deleteRow(parseInt(y));
                                    refreshChange();
                                }
                            },
                        );
                        if (selectedRange[3] - selectedRange[1] != 0) {
                            res.push(
                                {
                                    title: '刪除選擇列',
                                    onclick: function () {
                                        for (let y = selectedRange[3]; y >= selectedRange[1]; y--) {
                                            obj.deleteRow(parseInt(y));
                                        }
                                        refreshChange();
                                    }
                                },
                            )
                        }
                        //分隔線
                        res.push({ type: 'line' });

                        if (x != 0) {
                            res.push(
                                {
                                    title: '新增欄於左側',
                                    onclick: function () {
                                        //需考慮在水平合併欄位上往左新增欄 會將合併欄位往右推 可能超過凍結欄設定
                                        if (!verifyColChange(_header, _freeze, _merge, parseInt(x))) return false;

                                        obj.insertColumn(null, parseInt(x) - 1);
                                        refreshChange();
                                    }
                                }
                            );
                        }
                        res.push(
                            {
                                title: '新增欄於右側',

                                onclick: function () {
                                    //需考慮在水平合併欄位上往左新增欄 會將合併欄位往右推 可能超過凍結欄設定
                                    if (!verifyColChange(_header, _freeze, _merge, parseInt(x) + 1)) return false;

                                    obj.insertColumn(null, parseInt(x));
                                    refreshChange();
                                }
                            },
                            {
                                title: '刪除此欄',
                                onclick: function () {
                                    obj.deleteColumn(parseInt(x));
                                    refreshChange();
                                }
                            },
                        );
                        if (selectedRange[2] - selectedRange[0] != 0) {
                            res.push(
                                {
                                    title: '刪除選擇欄',
                                    onclick: function () {
                                        for (let x = selectedRange[2]; x >= selectedRange[0]; x--) {
                                            obj.deleteColumn(parseInt(x));
                                        }
                                        refreshChange();
                                    }
                                },
                            )
                        }


                        return res;
                    }
                });

                //重置欄寬按鈕
                const resetColWidthBtn = _this.closest('.inventory').find('.bkSpreadsheetResetColWidth');
                resetColWidthBtn.on('click', function () {
                    const columnCount = _jsheet[0].options.columns.length;
                    for (let i = 0; i < columnCount; i++) {
                        _colWidth[i] = _colDefaultWidh;
                        _jsheet[0].setWidth(i, _colDefaultWidh);
                    }
                    _this.siblings('.bk_spreadsheet_col_width').val(JSON.stringify(_colWidth));
                })
                //新增欄
                const newColBtn = _this.closest('.inventory').find('.bkSpreadsheetNewCol');
                newColBtn.on('click', function () {
                    const columnCount = _jsheet[0].options.columns.length;
                    _jsheet[0].insertColumn(null, parseInt(columnCount));
                    _jsheet[0].setValue('A1', _jsheet[0].getData()[0][0]);
                });

                //新增列
                const newRowBtn = _this.closest('.inventory').find('.bkSpreadsheetNewRow');
                newRowBtn.on('click', function () {
                    const rowCount = _jsheet[0].getData().length;
                    _jsheet[0].insertRow(1, parseInt(rowCount));
                    _jsheet[0].setValue('A1', _jsheet[0].getData()[0][0]);
                })
            });

        components.select2(
            $(selector + ".____select2:not(.actived)").addClass("actived")
        );
        verifyControl.addInputs(editArea.find("[data-verify]"));
        item_file_detail("file_detail_btn");
    }
}
