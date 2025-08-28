const close_notifyScreen2 = () => {
    const object = ".quickview-wrapper";
    $(".notify-screen").on("click", ".btn", function () {
        setTimeout(function () {
            $(object).css("left", "calc(100%)");
        }, 450);
    });
}

// 修改密碼事件
const changePwdclick = () => {
    $(".changePWD").click(function () {
        $.ajax({
            url: $(".base-url-plus").val() + "/Fantasy/fetch-change-pwd-view",
            method: "GET",
            success: function (data) {
                $("body").append(data);
                $(".change_pwd_modal").addClass("active");
                // 綁事件
                change_pwd_send();//提交密碼事件
                close_change_pwd_view();// 關閉燈箱事件
                close_change_pwd_view2();//防止冒泡事件
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        // $("body").append()
    })
}

const change_pwd_send = () => {
    $(".changePWDBtn").click(function () {
        const data = {};
        data.pwd = $(".changePWDInput").val();
        data.pwd2 = $(".changePWDInput2").val();
        let error = 0;
        if ($(".changePWDInput").val().trim().replace(/\s/g, "") == "") {
            error++;
        }
        if ($(".changePWDInput2").val().trim().replace(/\s/g, "") == "") {
            error++;
        }
        if ($(".changePWDInput").val() != $(".changePWDInput2").val()) {
            error++;
        }
        if (error > 0) {
            alert("請設定的密碼 or 密碼不相同");
            return false;
        }
        $.ajax({
            url: $(".base-url-plus").val() + "/Fantasy/change-pwd-send",
            method: "post",
            data,
            success: function (type) {

                if (type == "pwd") {
                    $(".changePWDErrorMsg").show()
                } else {
                    $(".changePWDErrorMsg").hide()
                }
                if (type == "no-login") {
                    alert("您尚未當入，即將跳轉登入頁面");
                    window.location.href = $(".base-url-plus").val() + "/Fantasy";

                }
                if (type == "success") {
                    alert("修改成功，請用新密碼登入");
                    window.location.href = $(".base-url-plus").val() + "/Fantasy";
                }

            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    })
}

// 關閉更改密碼燈箱事件    
const close_change_pwd_view = () => {
    $(".change_pwd_modal").click(function () {
        $(this).remove();

    })
}

// 更改密碼燈箱防止冒泡事件
const close_change_pwd_view2 = () => {
    $(".changePwd_sec").click(function (event) {
        event.stopPropagation();
    })
}

const loginBottonClickEvent = () => {
    const loginBtn = $(".login_modal .loginBtn")
    const isActive = loginBtn.hasClass("active")

    if (isActive) return

    loginBtn.addClass("active")
    loginBtn.on("click", function () {
        const accountInput = $(".accountInput").val();
        const passwordInput = $(".passwordInput").val();
        const publicKey = $(".publickey").val();
        const crypt = new JSEncrypt();

        crypt.setPublicKey(publicKey)

        const userData = crypt.encrypt(
            JSON.stringify({
                account: accountInput,
                password: passwordInput,
            }));

        $.ajax({
            type: "POST",
            url: "//" + location.host + "/auth/login",
            data: { ajax: true, userData },
            dataType: "JSON",
            cache: false,
        }).done(function (response) {
            if (response.an) {
                $(".login_modal").removeClass("active");
            } else {
                alert(response.message);
            }
        }).fail(function () {
            console.log("error");
        });

    });
}

const checkFantasyStatus = setInterval(function () {
    $.ajax({
        async: true,
        type: "POST",
        url: "//" + location.host + "/auth/status",
    }).done(function (data) {
        if (data == 0) {
            loginBottonClickEvent();
            $(".login_modal").addClass("active");
        } else {
            $(".login_modal").removeClass("active");
        }
    }).fail(function () {

    });
}, 10000);




const utils = {}

utils.toObject = (object) => !!object.length;
utils.toCallback = (callback) => typeof callback === "function" ? callback() : false;


const components = {}

components.dataTable = (object, callback) => {
    if (!utils.toObject(object)) {
        return;
    }
    const dataTable = object,
        tables = dataTable.find("table.tables"),
        thead = dataTable.find("thead"),
        tbody = dataTable.find("tbody"),
        selectitem = tbody.find(".select-item"),
        faketh = thead.find(".fake-th"),
        searchswitch = dataTable.parents().find(".btn-item.searchbar");

    //表頭條件過濾箭頭icon控制
    // function sort_arrow(object) {

    //     $(object).on("click", function () {
    //         if ($(this).hasClass("active")) {
    //             $(this).removeClass("active");
    //         } else {
    //             $(object).removeClass("active");
    //             $(this).addClass("active");
    //         }
    //     });

    //     function change_pwd_send() {
    //         $(".changePWDBtn").click(function () {
    //             const data = {
    //                 pwd: $(".changePWDInput").val(),
    //                 pwd2: $(".changePWDInput2").val()
    //             };
    //             let error = 0;
    //             if ($(".changePWDInput").val().trim().replace(/\s/g, "") === "") error++;
    //             if ($(".changePWDInput2").val().trim().replace(/\s/g, "") === "") error++;
    //             if ($(".changePWDInput").val() !== $(".changePWDInput2").val()) error++;
    //             if (error > 0) {
    //                 alert("請設定的密碼 or 密碼不相同");
    //                 return false;
    //             }
    //             $.ajax({
    //                 url: $(".base-url-plus").val() + "/Fantasy/change-pwd-send",
    //                 method: "post",
    //                 data,
    //                 success: function (type) {
    //                     if (type === "pwd") {
    //                         $(".changePWDErrorMsg").show();
    //                     } else {
    //                         $(".changePWDErrorMsg").hide();
    //                     }
    //                     if (type === "no-login") {
    //                         alert("您尚未當入，即將跳轉登入頁面");
    //                         window.location.href = $(".base-url-plus").val() + "/Fantasy";
    //                     }
    //                     if (type === "success") {
    //                         alert("修改成功，請用新密碼登入");
    //                         window.location.href = $(".base-url-plus").val() + "/Fantasy";
    //                     }
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.error(error);
    //                 }
    //             });
    //         });
    //     }
    // }

    //選取tr狀態設定
    // function selected_tr(object) {

    //     function close_change_pwd_view() {
    //         $(".change_pwd_modal").click(function () {
    //             $(this).remove();
    //         });
    //     }
    //     // $(object).on("click", "input", function() {

    //     //     if ($(this).prop("checked")) {
    //     //         $(this).parents("tr").addClass("selected");
    //     //         $(this).closest(".w_Check").addClass("selected");

    //     function close_change_pwd_view2() {
    //         $(".changePwd_sec").click(function (event) {
    //             event.stopPropagation();
    //         });
    //     }
    //     //     } else {
    //     //         $(this).parents("tr").removeClass("selected");
    //     //         $(this).closest(".w_Check").removeClass("selected");
    //     //     }

    //     // })
    // }

    // function seach_switch(object) {

    //     $("div[data-tableid='new_cms_table']").on("click", "a.btn-item.searchbar", function () {
    //         $(this).find(".search-data").addClass("active").focus();
    //     });
    // }

    // function onload(callback) {
    //     // sort_arrow(faketh);
    //     // selected_tr(selectitem);
    //     seach_switch(searchswitch);

    //     if (!utils.toCallback(callback)) {
    //         return;
    //     }
    // }

    // function onloaded() {

    // }

    // onload(onloaded);

}
components.live_input = (inputObject, titleObject) => {

    //檢查物件是否存在
    utils.toObject(inputObject);
    utils.toObject(titleObject);

    // const checkFantasyStatus = setInterval(function () {
    //     $.ajax({
    //         async: true,
    //         type: "POST",
    //         url: "//" + location.host + "/auth/status"
    //     }).done(function (data) {
    //         if (data == 0) {
    //             $(".login_modal").addClass("active");
    //         } else {
    //             $(".login_modal").removeClass("active");
    //         }
    //     }).fail(function () { });
    // }, 10000);

    $(".login_modal .loginBtn").on("click", function () {
        let accountInput = $(".accountInput").val();
        let passwordInput = $(".passwordInput").val();
        let publicKey = $(".publickey").val();
        let crypt = new JSEncrypt();
        crypt.setPublicKey(publicKey);
        const userData = {
            account: accountInput,
            password: passwordInput
        };
        userData = crypt.encrypt(JSON.stringify(userData));
        $.ajax({
            type: "POST",
            url: "//" + location.host + "/auth/login",
            data: {
                ajax: true,
                userData
            },
            dataType: "JSON",
            cache: false
        }).done(function (response) {
            if (response.an) {
                $(".login_modal").removeClass("active");
            } else {
                alert(response.message);
            }
        }).fail(function () {
            console.log("error");
        });
    });

    // 這是在輸入文字框同時賦予標題欄位值得程式，#wade為輸入框，#wadeh3是賦予hrml值的對象
    //要分兩隻寫，input & select，switch不用，因為放在列表
    const liveInput = inputObject;
    const liveTitle = titleObject;
    const liveTitleHtml = titleObject.html();
    const liveTitleContent = "<span class='original_LiveTitle'>" + liveTitleHtml + "</span>";

    liveInput.bind("input propertychange", function () {
        if (liveInput.val() == "") {
            const liveInputVal = liveInput.val();
            // liveInputVal = liveInputVal.replace(/[~"!<>@#$%^&*()- _=:]/g, ""); //過濾不需要的符號
            console.log(liveInputVal);
            liveInput.val(liveInputVal);
            liveTitle.html(liveTitleHtml);
        } else {
            const liveTitleNew = liveTitleContent + liveInput.val();

            liveTitle.html(liveTitleNew);
        }
    });

}
components.scrollBar = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };

    object.scrollbar();

}
components.sidebar = ($element) => {

    if ($element.find(".level_list").hasClass("open")) {
        $element.find(".level_list.open > .sub-menu").slideDown(200);
    }

    $element.on("click", "li:not(.fms_unlimited_list) > a", function () {
        const level_list = $(this).parent();
        const level_list_li = $(this).parent().parent().find("li");
        const submenu = $(this).next("ul");
        const submenu_LV1 = $(this).parent().find("ul");
        const submenu_LV2 = $(this).parent().parent().find("ul");
        const submenu_All = $element.find("li ul");

        if (!!!submenu.length) return

        if (level_list.hasClass("level-1") && level_list.hasClass("open")) {
            // console.log("level-1 close");
            level_list.removeClass("open");
            submenu_LV1.slideUp(200);
        } else if (level_list.hasClass("level-1")) {
            // console.log("level-1 open");
            level_list_li.removeClass("open");
            submenu_All.slideUp(200);
            level_list.addClass("open");
            submenu.slideDown(200);
        } else if (level_list.hasClass("level-2") && level_list.hasClass("open")) {
            // console.log("level-2 close");
            level_list.removeClass("open");
            submenu.slideUp(200);
        } else if (level_list.hasClass("level-2")) {
            // console.log("level-2 open");
            level_list_li.removeClass("open");
            level_list.addClass("open");
            submenu_LV2.slideUp(200);
            submenu.slideDown(200);
        } else if (level_list.hasClass("open")) {
            // console.log("level-3 close");
            level_list.removeClass("open");
            submenu.slideUp(200);

        } else {
            console.log("level-3 open");
            level_list.addClass("open");
            submenu.slideDown(200);
        }
    });
}
components.summernote = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };

    object.summernote({
        placeholder: "Hello bootstrap 4",
        tabsize: 2,
        height: 250, // set editor height
        minHeight: 250, // set minimum height of editor
        maxHeight: 500, // set maximum height of editor
        focus: true,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "picture", "video"]],
            ["view", ["codeview", "help"]],
        ],
    });
}
components.select2 = (object) => {

    // https://codepen.io/martinsanne/pen/zdZLrd拖曳選項的範例

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };
    object.each(function () {
        if ($(this).hasClass("article4")) {
            $(this).select2({
                placeholder: "Please Select Option",
                placeholderOption: "first",
                allowClear: false,
                width: "100%",
                templateResult: components.articleState,
            });
        } else if ($(this).hasClass("article4_smimg")) {
            $(this).select2({
                placeholder: "Please Select Option",
                placeholderOption: "first",
                allowClear: false,
                width: "100%",
                templateResult: components.articleStateImg,
            });
        } else if ($(this).hasClass("leoncolor")) {
            $(this).select2({
                placeholder: "Please Select Option",
                placeholderOption: "first",
                allowClear: false,
                width: "100%",
                templateResult: components.LeonColor,
            });
        } else if ($(this).hasClass("backend-html")) {
            $(this).select2({
                placeholder: "Please Select Option",
                placeholderOption: "first",
                allowClear: false,
                escapeMarkup: function (markup) {
                    return markup;
                },
                width: "100%"
            });
        } else if ($(this).hasClass("is_tableData")) {
            $(this).select2({
                placeholder: "Please Select Option",
                placeholderOption: "first",
                allowClear: false,
                width: "100%",
            });
        } else {
            $(this).select2({
                placeholder: {
                    id: "-1",
                    text: "Please Select Option"
                },
                //必须添加placeholderOption: "first"属性，否则allowClear不生效
                placeholderOption: "first",
                //開啟清除按鈕按鈕
                allowClear: false,
                width: "100%",
            });
        }
    })
}
components.articleState = (state) => {
    if (!state.id) {
        return state.text;
    }
    if (state.id == "-" || state.id == "--" || state.id == "---" || state.id == "----" || state.id == "-----" || state.id == "------") {
        return state.text;
    } else {
        let imgBox = $(
            "<span><img style='width:180px;margin:5px;background-color:#fff;padding:10px;border:1px solid #aaa;margin-right:20px;' src='" + $(state.element).data("img") + "'></span> " + state.text + "</span>"
        );
        return imgBox;
    }
}
components.LeonColor = (state) => {
    if (!state.id) {
        return state.text;
    }
    if (state.id == "-" || state.id == "--" || state.id == "---" || state.id == "----" || state.id == "-----" || state.id == "------") {
        return state.text;
    } else {
        let imgBox = $(
            "<span style='display:inline-block;width:50px;height:50px;background-color:" + state.text + ";margin-right:10px;border-radius:50%;'></span>" + state.text + "</span>"
        );
        return imgBox;
    }
}
components.tagsinput = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };

    object.tagsinput({
        //输入框输入标签时通过什么按键来输出标签。默认为[13, 188]，代表回车和comma键
        confirmKeys: [13, 188],
        //如果设置为true，会自动删除标签首尾的空白。默认为false
        trimValue: true,
        //当输入框获得焦点时，参数指定的class会被应用到容器上
        // focusClass: "onfocus",
    });

}
components.ios_switch = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };
    object.on("click", function () {
        $(this).toggleClass("on");
    })
}
components.datepicker = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };
    object.datepicker({
        maxViewMode: 2,
        todayBtn: true,
        clearBtn: true,
        language: "zh-TW",
        orientation: "top left",
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true,
        beforeShowDay: function (date) {
            if (date.getMonth() == (new Date()).getMonth())
                switch (date.getDate()) {
                    case 4:
                        return {
                            tooltip: "Example tooltip",
                            classes: "active"
                        };
                    case 8:
                        return false;
                    case 12:
                        return "green";
                }
        },
        beforeShowMonth: function (date) {
            if (date.getMonth() == 8) {
                return false;
            }
        },
        beforeShowYear: function (date) {
            if (date.getFullYear() == 2007) {
                return false;
            }
        },
        datesDisabled: ["09/06/2019", "09/21/2019"],
        defaultViewDate: { year: 1977, month: 4, day: 25 }
    });
}
components.daterangepicker = (object) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };
    object.datePicker({
        hasShortcut: true,
        isRange: true,
        shortcutOptions: [{
            name: "昨天",
            day: "-1,-1",
            time: "00:00:00,23:59:59"
        }, {
            name: "最近一周",
            day: "-7,0",
            time: "00:00:00,"
        }, {
            name: "最近一个月",
            day: "-30,0",
            time: "00:00:00,"
        }, {
            name: "最近三个月",
            day: "-90, 0",
            time: "00:00:00,"
        }]
    });
    return true;
}
components.daterangepicker2 = (object, callback) => {

    //檢查物件是否存在
    if (!utils.toObject(object)) { return };
    object.datePicker({
        hasShortcut: true,
        isRange: true,
        shortcutOptions: [{
            name: "昨天",
            day: "-3,-3",
            time: "00:00:00,23:59:59"
        }, {
            name: "最近一周",
            day: "-7,0",
            time: "00:00:00,"
        }, {
            name: "最近一个月",
            day: "-30,0",
            time: "00:00:00,"
        }, {
            name: "最近三个月",
            day: "-90, 0",
            time: "00:00:00,"
        }]
    });
}
// components.tooltip = (object) => {
//     if (!utils.toObject(object)) { return };
//     object.tooltip();
// }

const uis = {}

uis.datatable = () => {
    components.dataTable($(".datatable"));
}
uis.sidebar = () => {
    components.sidebar($('.content-sidebar .body-list'))
}
uis.scrollbar = () => {
    components.scrollBar($(".mainContent .inner-content .content-scrollbox"));
    components.scrollBar($(".mainContent .content-sidebar .body-list"));
    components.scrollBar($(".hiddenArea .editorNav"));
    components.scrollBar($(".hiddenArea .editorBody"));
}
uis.switchMenu = () => {
    $(".switch-menu").on("click", function () {
        $(".mainContent").toggleClass("content-sidebar-close");
    });
}
uis.init = () => {
    uis.scrollbar()
    uis.switchMenu()
    uis.sidebar()
    uis.datatable()
}

//#06.ajaxdata呼叫Ajax視窗
const ajaxHiddenArea = {}

ajaxHiddenArea.close = (ajaxWrap) => {
    const ajaxWrapParent = ajaxWrap.parents(".hiddenArea");
    const controller = ajaxWrap.find(".close_btn");

    controller.click(function () {
        ajaxWrapParent.addClass("remove");

        if (ajaxWrapParent.hasClass("fms")) {

            setTimeout(function () {
                ajaxWrapParent.removeClass("open").removeClass("remove");
                ajaxWrap.removeClass("active");
                console.log("fms ajax wrap close");
            }, 1000);

        } else if (ajaxWrapParent.hasClass("cms")) {

            setTimeout(function () {
                ajaxWrapParent.removeClass("open").removeClass("remove");
                console.log("ajax wrap close");
            }, 1000);
        }
    });
}

//wade
ajaxHiddenArea.change = (ajaxWrap_New, ajaxWrap_old) => {
    const object = target;
    const change_btn = target.find(".hiddenArea_frame [data-fms-change]");

    change_btn.click(function () {

        const change_btn_attr = change_btn.attr("data-fms-change");

        object.addClass("change");
        object.find("form").removeClass("active");
        object.find("." + change_btn_attr).addClass("active");
        object.removeClass("change");

    });
}


//#07.fms function call 未整理
const fmsFunctions = {}
fmsFunctions.grid_mode = () => {
    const grid = $(".grid_mode"),
        list = grid.find(".list"),
        unlock = grid.find(".unlock"),
        icon_unlock = unlock.find(".icon_unlock");

    //unlock check event
    unlock.on("click", ".icon_unlock", function () {

        if ($(this).closest(list).hasClass("check") == false) {
            $(this).closest(list).addClass("check");
        } else {
            $(this).closest(list).removeClass("check");
        }
    });
}
fmsFunctions.calculate_grid = () => {
    const _innerContent = $(".fms_theme .inner-content")
    const _innerHeight = _innerContent.height()
    const _jumbotronHeight = _innerContent.find(".jumbotron").outerHeight()
    const _cardHeaderHeight = _innerContent.find(".card-header").outerHeight()
    const _frameHeight = _innerHeight - (_jumbotronHeight + _cardHeaderHeight)
    const _gridMode = $(".grid_mode")
    const _frame = $(".grid_mode .frame")
    _frame.css("height", _frameHeight);
}
//table view mode event
fmsFunctions.table_view_mode = () => {
    const _mode_btn = $(".card-header .mode_btn"),
        _table_mode = $(".table_mode");
    _mode_btn.on("click", function () {
        const a = $(this).attr("mode-id");
        const target = "." + a;
        $(target).addClass("open").siblings(".table_mode").removeClass("open");
        $(this).addClass("open").siblings(".mode_btn").removeClass("open");
        //
        if (a == "gd_mode") {

            $(".grid_mode .frame").scrollbar({});
            calculate_grid();
            $(window).resize(function () {
                calculate_grid();
            });
        }
    });
}
//light_box_img 燈箱圖片
fmsFunctions.open_fms_light_box = () => {
    const open_btn = $(".open_img_box"),
        close_btn = $(".light_box_img .close_btn");
    light_box = $(".light_box_img");

    open_btn.on("click", function () {
        light_box.addClass("open");
    });

    close_btn.on("click", function () {
        light_box.addClass("close");
        setTimeout(function () {
            light_box.removeClass("open").removeClass("close");
        }, 500);
    });
}
//content_sidebar_click
fmsFunctions.content_sidebar_click = () => {
    const target = $(".level_list");
    target.on("click", "a", function () {
        const _this_father = $(this).closest(".level_list"),
            _this_grand_father = $(this).closest(".body-list");
        const li = _this_father.find(".level_list"),
            sub = _this_father.find(".sub-menu"),
            arrow = _this_father.find(".arrow");

        //關閉所點擊的分支截點
        if (_this_father.hasClass("open active")) {
            arrow.removeClass("open active");
            sub.slideUp(200, function () {
                li.removeClass("open active");
            });
        }


        //當點擊另一個 level-1 的時候 除了會打開另一個的 level-1

        //同時還會把現在這個 level-1 以及她抵下的所有被打開的分支都關上
        if (_this_grand_father.children(".level_list.open").hasClass("open active")) {
            _this_grand_father.children(".level_list.open").siblings().find(".sub-menu").slideUp(200, function () {
                $(this).find(".level_list").removeClass("open active");
            });
        }
    });
}

$(() => {
    changePwdclick();
    close_notifyScreen2();
    uis.init();
});





