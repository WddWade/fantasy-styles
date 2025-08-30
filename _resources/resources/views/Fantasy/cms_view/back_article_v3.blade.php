@php
    $article_options = [
        // 樣式
        'Style' => [
            'typeBasic' => ['title' => '基本段落樣式，由上至下排列，依序為主標題 > 影像+描述 > 副標題 > 內文＋按鈕。', 'key' => 'typeBasic'],
            // 'typeSL'=> ["title" => "由上至下排列，依序為主標題 > 影像+描述 > 副標題置左 > 內文＋按鈕置右。","key" => 'typeSL'],
            // 'typeSR'=> ["title" => "由上至下排列，依序為主標題 > 影像+描述 > 副標題置右 > 內文＋按鈕置左。","key" => 'typeSR'],

            'typeU' => ['title' => '由上至下排列，依序為主標題 > 副標題 > 內文＋按鈕 > 影像+描述。', 'key' => 'typeU'],
            // 'typeUL'=> ["title" => "由上至下排列，依序為主標題置左 > 副標題 + 內文＋按鈕置右 > 影像+描述。","key" => 'typeUL'],
            // 'typeUR'=> ["title" => "由上至下排列，依序為主標題置右 > 副標題 + 內文＋按鈕置左 > 影像+描述。","key" => 'typeUR'],

            'typeD' => ['title' => '由上至下排列，依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeD'],
            // 'typeDL'=> ["title" => "由上至下排列，依序為影像+描述 > 主標題置左 > 副標題 + 內文＋按鈕置右。","key" => 'typeDL'],
            // 'typeDR'=> ["title" => "由上至下排列，依序為影像+描述 > 主標題置右 > 副標題 + 內文＋按鈕置左。","key" => 'typeDR'],

            'typeL' => ['title' => '依序為主標題 + 副標題 + 內文＋按鈕置左 > 影像+描述置右。', 'key' => 'typeL'],
            'typeR' => ['title' => '依序為影像+描述置左 > 主標題 + 副標題 + 內文＋按鈕置右。', 'key' => 'typeR'],

            'typeLR' => ['title' => '依序為主標題 + 副標題 + 內文＋按鈕置左圍繞影像+描述置右。', 'key' => 'typeLR'],
            'typeRR' => ['title' => '依序為主標題 + 副標題 + 內文＋按鈕置右圍繞影像+描述置左。', 'key' => 'typeRR'],

            'typeQuote' => ['title' => '引言段落樣式，僅有一段標題文字，並自帶" "強調顯示。', 'key' => 'typeQuote'],

            'typeTable' => ['title' => '表格樣式，由上至下排列，依序為主標題 > 表格 > 內文。', 'key' => 'typeTable'],

            'typeF' => ['title' => '滿版背景，段落垂直置中，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeF'],
            'typeFL' => ['title' => '滿版背景，段落垂直置左，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeFL'],
            'typeFR' => ['title' => '滿版背景，段落垂直置右，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeFR'],

            'typeFBox' => ['title' => '滿版背景並使段落區塊中的內文區域產生色塊，段落垂直置中，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeFBox'],
            'typeFBoxL' => ['title' => '滿版背景並使段落區塊中的內文區域產生色塊，段落垂直置左，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeFBoxL'],
            'typeFBoxR' => ['title' => '滿版背景並使段落區塊中的內文區域產生色塊，段落垂直置右，由上至下依序為影像+描述 > 主標題 > 副標題 > 內文＋按鈕。', 'key' => 'typeFBoxR'],

            // '_article -typeFull-BoxSlice'=> ["title" => "滿版背景，區塊預設為左右置中對齊，段落區塊左右置中垂直切割區塊，，由上至下依序為主標題 > 影像+描述 > 副標題 > 內文＋按鈕。","key" => '_article -typeFull-BoxSlice'],
            // '_article -typeFull-BoxSlice-L'=> ["title" => "滿版背景，區塊預設為置左對齊，段落區塊置左垂直切割區塊，由上至下依序為主標題 > 影像+描述 > 副標題 > 內文＋按鈕。","key" => '_article -typeFull-BoxSlice-L'],
            // '_article -typeFull-BoxSlice-R'=> ["title" => "滿版背景，區塊預設為置右對齊，段落區塊置右垂直切割區塊，由上至下依序為主標題 > 影像+描述 > 副標題 > 內文＋按鈕。","key" => '_article -typeFull-BoxSlice-R'],

            // '_article -typeSwiper-L'=> ["title" => "設定段落為 Swiper 模式，段落內容由左至右依序為影像 > 主標題＋副標題＋內文＋按鈕","key" => '_article -typeSwiper-L'],
            // '_article -typeSwiper-R'=> ["title" => "設定段落為 Swiper 模式，段落內容由左至右依序為主標題＋副標題＋內文＋按鈕 > 影像","key" => '_article -typeSwiper-R'],

            // '_article -typeOverlap-LU'=> ["title" => "段落區塊由上至下編排，依序為影像*2-大圖置左小圖置右下 > 主標題 > 副標題 > 內文 > 按鈕","key" => '_article -typeOverlap-LU'],
            // '_article -typeOverlap-LD'=> ["title" => "段落區塊由上至下編排，依序為主標題 > 副標題 > 內文 > 按鈕 > 影像*2-大圖置左小圖置右上","key" => '_article -typeOverlap-LD'],
            // '_article -typeOverlap-RU'=> ["title" => "段落區塊由上至下編排，依序為影像*2-大圖置右小圖置左下 > 主標題 > 副標題 > 內文 > 按鈕","key" => '_article -typeOverlap-RU'],
            // '_article -typeOverlap-RD'=> ["title" => "段落區塊由上至下編排，依序為影像*2-大圖置右小圖置左上 > 主標題 > 副標題 > 內文 > 按鈕","key" => '_article -typeOverlap-RD'],
        ],
        //文字黑白色
        'headingTag' => [
            '2' => ['title' => 'h2', 'key' => '2'],
            '3' => ['title' => 'h3', 'key' => '3'],
            '4' => ['title' => 'h4', 'key' => '4'],
            '5' => ['title' => 'h5', 'key' => '5'],
            '6' => ['title' => 'h6', 'key' => '6'],
        ],
        //文字黑白色
        'textColor' => [
            '#000' => ['title' => '黑色', 'key' => '#000'],
            '#fff' => ['title' => '白色', 'key' => '#fff'],
        ],
        // 標題對齊設定
        'AlignHorizontal4Title' => [
            'left' => ['title' => '靠左對齊', 'key' => 'left'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'right' => ['title' => '靠右對齊', 'key' => 'right'],
        ],

        // 副標題對齊設定
        'AlignHorizontal4SubTitle' => [
            'left' => ['title' => '靠左對齊', 'key' => 'left'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'right' => ['title' => '靠右對齊', 'key' => 'right'],
        ],

        // 內文區塊對齊設定
        'AlignHorizontal4Text' => [
            'left' => ['title' => '靠左對齊', 'key' => 'left'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'right' => ['title' => '靠右對齊', 'key' => 'right'],
        ],

        // 按鈕連結開啟方式
        'LinkType' => [
            '1' => ['key' => '1', 'title' => '本頁開啟'],
            '2' => ['key' => '2', 'title' => '另開新頁'],
        ],

        // 按鈕位置 - 對齊方式
        'AlignHorizontal4Btn' => [
            'left' => ['title' => '靠左對齊', 'key' => 'left'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'right' => ['title' => '靠右對齊', 'key' => 'right'],
        ],

        // 影片來源
        'VideoType' => [
            '-' => ['title' => '無', 'key' => '-','hidetip'=>'youtube,youku,tiktok','hide'=>'video,video_start_time,highquality'],
            'youtube' => ['title' => 'YouTube', 'key' => 'youtube','hidetip'=>'youku,tiktok,instagram','hide'=>''],
            'youku' => ['title' => 'Youku', 'key' => 'youku','hidetip'=>'youtube,tiktok,instagram','hide'=>'video_start_time,highquality'],
            'tiktok' => ['title' => 'Tiktok', 'key' => 'tiktok','hidetip'=>'youtube,youku,instagram','hide'=>'video_start_time,highquality'],
            'instagram' => ['title' => 'Instagram Reels', 'key' => 'instagram','hidetip'=>'youtube,youku,tiktok','hide'=>'video_start_time,highquality'],
        ],

        // 圖片每列數量設定
        'isRow4Img' => [
            'x1' => ['title' => '一張圖', 'key' => 'x1'],
            'x2' => ['title' => '兩張圖', 'key' => 'x2'],
            'x3' => ['title' => '三張圖', 'key' => 'x3'],
            'x4' => ['title' => '四張圖', 'key' => 'x4'],
            'x5' => ['title' => '五張圖', 'key' => 'x5'],
        ],

        // 圖片比例設定
        'imgSize' => [
            ''=> ["title" => "不指定","key" => ''],
            'x11' => ['title' => '1:1', 'key' => 'x11'],
            'x34' => ['title' => '3:4', 'key' => 'x34'],
            'x43' => ['title' => '4:3', 'key' => 'x43'],
            'x169' => ['title' => '16:9', 'key' => 'x169'],
        ],

        // 文字與圖片垂直對齊設定
        'AlignVertical4TextWithImg' => [
            'up' => ['title' => '置上', 'key' => 'up'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'down' => ['title' => '置下', 'key' => 'down'],
        ],

        // 圖片垂直對齊設定
        'CommonAlignVertical4Img' => [
            'up' => ['title' => '置上', 'key' => 'up'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'down' => ['title' => '置下', 'key' => 'down'],
        ],

        // 圖片描述文字對齊
        'CommonAlignHorizontal4ImgText' => [
            'left' => ['title' => '靠左對齊', 'key' => 'left'],
            'center' => ['title' => '置中', 'key' => 'center'],
            'right' => ['title' => '靠右對齊', 'key' => 'right'],
        ],

        // 圖片輪播 - 出現圖片數量
        'isRow4Swiper' => [
            'x1' => ['title' => '一張圖', 'key' => '1'],
            'x2' => ['title' => '兩張圖', 'key' => '2'],
            'x3' => ['title' => '三張圖', 'key' => '3'],
            'x4' => ['title' => '四張圖', 'key' => '4'],
            'x5' => ['title' => '五張圖', 'key' => '5'],
        ],

        // 內文寬度設定
        'fullSize' => [
            's' => ['title' => '小', 'key' => 's'],
            'm' => ['title' => '中', 'key' => 'm'],
            'l' => ['title' => '大', 'key' => 'l'],
        ],

        //手機版排版
        'mobileRWD' => [
            'off_b' => ['title' => '與電腦版順序一致', 'key' => 'off_b', 'img' => '/vender/assets/img/article4/rwd-t.png' , 'class'=>'rwd_off_t'],
            'off_t' => ['title' => '與電腦版順序一致', 'key' => 'off_t', 'img' => '/vender/assets/img/article4/rwd-b.png' , 'class'=>'rwd_off_b'],
            'on_b' => ['title' => '與電腦版順序相反', 'key' => 'on_b', 'img' => '/vender/assets/img/article4/rwd-b.png' , 'class'=>'rwd_b'],
            'on_t' => ['title' => '與電腦版順序相反', 'key' => 'on_t', 'img' => '/vender/assets/img/article4/rwd-t.png' , 'class'=>'rwd_t'],
        ],
        'BtnAction' => [
            '0' => ['title' => '超連結', 'key' => '0','hide'=>'button_file'],
            '1' => ['title' => '檔案下載', 'key' => '1','hide'=>'button_link'],
        ],
        'button_visible' => [
            '1' => ['title' => '是', 'key' => '1','hide'=>''],
            '0' => ['title' => '否', 'key' => '0','hide'=>'button,button_action,button_link,button_file,button_align,button_textcolor,button_color,button_color_hover'],
        ],
        'isSwiper' => [
            '1' => ['title' => '是', 'key' => '1','hide'=>'img_firstbig,img_row'],
            '0' => ['title' => '否', 'key' => '0','hide'=>'swiper_num,swiper_autoplay,swiper_loop,swiper_arrow,swiper_nav'],
        ],
        'yesno' => [
            '1' => ['title' => '是', 'key' => '1','hide'=>''],
            '0' => ['title' => '否', 'key' => '0','hide'=>''],
        ],
        'truefalse' => [
            'false' => ['title' => '否', 'key' => 'false','hide'=>''],
            'true' => ['title' => '是', 'key' => 'true','hide'=>''],
        ],
    ];
    $tableSet = [];
    $tableSet[] = ['type' => 'select_article4_show','title' => '段落樣式','value' => 'article_style','options' => $article_options['Style'],'auto' => true];
    if($role['no_review']){
        $tableSet[] = ['type' => 'radio_btn','title' => '預覽','value' => 'is_preview'];
    }
    $tableSet[] = ['type' => 'radio_btn','title' => '是否顯示','value' => 'is_visible'];
@endphp

{{ UnitMaker::WNsonTable([
    'sort' => 'yes', //是否可以調整順序
    'teach' => 'no',
    'hasContent' => 'yes', //是否可展開
    'tip' => '文章段落編輯',
    'sort_field' => 'w_rank',
    'copy' => 'yes',
    'create' => 'yes', //是否可新增
    'delete' => 'yes', //是否可刪除
    'SecondIdColumn' => 'parent_id',
    'value' => !empty($associationData['son'][$Model]) ? $associationData['son'][$Model] : [],
    'name' => $Model,
    'multiLocal' => $multiLocal ?? false,
    'SecondIdColumn' => 'parent_id',
    'tableSet' => $tableSet,
    'tabSet' => [
        [
            'title' => '段落樣式',
            'content' => [
                [
                    'type' => 'article_select',
                    'title' => '電腦版段落樣式',
                    'value' => 'article_style',
                    'default' => '',
                    'options' => $article_options['Style'],
                    'article4' => true,
                    'auto' => true,
                ],
                [
                    'type' => 'radio_area',
                    'title' => '手機版段落樣式',
                    'value' => 'mobile_rwd',
                    // 'tip' => '若啟用後則圖文排版於手機版顯示與電腦版相反。如原本為圖上文下，開啟後則會變為文上圖下<br>
                    //     原始圖文配置為由左至右對應至手機版由上至下<br>
                    //     滿版圖文於手機版預設皆為圖上文下',
                    'default' => '',
                    'options' => $article_options['mobileRWD'],
                ],
                [
                    'type' => 'article_wysiwyg',
                    'title' => '即時預覽',
                    'sub_title'=> false, //是否有副標題
                ],
            ]
        ],
        [
            'title' => '基本內容編輯',
            'content' => [
                //內容元件
                // [
                //     'type' => 'multiLocal',
                //     'content'=>[
                //         [
                //             'type' => 'textInput',
                //             'title' => '標題欄位',
                //             'value' => 'article_title',
                //             'tip' => '單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。'
                //         ],
                //         [
                //             'type' => 'textSummernote',
                //             'title' => '內文欄位',
                //             'value' => 'article_inner',
                //             'tip' => '若有使用列點樣式，以內文區塊對齊需以置左樣式為主',
                //         ],

                //     ]
                // ],
                [
                    'type' => 'textInput',
                    'title' => '標題欄位',
                    'value' => 'article_title',
                    'tip' => '單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。',
                ],
                [
                    'type' => 'radio_area',
                    'title' => '標題-H標籤層級',
                    'value' => 'h_heading_tag_num',
                    'tip' => '選擇h4為&lt;h4&gt;&lt;/h4&gt;以此類推。',
                    'default' => $h_headingTag_default??'4',
                    'options' => $h_headingTag??$article_options['headingTag'],
                ],
                [
                    'type' => 'radio_area',
                    'title' => '表格是否啟用markdown功能',
                    'value' => 'data_table_markdown',
                    'tip' => '影響下方表格洗至前台的格式，可參考<a href="https://hackmd.io/@eMP9zQQ0Qt6I8Uqp2Vqy6w/SyiOheL5N/%2FBVqowKshRH246Q7UDyodFA" target="_blank">https://hackmd.io/@eMP9zQQ0Qt6I8Uqp2Vqy6w/SyiOheL5N/%2FBVqowKshRH246Q7UDyodFA</a><br>
                                能使用的功能:h1、h2、h3、h4、h5、h6、b、del、i、em、strong、p、ul、ol、li，<br>
                                外加一個置中功能，使用方法： @center@文字@center@',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
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
                // [
                //     'type' => 'textInput',
                //     'title' => '副標題欄位',
                //     'value' => 'article_sub_title',
                //     'tip' => '單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。',
                // ],
                // [
                //     'type' => 'radio_area',
                //     'title' => '副標題-H標籤層級',
                //     'value' => 'subh_heading_tag_num',
                //     'tip' => '選擇h5為<h5></h5>以此類推。',
                //     'default' => $subh_headingTag_default??'5',
                //     'options' => $subh_headingTag??$article_options['headingTag'],
                // ],
                [
                    'type' => 'textSummernote',
                    'title' => '內文欄位',
                    'value' => 'article_inner',
                    'tip' => '若有使用列點樣式，以內文區塊對齊需以置左樣式為主，若需要改變列點點點顏色, li 那層需加上 style="--pointColor: #00D7CA" 改變顏色',
                ],
                [
                    'type' => 'textArea',
                    'title' => 'Instagram 內嵌貼文結構',
                    'value' => 'instagram_content',
                    'tip' => '請填入ig官方提供的內嵌結構',
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '標題對齊設定',
                    'value' => 'h_align',
                    'tip' => '',
                    'options' => $article_options['AlignHorizontal4Title'],
                ],
                // [
                //     'type' => 'radio_area',
                //     'empty' => 'yes',
                //     'title' => '副標題對齊設定',
                //     'value' => 'subh_align',
                //     'tip' => '',
                //     'options' => $article_options['AlignHorizontal4SubTitle'],
                // ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '內文區塊對齊設定',
                    'value' => 'p_align',
                    'tip' => '',
                    'options' => $article_options['AlignHorizontal4Text'],
                ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '標題文字顏色',
                //     'value' => 'h_color',
                //     'tip' => '',
                // ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '標題文字顏色',
                    'value' => 'h_color',
                    'tip' => '',
                    'options' => $article_options['textColor'],
                ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '副標題文字顏色',
                //     'value' => 'subh_color',
                //     'tip' => '',
                // ],
                // [
                //     'type' => 'radio_area',
                //     'empty' => 'yes',
                //     'title' => '副標題文字顏色',
                //     'value' => 'subh_color',
                //     'tip' => '',
                //     'options' => $article_options['textColor'],
                // ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '內文文字顏色',
                //     'value' => 'p_color',
                //     'tip' => '',
                // ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '內文文字顏色',
                    'value' => 'p_color',
                    'tip' => '',
                    'options' => $article_options['textColor'],
                ],
            ],
        ],
        [
            'title' => '按鈕設定',
            'content' => [
                [
                    'type' => 'radio_area',
                    'title' => '是否啟用按鈕',
                    'value' => 'button_visible',
                    'tip' => '啟用後請務必輸入按鈕文字並填寫網址或選擇檔案',
                    'options' => $article_options['button_visible'],
                    'default' => 0
                ],
                [
                    'type' => 'textInput',
                    'title' => '按鈕文字',
                    'value' => 'button',
                    'tip' => '此欄位為選填，單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。',
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'no',
                    'title' => '按鈕行為',
                    'value' => 'button_action',
                    'tip' => '請選擇按鈕點擊後的動作，並填寫對應的資料',
                    'options' => $article_options['BtnAction'],
                ],
                [
                    'type' => 'textInput',
                    'title' => '按鈕連結',
                    'value' => 'button_link',
                    'target'=> ['name'=>'link_type'],
                    'class'=>'CheckDomain',
                    'tip' => '請填入連結網址，此欄位為選填，若未填寫連結則不顯示按鈕。<br>
                     站內請填寫如: tw/product<br>
                     站外請填寫完整網址如: https://www.google.com.tw/',
                ],
                [
                    'type' => 'filePicker',
                    'title' => '檔案下載',
                    'value' => 'button_file',
                    'tip' => '請選擇要提供下載的檔案，例如RAR、ZIP、PDF、DOC、XLSX、圖檔類型'
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '按鈕位置 - 對齊方式',
                    'value' => 'button_align',
                    'tip' => '',
                    'options' => $article_options['AlignHorizontal4Btn'],
                ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '按鈕文字 - 顏色',
                //     'value' => 'button_textcolor',
                //     'tip' => '',
                // ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '按鈕文字 - 顏色',
                    'value' => 'button_textcolor',
                    'tip' => '',
                    'options' => $article_options['textColor'],
                ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '按鈕底色 - 顏色',
                //     'value' => 'button_color',
                //     'tip' => '',
                //     'default'=>'#ffffff'
                // ],
                // [
                //     'type' => 'colorPicker',
                //     'title' => '按鈕底色 - hover顏色',
                //     'value' => 'button_color_hover',
                //     'tip' => '按鈕滑鼠移至顏色設定。',
                //     'default'=>'#eeeeee'
                // ],

            ],
        ],
        [
            'title' => '圖片 / 影片管理',
            'content' => [],
            'is_three' => 'yes',
            'copy' => 'yes',
            'sort_field' => 'w_rank',
            'three_model' => $ThreeModel,
            'SecondIdColumn' => 'parent_id',
            'three' => [
                'title' => '圖片 / 影片管理',
                'tip' =>
                    '可設定多張圖片 / 影片的編排格式，其中靠上圖片、靠下圖片、圖片 / 影片的段落類型編排為橫向並排，而文繞圖、靠左圖片、靠右圖片段落類型的編排為重直排列。',
                'SecondIdColumn' => 'second_id', //存放第二層ID的欄位
                'MultiImgcreate' => 'yes', //使用多筆圖片
                'imageColumn' => 'image', //預設圖片欄位
                'article_video'=>'article_video',
                'three_tableSet' => [
                    [
                        'type' => 'article_text_image',
                        'title' => '圖片',
                        'value' => 'image',
                    ],
                ],
                'three_content' => [
                    [
                        'type' => 'image_group',
                        'title' => '圖片',
                        'tip' => '請選擇圖片，若需多張圖請再增加一筆圖片 / 影片資料。',
                        'image_array' => [
                            [
                                'title' => '圖片',
                                'value' => 'image',
                                'set_size' => 'no',
                            ],
                        ],
                    ],
                    [
                        'type' => 'textInput',
                        'title' => '圖片描述',
                        'value' => 'title',
                        'tip' =>
                            '單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。',
                    ],

                    [
                        'type' => 'radio_area',
                        'title' => '影片來源',
                        'value' => 'video_type',
                        'options' => $article_options['VideoType'],
                        'tip' => '請務必選擇影片來源，預設為YouTube。',
                        'default' => '-'
                    ],
                    [
                        'type' => 'textInput',
                        'title' => '影片代碼(貼上網址可自動轉換)',
                        'value' => 'video',
                        'tip' =>
                            '若來源選擇YouTube，在欄位內輸入Youtube影片網址V後面的英文數字。<br>例：https://www.youtube.com/watch?v=abcdef，請輸入abcdef<br><br>若來源選擇YOUKU，在欄位內輸入YOUKU影片網址/id_後面到==.html前的英文數字。<br>例：https://v.youku.com/v_show/id_abcdef==.html ，請輸入abcdef。',
                    ],
                    [
                        'type' => 'textInput',
                        'title' => '播放起始秒數',
                        'value' => 'video_start_time',
                        'tip' => '需將分鐘轉為秒數，若要從2分鐘的地方開始播放，請設定120',
                    ],
                    [
                        'type' => 'radio_area',
                        'title' => '封面使用高清圖片',
                        'value' => 'highquality',
                        'tip' => '若無選擇圖片需使用youtube自產高清封面，請啟用',
                        'options' => $article_options['yesno'],
                        'default' => '0'
                    ],
                ],
            ],
        ],
        [
            'title' => '圖片樣式設定',
            'content' => [
                [
                    'type' => 'radio_area',
                    'title' => '圖片是否為輪播',
                    'value' => 'is_swiper',
                    'tip' => '開啟後圖片為輪播方式呈現，需填入圖片輪播相關設定。',
                    'options' => $article_options['isSwiper'],
                    'default' => 0
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '圖片輪播 - 出現圖片數量',
                    'value' => 'swiper_num',
                    'tip' => '選取輪播一次出現圖片數量',
                    'options' => $article_options['isRow4Swiper'],
                ],
                [
                    'type' => 'radio_area',
                    'title' => '圖片輪播 - 是否開啟自動播放',
                    'value' => 'swiper_autoplay',
                    'tip' => '',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                [
                    'type' => 'radio_area',
                    'title' => '圖片輪播 - 是否開啟循環播放',
                    'value' => 'swiper_loop',
                    'tip' => '',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                // [
                //     'type' => 'radio_area',
                //     'title' => '圖片輪播 - 是否啟用左右箭頭按鈕',
                //     'value' => 'swiper_arrow',
                //     'tip' => '',
                //     'options' => $article_options['yesno'],
                //     'default' => 0
                // ],
                [
                    'type' => 'radio_area',
                    'title' => '圖片輪播 - 啟用下方切換選單',
                    'value' => 'swiper_nav',
                    'tip' => '',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                [
                    'type' => 'radio_area',
                    'title' => '是否為拼圖模式',
                    'value' => 'img_merge',
                    'tip' => '使用後會隱藏圖片間距及描述，以拼接方式呈現。',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                [
                    'type' => 'radio_area',
                    'title' => '首圖是否放大',
                    'value' => 'img_firstbig',
                    'tip' => '使用後對首圖強制100%放大。',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '圖片每列數量設定',
                    'value' => 'img_row',
                    'tip' => '圖片每列數量設定，預設為一張圖。',
                    'default' => '',
                    'options' => $article_options['isRow4Img'],
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '圖片比例設定',
                    'value' => 'img_size',
                    'tip' =>
                        '圖片比例設定，預設為依照圖片大小，<br>若設定比例，圖片不足部分將呈現淺灰色底，並將圖片自動置中。',
                    'options' => $article_options['imgSize'],
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '文字與圖片垂直對齊設定',
                    'value' => 'article_flex',
                    'tip' => '內文區塊上下對齊設定。',
                    'options' => $article_options['AlignVertical4TextWithImg'],
                ],
                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '圖片垂直對齊設定',
                    'value' => 'img_flex',
                    'tip' => '',
                    'options' => $article_options['CommonAlignVertical4Img'],
                ],

                [
                    'type' => 'radio_area',
                    'title' => '圖片描述文字顏色',
                    'value' => 'description_color',
                    'tip' => '',
                    'options' => $article_options['textColor'],
                ],

                [
                    'type' => 'radio_area',
                    'empty' => 'yes',
                    'title' => '圖片描述文字對齊',
                    'value' => 'description_align',
                    'tip' => '',
                    'options' => $article_options['CommonAlignHorizontal4ImgText'],
                ],


            ],
        ],
        [
            'title' => '滿版背景 樣式',
            'content' => [
                [
                    'type' => 'radio_area',
                    'title' => '內文寬度設定',
                    'value' => 'full_size',
                    'empty' => 'yes',
                    'tip' => '',
                    'options' => $article_options['fullSize'],
                ],
                [
                    'type' => 'colorPicker',
                    'title' => '段落底色設定',
                    'value' => 'article_color',
                    'default' => 'rgba(255, 255, 255, 0)',
                    'tip' => '',
                ],
                [
                    'type' => 'colorPicker',
                    'title' => '內文底色設定',
                    'value' => 'full_box_color',
                    'default' => '#ffffff',
                    'tip' => '只適用於"滿版背景有色塊"的樣式',
                ],
                [
                    'type' => 'radio_area',
                    'title' => '內文色塊是否對齊邊際',
                    'value' => 'is_slice',
                    'tip' => '只適用於"滿版背景有色塊"的樣式, 對齊方式依照所選的"滿版背景有色塊樣式", ex: 段落置左則色塊貼齊左邊邊際',
                    'options' => $article_options['yesno'],
                    'default' => 0
                ],
                [
                    'type' => 'image_group',
                    'title' => '背景圖片',
                    'tip' => '若沒有選擇圖片則會以段落底色代替，圖片建議尺寸 寬度 970px',
                    'image_array' => [
                        [
                            'title' => '背景圖片-電腦版',
                            'value' => 'full_img',
                            'set_size' => 'no',
                            'width' => '',
                            'height' => '',
                        ],
                        [
                            'title' => '背景圖片-手機版',
                            'value' => 'full_img_rwd',
                            'set_size' => 'no',
                            'width' => '',
                            'height' => '',
                        ],
                    ],
                ],
            ],
        ],
    ],
]) }}
