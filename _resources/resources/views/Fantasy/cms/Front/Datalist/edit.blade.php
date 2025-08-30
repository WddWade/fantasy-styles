{{-- 表名跟哪一筆資料 --}}
<form id="{{ $formKey }}">
    <input name="modelName" type="hidden" value="{{ $model }}">

    <div class="backEnd_quill">
        <article class="work_frame">
            <section class="content_box">
                <div class="for_ajax_content">
                    <section class="content_a">
                        <ul class="frame">
                            @php
                                $getList = [
                                    1 => ['key' => '1', 'title' => '分類1'],
                                    2 => ['key' => '2', 'title' => '分類2'],
                                    3 => ['key' => '3', 'title' => '分類3'],
                                    4 => ['key' => '4', 'title' => '分類4'],
                                    5 => ['key' => '5', 'title' => '分類5'],
                                    6 => ['key' => '6', 'title' => '分類6'],
                                    7 => ['key' => '7', 'title' => '分類7'],
                                    8 => ['key' => '8', 'title' => '分類8'],
                                    9 => ['key' => '9', 'title' => '分類9'],
                                    10 => ['key' => '10', 'title' => '分類10'],
                                    11 => ['key' => '11', 'title' => '分類11'],
                                    12 => ['key' => '12', 'title' => '分類12'],
                                    13 => ['key' => '13', 'title' => '分類13'],
                                    14 => ['key' => '14', 'title' => '分類14'],
                                ];
                                $getListMuti = [
                                    1 => ['key' => '1', 'title' => '多筆分類1'],
                                    2 => ['key' => '2', 'title' => '多筆分類2'],
                                    3 => ['key' => '3', 'title' => '多筆分類3'],
                                    4 => ['key' => '4', 'title' => '多筆分類4'],
                                ];
                            @endphp
                            @if ($formKey == 'Form_msg')
<style>
.chat-container {
            display: flex;
            flex-direction: column;
            margin: auto;
            border-radius: 5px;
            background-color: #fff;
        }
        .messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            height: 450px;
            border-bottom: 1px solid #ccc;
        }
        .messages div {
            margin: 10px 0;
            padding: 8px;
            border-radius: 5px;
            white-space: pre-wrap;
            display: flex;
        }
        .messages .content{
            flex: 1;
        }
        .messages .messages_del{
            cursor: pointer;
            width: 50px;
            text-align: right;
        }
        .admin {
            justify-content: flex-end;
        }
        .user .messages_area{
            background-color: #e1f5fe;
            align-self: flex-start;
        }
        .admin .messages_area{
            background-color: #ffe0b2;
            align-self: flex-end;
        }
        .input-area {
            display: flex;
            padding: 10px;
        }
        .input-area input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-area .sendButton {
padding: 10px;
    margin-left: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white !important;
    cursor: pointer;
    display: flex
;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
        }

</style>

<li>
    <div class="chat-container">
        <div class="messages" id="messages">
            <div class="user">
                <div class="messages_area">
                    <span class="content">您好</span>
                </div>    
            </div>
            <div class="admin">
                <div class="messages_area">
                    <span class="content">您好</span>
                    <span class="messages_del" data-id="0">刪除</span>
                </div>    
            </div>
        </div>
        <div class="input-area">
            <textarea type="text" id="messageInput" placeholder="輸入訊息..." ></textarea>
            <a class="sendButton">發送</a>
        </div>
    </div>
</li>
                            @endif
                            @if ($formKey == 'Form_order')
                            <style>
.order-section {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .orderContent h2 {
            margin-top: 0;
            font-size: 18px;
            font-weight: 700;
        }
        .order-detail-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .order-detail-item {
            padding: 5px;
            box-sizing: border-box;
            flex: 1 1 45%; /* 調整寬度以適應兩欄顯示 */
        }
        .order-detail-row {
            display: flex;
            justify-content: space-between;
        }
        .order-detail-left, .order-detail-right {
            flex: 1;
            padding: 10px;
        }
        .orderContent table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .orderContent table, .orderContent th,.orderContent td {
            border: 1px solid #ccc;
        }
        .orderContent th, .orderContent td {
            padding: 3px;
            text-align: left;
        }
        .orderContent th {
            background-color: #f2f2f2;
        }
.printOrder{
    text-align: center;
}
.printOrder a{
            padding: 10px 15px;
            background-color: #007bff;
            color: white !important;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
}


                            </style>
                            <li>
                                <div id="orderContent" class="orderContent">
                                    <h2>訂單編號:NC200202S20250826000001</h2>
                                    <div class="order-section">
                                        <div class="order-detail-row">
                                            <div class="order-detail-left">
                                                <h2>金額資訊</h2>
                                                <div class="order-detail-item"><strong>訂單金額：</strong>1000</div>
                                                <div class="order-detail-item"><strong>商品小計：</strong>1000</div>
                                                <div class="order-detail-item"><strong>加購小計：</strong>1000</div>
                                                <div class="order-detail-item"><strong>宅配運費：</strong>1000</div>
                                                <div class="order-detail-item"><strong>訂單優惠折抵：</strong>1000</div>
                                                <div class="order-detail-item"><strong>Coupon優惠折抵：</strong>1000</div>
                                                <div class="order-detail-item"><strong>運費折抵：</strong>1000</div>
                                            </div>
                                            <div class="order-detail-right">
                                                <h2>經銷商</h2>
                                                <div class="order-detail-item"><strong>門市名稱：</strong> 新竹二輪廠</div>
                                                <div class="order-detail-item"><strong>門市電話：</strong> 04-23223899</div>
                                                <div class="order-detail-item"><strong>門市地址：</strong> 台中市台灣大道</div>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="order-section">
                                        <div class="order-detail-row">
                                            <div class="order-detail-left">
                                                <h2>收件資訊</h2>
                                                <div class="order-detail-item"><strong>收件方式：</strong> 宅配取貨</div>

                                                <div class="order-detail-item"><strong>收件姓名：</strong>Leon</div>
                                                <div class="order-detail-item"><strong>收件聯繫手機：</strong>0912345678</div>
                                                <div class="order-detail-item"><strong>收件縣市：</strong>台中市</div>
                                                <div class="order-detail-item"><strong>收件鄉鎮：</strong>北區</div>
                                                <div class="order-detail-item"><strong>收件地址：</strong>台中市台灣大道</div>
                                            </div>
                                            <div class="order-detail-right">
                                                <h2>訂購資訊</h2>
                                                <div class="order-detail-item"><strong>訂購姓名：</strong> Leon</div>
                                                <div class="order-detail-item"><strong>訂購聯繫手機：</strong> 0912345678</div>
                                                <div class="order-detail-item"><strong>付款方式：</strong> 信用卡一次付清</div>
                                                <div class="order-detail-item"><strong>手機載具：</strong> /123456</div>
                                                <div class="order-detail-item"><strong>公司統編：</strong> 00000000</div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2>購買品項</h2>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>型號</th>
                                                <th>產品</th>
                                                <th>顏色</th>
                                                <th>尺寸</th>
                                                <th>數量</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0SYES-73A-SLL</td>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>0SYES-73A-SLL</td>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>0SYES-73A-SLL</td>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2>消費贈品</h2>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>產品</th>
                                                <th>顏色</th>
                                                <th>尺寸</th>
                                                <th>數量</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2>加購產品</h2>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>型號</th>
                                                <th>產品</th>
                                                <th>顏色</th>
                                                <th>尺寸</th>
                                                <th>數量</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0SYES-73A-SLL</td>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>0SYES-73A-SLL</td>
                                                <td>Star Line 網眼夾克</td>
                                                <td>銀色</td>
                                                <td>LL</td>
                                                <td>5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="printOrder">
                                    <a onclick="printOrder()">列印訂單</a>
                                </div>
                            </li>
                            @endif
                            @if ($formKey == 'search')
                                {{ UnitMaker::textInput([
                                    'name' => $model . '[textInput]',
                                    'title' => 'textInput',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::numberInput([
                                    'name' => $model . '[w_rank]',
                                    'title' => '排序',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::radio_area([
                                    'name' => $model . '[radio_area]',
                                    'title' => 'radio_area',
                                    'value' => '',
                                    'options' => OptionFunction::Datalist_radio_area(),
                                    'tip' => '',
                                ]) }}
                                {{ UnitMaker::select2([
                                    'name' => $model . '[select2]',
                                    'title' => 'select2',
                                    'value' => '',
                                    // 'options' => M('Dataoption')::getList(),
                                    'options' => $getList,
                                    'tip' => '',
                                    'disabled' => '',
                                ]) }}
                                {{ UnitMaker::select2Multi([
                                    'name' => $model . '[select2Multi]',
                                    'title' => 'select2Multi',
                                    'value' => '',
                                    // 'options' => M('Dataoption')::getList(),
                                    'options' => $getListMuti,
                                    'tip' => '',
                                    'disabled' => '',
                                    'isAll' => true,
                                ]) }}
                                {{ UnitMaker::radio_btn([
                                    'name' => $model . '[is_visible]',
                                    'title' => '是否顯示',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::numberInput([
                                    'name' => $model . '[numberInput]',
                                    'title' => 'numberInput',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::colorPicker([
                                    'name' => $model . '[colorPicker]',
                                    'title' => 'colorPicker',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                            @endif
                            @if ($formKey == 'batch')
                                {{ UnitMaker::textInput([
                                    'name' => $model . '[textInput]',
                                    'title' => 'textInput',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::radio_btn([
                                    'name' => $model . '[radio_btn]',
                                    'title' => 'radio_btn',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                                {{ UnitMaker::select2([
                                    'name' => $model . '[select2]',
                                    'title' => 'select2',
                                    'value' => '',
                                    // 'options' => M('Dataoption')::getList(),
                                    'options' => $getList,
                                    'tip' => '',
                                    'disabled' => '',
                                ]) }}
                                {{ UnitMaker::select2Multi([
                                    'name' => $model . '[select2Multi]',
                                    'title' => 'select2Multi',
                                    'value' => !empty($data['select2Multi']) ? $data['select2Multi'] : '',
                                    // 'options' => M('Dataoption')::getList(),
                                    'options' => $getListMuti,
                                    'tip' => '',
                                    'isAll' => true,
                                ]) }}
                                {{ UnitMaker::imageGroup([
                                    'title' => 'imageGroup',
                                    'image_array' => [
                                        [
                                            'name' => $model . '[o_img]',
                                            'title' => '電腦版',
                                            'value' => !empty($data['o_img']) ? $data['o_img'] : '',
                                            'set_size' => 'yes',
                                            'width' => '400',
                                            'height' => '370',
                                        ],
                                        [
                                            'name' => $model . '[o_img_m]',
                                            'title' => '手機版',
                                            'value' => !empty($data['o_img_m']) ? $data['o_img_m'] : '',
                                            'set_size' => 'yes',
                                            'width' => '400',
                                            'height' => '370',
                                        ],
                                    ],
                                    'tip' => '<br>圖片解析度限制:72DPI，檔案格式限定:JPG、PNG、GIF。',
                                ]) }}
                                {{ UnitMaker::textArea([
                                    'name' => $model . '[textArea]',
                                    'title' => 'textArea',
                                    'tip' => '',
                                    'value' => '',
                                ]) }}
                            @endif
                            @if ($formKey == 'Form_tab2')
                                {{ UnitMaker::textInput([
                                    'name' => $model . '[url_name]',
                                    'title' => 'url_name',
                                    'tip' => '',
                                    'value' => !empty($data['url_name']) ? $data['url_name'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'verify' => ['except' => ';/?:@=&<>"#%{}|\^~[]`'],
                                ]) }}
                            @endif
                            @if ($formKey == 'Form_tab0')

                                @if ($role['need_review'] && $role['can_review'] && !$role['no_review'])
                                    {{ UnitMaker::radio_btn([
                                        'name' => $model . '[is_reviewed]',
                                        'title' => '審核通過',
                                        'tip' => '',
                                        'value' => !empty($data['is_reviewed']) ? $data['is_reviewed'] : '',
                                        'disabled' => '',
                                        'class' => '',
                                    ]) }}
                                @endif
                                {{ UnitMaker::radio_btn([
                                    'name' => $model . '[is_visible]',
                                    'title' => '是否顯示',
                                    'tip' => '',
                                    'value' => !empty($data['is_visible']) ? $data['is_visible'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                @if ($role['no_review'])
                                    {{ UnitMaker::radio_btn([
                                        'name' => $model . '[is_preview]',
                                        'title' => '是否顯示於預覽站',
                                        'tip' => '',
                                        'value' => !empty($data['is_preview']) ? $data['is_preview'] : '',
                                        'disabled' => '',
                                        'class' => '',
                                    ]) }}
                                @endif
                                {{ UnitMaker::numberInput([
                                    'name' => $model . '[w_rank]',
                                    'title' => '排序',
                                    'tip' => '',
                                    'value' => !empty($data['w_rank']) ? $data['w_rank'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::tableEdit([
                                    'name' => $model . '[data_table]',
                                    'title' => 'tttt',
                                    'tip' => '測試表格',
                                    'value' => !empty($data['data_table']) ? $data['data_table'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'defaultWidth' => 200,
                                    // 'disableSetHeader' => true,
                                    // 'disableSetMerge' => true,
                                    // 'disableSetFreeze' => true,
                                    // 'disableSetColWidth' => true,
                                    'name2' => $model . '[data_table_merge]',
                                    'name3' => $model . '[data_table_header]',
                                    'name4' => $model . '[data_table_freeze]',
                                    'name5' => $model . '[data_table_col_width]',
                                    'value2' => !empty($data['data_table_merge']) ? $data['data_table_merge'] : '',
                                    'value3' => !empty($data['data_table_header']) ? $data['data_table_header'] : '',
                                    'value4' => !empty($data['data_table_freeze']) ? $data['data_table_freeze'] : '',
                                    'value5' => !empty($data['data_table_col_width']) ? $data['data_table_col_width'] : '',
                                ]) }}
                                {{ UnitMaker::textInput([
                                    'name' => $model . '[textInput]',
                                    'title' => 'textInput',
                                    'tip' => '',
                                    'value' => !empty($data['textInput']) ? $data['textInput'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'verify' => ['except' => ';/?:@=&<>"#%{}|\^~[]`', 'requiredIf' => [$model . '[w_rank]' => '1']],
                                ]) }}
                                {{ UnitMaker::lang_textInput([
                                    'model' => $model,
                                    'name' => 'lang_textInput',
                                    'title' => 'lang_textInput',
                                    'tip' => '',
                                    'value' => $data,
                                    'disabled' => '',
                                ]) }}
                                {{ UnitMaker::textInputTarget([
                                    'name' => $model . '[textInputTarget]',
                                    'title' => 'textInputTarget',
                                    'tip' => '',
                                    'value' => !empty($data['textInputTarget']) ? $data['textInputTarget'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'target' => ['name' => $model . '[textInputTarget_target]', 'value' => $data['textInputTarget_target'] ?? ''],
                                ]) }}
                                {{ UnitMaker::textInputTargetAcc([
                                    'name' => $model . '[textInputTargetAcc]',
                                    'title' => 'textInputTargetAcc',
                                    'tip' => '',
                                    'value' => !empty($data['textInputTargetAcc']) ? $data['textInputTargetAcc'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'target' => ['name' => $model . '[textInputTargetAcc_target]', 'value' => $data['textInputTargetAcc_target'] ?? ''],
                                    'accessible' => ['name' => $model . '[textInputTargetAcc_acc]', 'value' => $data['textInputTargetAcc_acc'] ?? ''],
                                ]) }}
                                {{ UnitMaker::textArea([
                                    'name' => $model . '[textArea]',
                                    'title' => 'textArea',
                                    'tip' => '',
                                    'value' => !empty($data['textArea']) ? $data['textArea'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::lang_textArea([
                                    'model' => $model,
                                    'name' => 'lang_textArea',
                                    'title' => 'lang_textArea',
                                    'tip' => '',
                                    'value' => $data,
                                    'disabled' => '',
                                ]) }}
                                {{ UnitMaker::radio_btn([
                                    'name' => $model . '[radio_btn]',
                                    'title' => 'radio_btn',
                                    'tip' => '',
                                    'value' => !empty($data['radio_btn']) ? $data['radio_btn'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::radio_area([
                                    'name' => $model . '[radio_area]',
                                    'title' => 'radio_area',
                                    'value' => !empty($data['radio_area']) ? $data['radio_area'] : '',
                                    'options' => OptionFunction::Datalist_radio_area(),
                                    'tip' => '',
                                    'disabled' => '',
                                ]) }}

                                {{-- ajax載入選項範例 --}}
                                {{ UnitMaker::select2([
                                    'name' => $model . '[select2]',
                                    'title' => 'select2',
                                    'value' => !empty($data['select2']) ? $data['select2'] : '',
                                    'options' => [],
                                    'tip' => '',
                                    'disabled' => '',
                                    'ajax' => true,
                                    'options_model' => 'Datalist',
                                    'main_model' => 'DatalistCate',
                                    'foreign_key' => 'cate_id',
                                ]) }}
                                {{ UnitMaker::select2Multi([
                                    'name' => $model . '[select2Multi]',
                                    'title' => 'select2Multi',
                                    'value' => !empty($data['select2Multi']) ? $data['select2Multi'] : '',
                                    'options' => OptionFunction::Datalist_select2Multi(),
                                    'tip' => '',
                                    'disabled' => '',
                                    'isAll' => true,
                                ]) }}
                                {{ UnitMaker::select2MultiNew([
                                    'name' => $model . '[select2MultiNew]',
                                    'title' => 'select2MultiNew',
                                    'value' => !empty($data['select2MultiNew']) ? $data['select2MultiNew'] : '',
                                    // 'options' => OptionFunction::Datalist_select2Multi(),
                                    // 'options' => M('Datalist')::getList(100),
                                    'options' => [],
                                    'tip' => '',
                                    'disabled' => '',
                                    'options_max' => 100,
                                    'ajax' => true,
                                    'options_model' => 'Datalist',
                                    'main_model' => 'DatalistCate',
                                    'foreign_key' => 'cate_id',
                                    'two_level' => true,
                                ]) }}
                                {{ UnitMaker::imageGroup([
                                    'title' => 'imageGroup',
                                    'image_array' => [
                                        [
                                            'name' => $model . '[o_img]',
                                            'title' => '電腦版',
                                            'value' => !empty($data['o_img']) ? $data['o_img'] : '',
                                            'set_size' => 'yes',
                                            'width' => '400',
                                            'height' => '370',
                                        ],
                                    ],
                                    'tip' => '<br>圖片解析度限制:72DPI，檔案格式限定:JPG、PNG、GIF。',
                                ]) }}
                                {{ UnitMaker::colorPicker([
                                    'name' => $model . '[colorPicker]',
                                    'title' => 'colorPicker',
                                    'tip' => '',
                                    'value' => !empty($data['colorPicker']) ? $data['colorPicker'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::datePicker([
                                    'name' => $model . '[datePicker]',
                                    'title' => 'datePicker',
                                    'tip' => '',
                                    'value' => !empty($data['datePicker']) ? $data['datePicker'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                    'toolbar' => 'custom',
                                ]) }}
                                {{ UnitMaker::timePicker([
                                    'name' => $model . '[timePicker]',
                                    'title' => 'timePicker',
                                    'tip' => '',
                                    'value' => !empty($data['timePicker']) ? $data['timePicker'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::filePicker([
                                    'name' => $model . '[filePicker]',
                                    'title' => 'filePicker',
                                    'tip' => '',
                                    'value' => !empty($data['filePicker']) ? $data['filePicker'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::numberInput([
                                    'name' => $model . '[numberInput]',
                                    'title' => 'numberInput',
                                    'tip' => '',
                                    'value' => !empty($data['numberInput']) ? $data['numberInput'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{-- {{ UnitMaker::dateRange([
									'name' => $model . '[dateRange_open]',
									'name2' => $model . '[dateRange_close]',
									'title' => 'dateRange',
									'tip' => '',
									'value' => !empty($data['dateRange_open']) ? $data['dateRange_open'] : '',
									'value2' => !empty($data['dateRange_close']) ? $data['dateRange_close'] : '',
									'disabled' => '',
									'class' => '',
								]) }} --}}
                                {{ UnitMaker::dateRange([
                                    'name' => $model . '[dateRange_start]',
                                    'name2' => $model . '[dateRange_end]',
                                    'title' => 'dateRange',
                                    'tip' => '',
                                    'value' => !empty($data['dateRange_start']) ? $data['dateRange_start'] : '',
                                    'value2' => !empty($data['dateRange_end']) ? $data['dateRange_end'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::timeRange([
                                    'name' => $model . '[timeRange_start]',
                                    'name2' => $model . '[timeRange_end]',
                                    'title' => 'timeRange',
                                    'tip' => '',
                                    'value' => !empty($data['timeRange_start']) ? $data['timeRange_start'] : '',
                                    'value2' => !empty($data['timeRange_end']) ? $data['timeRange_end'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::dateTime([
                                    'name' => $model . '[dateTime_start_ymd]',
                                    'name2' => $model . '[dateTime_start_his]',
                                    'title' => 'dateTime上架時間',
                                    'tip' => '',
                                    'value' => !empty($data['dateTime_start_ymd']) ? $data['dateTime_start_ymd'] : '',
                                    'value2' => !empty($data['dateTime_start_his']) ? $data['dateTime_start_his'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::dateTime([
                                    'name' => $model . '[dateTime_end_ymd]',
                                    'name2' => $model . '[dateTime_end_his]',
                                    'title' => 'dateTime下架時間',
                                    'tip' => '',
                                    'value' => !empty($data['dateTime_end_ymd']) ? $data['dateTime_end_ymd'] : '',
                                    'value2' => !empty($data['dateTime_end_his']) ? $data['dateTime_end_his'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                                {{ UnitMaker::imageCoordinate([
                                    'name' => $model . '[imageCoordinate]',
                                    'title' => 'imageCoordinate',
                                    'tip' => '',
                                    'value' => !empty($data['imageCoordinate']) ? $data['imageCoordinate'] : '',
                                    'disabled' => '',
                                    'class' => '',
                                ]) }}
                            @endif
                            @if ($formKey == 'Form_datalist_content')
                                @include('Fantasy.cms_view.back_article_v3', [
                                    'Model' => 'Datalist_content',
                                    'ThreeModel' => 'Datalist_content_img',
                                    'h_headingTag'=>[
                                        // '2' => ['title' => 'h2', 'key' => '2'],
                                        // '3' => ['title' => 'h3', 'key' => '3'],
                                        '4' => ['title' => 'h4', 'key' => '4'],
                                        '5' => ['title' => 'h5', 'key' => '5'],
                                        '6' => ['title' => 'h6', 'key' => '6'],
                                    ],
                                    'h_headingTag_default'=>4,// 需包含於上面選項中
                                    'subh_headingTag'=>[
                                        // '2' => ['title' => 'h2', 'key' => '2'],
                                        // '3' => ['title' => 'h3', 'key' => '3'],
                                        // '4' => ['title' => 'h4', 'key' => '4'],
                                        '5' => ['title' => 'h5', 'key' => '5'],
                                        '6' => ['title' => 'h6', 'key' => '6'],
                                    ],
                                    'subh_headingTag_default'=>5,// 需包含於上面選項中

                                ])
                            @endif
                            @if ($formKey == 'Form_datalist_son')
                                {{ UnitMaker::WNsonTable([
                                    'sort' => 'yes', //是否可以調整順序
                                    'sort_field' => 'w_rank', //自訂排序欄位
                                    'teach' => 'no',
                                    'hasContent' => 'yes', //是否可展開
                                    'tip' => '資料集son',
                                    'create' => 'yes', //是否可新增
                                    'delete' => 'yes', //是否可刪除
                                    'copy' => 'yes', //是否可複製
                                    'MultiImgcreate' => 'yes', //使用多筆圖片
                                    'imageColumn' => 'imageGroup', //預設圖片欄位
                                    'SecondIdColumn' => 'parent_id',
                                    'value' => !empty($associationData['son']['Datalist_son']) ? $associationData['son']['Datalist_son'] : [],
                                    'name' => 'Datalist_son',
                                    'tableSet' => [
                                        [
                                            'type' => 'just_show',
                                            'title' => 'textInput',
                                            'value' => 'textInput',
                                            'auto' => true,
                                        ],
                                        [
                                            'type' => 'radio_btn',
                                            'title' => '預覽',
                                            'value' => 'is_preview',
                                            'default' => 1,
                                        ],
                                        [
                                            'type' => 'radio_btn',
                                            'title' => '是否顯示',
                                            'value' => 'is_visible',
                                        ],
                                    ],
                                    'tabSet' => [
                                        [
                                            'title' => '內容編輯',
                                            'content' => [
                                                [
                                                    'type' => 'tableEdit',
                                                    'value' => 'data_table',
                                                    'value2' => 'data_table_merge',
                                                    'value3' => 'data_table_header',
                                                    'value4' => 'data_table_freeze',
                                                    'value5' => 'data_table_col_width',
                                                    'title' => '表格編輯',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'textInput',
                                                    'value' => 'textInput',
                                                    'title' => 'textInput',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'lang_textInput',
                                                    'value' => 'lang_textInput',
                                                    'title' => 'lang_textInput',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'textInputTarget',
                                                    'value' => 'textInputTarget',
                                                    'title' => 'textInputTarget',
                                                    'target' => ['name' => 'textInputTarget_target'],
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'textInputTargetAcc',
                                                    'value' => 'textInputTargetAcc',
                                                    'title' => 'textInputTargetAcc',
                                                    'tip' =>
                                                        '可輸入多行文字，內容支援HTML，不支援CSS、JQ、JS等語法，斷行請多利用Enter，輸入區域可拖曳右下角縮放。',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                    'target' => ['name' => 'textInputTargetAcc_target'],
                                                    'accessible' => ['name' => 'textInputTargetAcc_acc'],
                                                ],
                                                [
                                                    'type' => 'textArea',
                                                    'value' => 'textArea',
                                                    'title' => 'textArea',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'lang_textArea',
                                                    'value' => 'lang_textArea',
                                                    'title' => 'lang_textArea',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'radio_btn',
                                                    'value' => 'radio_btn',
                                                    'title' => 'radio_btn',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'radio_area',
                                                    'value' => 'radio_area',
                                                    'title' => 'radio_area',
                                                    'options' => OptionFunction::Datalist_son_radio_area(),
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'select2',
                                                    'value' => 'select2',
                                                    'title' => 'select2',
                                                    // 'options' => OptionFunction::Datalist_son_select2(),
                                                    'options' => [],
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'ajax' => true,
                                                    'options_model' => 'Datalist',
                                                    'main_model' => 'DatalistCate',
                                                    'foreign_key' => 'cate_id',
                                                ],
                                                [
                                                    'type' => 'select2Multi',
                                                    'value' => 'select2Multi',
                                                    'title' => 'select2Multi',
                                                    'options' => OptionFunction::Datalist_son_select2Multi(),
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                ],
                                                [
                                                    'type' => 'image_group',
                                                    'title' => 'imageGroup',
                                                    'image_array' => [
                                                        [
                                                            'title' => '電腦版',
                                                            'value' => 'imageGroup',
                                                            'set_size' => 'yes',
                                                            'width' => '400',
                                                            'height' => '370',
                                                        ],
                                                    ],
                                                    'tip' => '<br>圖片解析度限制:72DPI，檔案格式限定:JPG、PNG、GIF。',
                                                ],
                                                [
                                                    'type' => 'colorPicker',
                                                    'value' => 'colorPicker',
                                                    'title' => 'colorPicker',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'datePicker',
                                                    'value' => 'datePicker',
                                                    'title' => 'datePicker',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'dateRange',
                                                    'value' => 'dateRange_start',
                                                    'value2' => 'dateRange_end',
                                                    'title' => 'dateRange',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'timeRange',
                                                    'value' => 'timeRange_start',
                                                    'value2' => 'timeRange_end',
                                                    'title' => 'timeRange',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'timePicker',
                                                    'value' => 'timePicker',
                                                    'title' => 'timePicker',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'dateTime',
                                                    'value' => 'dateTime_start_ymd',
                                                    'value2' => 'dateTime_start_his',
                                                    'title' => 'dateTime上架時間',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'dateTime',
                                                    'value' => 'dateTime_end_ymd',
                                                    'value2' => 'dateTime_end_his',
                                                    'title' => 'dateTime下架時間',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                                [
                                                    'type' => 'filePicker',
                                                    'value' => 'filePicker',
                                                    'title' => 'filePicker',
                                                    'tip' => '',
                                                    'default' => '',
                                                    'auto' => true,
                                                    'disabled' => '',
                                                    'class' => '',
                                                ],
                                            ],
                                        ],
                                        [
                                            'title' => '資料集son_son',
                                            'content' => [],
                                            'is_three' => 'yes',
                                            'create' => 'yes',
                                            'delete' => 'yes',
                                            'copy' => 'yes',
                                            'sort_field' => '', //自訂排序欄位
                                            'three_model' => 'Datalist_three',
                                            'three' => [
                                                'SecondIdColumn' => 'second_id',
                                                'title' => '資料集son_son',
                                                'tip' => '',
                                                'three_tableSet' => [
                                                    [
                                                        'type' => 'just_show',
                                                        'title' => 'textInput',
                                                        'value' => 'textInput',
                                                        'auto' => true,
                                                    ],
                                                ],
                                                'three_content' => [
                                                    [
                                                        'type' => 'textInput',
                                                        'value' => 'textInput',
                                                        'title' => 'textInput',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'lang_textInput',
                                                        'value' => 'lang_textInput',
                                                        'title' => 'lang_textInput',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'textInputTarget',
                                                        'value' => 'textInputTarget',
                                                        'title' => 'textInputTarget',
                                                        'target' => ['name' => 'textInputTarget_target'],
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'textInputTargetAcc',
                                                        'value' => 'textInputTargetAcc',
                                                        'title' => 'textInputTargetAcc',
                                                        'tip' =>
                                                            '可輸入多行文字，內容支援HTML，不支援CSS、JQ、JS等語法，斷行請多利用Enter，輸入區域可拖曳右下角縮放。',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                        'target' => ['name' => 'textInputTargetAcc_target'],
                                                        'accessible' => ['name' => 'textInputTargetAcc_acc'],
                                                    ],
                                                    [
                                                        'type' => 'textArea',
                                                        'value' => 'textArea',
                                                        'title' => 'textArea',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'lang_textArea',
                                                        'value' => 'lang_textArea',
                                                        'title' => 'lang_textArea',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'radio_btn',
                                                        'value' => 'radio_btn',
                                                        'title' => 'radio_btn',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'radio_area',
                                                        'value' => 'radio_area',
                                                        'title' => 'radio_area',
                                                        'options' => OptionFunction::Datalist_son_radio_area(),
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'select2',
                                                        'value' => 'select2',
                                                        'title' => 'select2',
                                                        'options' => OptionFunction::Datalist_son_select2(),
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'select2Multi',
                                                        'value' => 'select2Multi',
                                                        'title' => 'select2Multi',
                                                        'options' => OptionFunction::Datalist_son_select2Multi(),
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                    ],
                                                    [
                                                        'type' => 'image_group',
                                                        'title' => 'imageGroup',
                                                        'image_array' => [
                                                            [
                                                                'title' => '電腦版',
                                                                'value' => 'imageGroup',
                                                                'set_size' => 'yes',
                                                                'width' => '400',
                                                                'height' => '370',
                                                            ],
                                                        ],
                                                        'tip' => '<br>圖片解析度限制:72DPI，檔案格式限定:JPG、PNG、GIF。',
                                                    ],
                                                    [
                                                        'type' => 'colorPicker',
                                                        'value' => 'colorPicker',
                                                        'title' => 'colorPicker',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'datePicker',
                                                        'value' => 'datePicker',
                                                        'title' => 'datePicker',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'dateRange',
                                                        'value' => 'dateRange_start',
                                                        'value2' => 'dateRange_end',
                                                        'title' => 'dateRange',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'timePicker',
                                                        'value' => 'timePicker',
                                                        'title' => 'timePicker123',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'timeRange',
                                                        'value' => 'timeRange_start',
                                                        'value2' => 'timeRange_end',
                                                        'title' => 'timeRange',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'dateTime',
                                                        'value' => 'dateTime_start_ymd',
                                                        'value2' => 'dateTime_start_his',
                                                        'title' => 'dateTime上架時間',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'dateTime',
                                                        'value' => 'dateTime_end_ymd',
                                                        'value2' => 'dateTime_end_his',
                                                        'title' => 'dateTime下架時間',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                    [
                                                        'type' => 'filePicker',
                                                        'value' => 'filePicker',
                                                        'title' => 'filePicker',
                                                        'tip' => '',
                                                        'default' => '',
                                                        'auto' => true,
                                                        'disabled' => '',
                                                        'class' => '',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ]) }}
                            @endif
                            @if ($formKey == 'Form_1')
                                @include('Fantasy.cms_view.back_article_v3', [
                                    'Model' => 'Elite_business_dept_content',
                                    'ThreeModel' => 'Elite_business_dept_content_img',
                                ])
                            @endif

                            @if ($formKey == 'Form_tabSEO')
                                @include('Fantasy.cms_view.includes.seo_form')
                            @endif
                        </ul>
                    </section>
                </div>
            </section>
        </article>
    </div>
</form>
