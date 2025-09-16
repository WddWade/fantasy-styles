<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Fantasy Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link href="{{ asset('pages/ico/60.png') }}" rel="apple-touch-icon" />
    <link href="{{ asset('pages/ico/76.png') }}" rel="apple-touch-icon" sizes="76x76" />
    <link href="{{ asset('pages/ico/120.png') }}" rel="apple-touch-icon" sizes="120x120" />
    <link href="{{ asset('pages/ico/152.png') }}" rel="apple-touch-icon" sizes="152x152" />
    <link type="image/x-icon" href="{{ asset('/vender/assets/img/Fantasy-icon.svg') }}" rel="icon" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!---->
    <link type="text/css" href="{{ asset('/vender/assets/plugins/font-awesome/css/font-awesome.css') }}"
        rel="stylesheet" />
    <link type="text/css" href="{{ asset('/vender/pages/css/pages-icons.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('/vender/assets/css/FantasyAllcss.css?181001') }}" rel="stylesheet" />
</head>

<body class="dashboard">
    {{-- @dump(Hash::make('wddasdzxc')) --}}
    <main class="wddLoginMain">
        <article class="login_sec">
            <div class="title">
                <div class="fantasylogo">
                    FANTASY<span class="fantasyver">v2.1.8</span>
                </div>
            </div>
            <h2>Sign Into Your FANTASY Account</h2>
            <form id="accountForm">
                <div class="frame">
                    <div class="input_box">
                        <input class="accountInput" name="account" type="text" placeholder="Account" autocomplete="off">
                    </div>
                    @if(!config('cms.fantasy_double_verify'))
                    <div class="input_box">
                        <input class="passwordInput" name="password" type="password" placeholder="Password" autocomplete="off">
                    </div>
                    @endif
                    @if(config('cms.fantasy_verify'))
                    <div class="input_box">
                        <input type="text" placeholder="VerifyCode" class="verifyCode" name="verifyCode" autocomplete="off">
                    </div>
                    @endif
                </div>
                @if(config('cms.fantasy_verify'))
                <div style="width: 120px;margin: 0 auto;">
                    <a class="refresh-btn" href="javascript:;">{!!$Captcha!!}<i class="icon-refresh"></i></a>
                </div>
                @endif
                <input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
            </form>
            <button class="login_btn loginBtn" type="submit">Sign in</button>
            <div class="forwho">{{ config('cms.ProjectName') }}<br>All Rights Reserved.<span>Fantasy By WDD</span>
            </div>
        </article>
    </main>
    {{-- <!--阻擋視窗 想要阻擋視窗出現 就在 block_out 後面再加ㄧ個 show--> --}}
    <div class="block_out show" style="display: none">
        <div class="box">
            <div class="pace-activity"></div>
        </div>
    </div>
</body>

</html>
<script src="/vender/assets/plugins/jquery/jquery-3.4.1.js" type="text/javascript"></script>
<script src="/vender/backend/js/jsencrypt.min.js"></script>
<script type="text/javascript">
    $(function() {
        /** 若有輸入帳號，按Enter跳到密碼 */
        $(".accountInput").keydown(function(e) {
            if (e.key == "Enter") {
                if ($(this).val() != "") $(".passwordInput").focus();
                if ($(this).val() != "" && $(".passwordInput").val() != "") $(".verifyCode").focus();
                if ($(this).val() != "" && $(".passwordInput").val() != "" && $(".verifyCode").val() != "") $('.loginBtn').click();
            }
        });
        /** 若有輸入密碼，按Enter跳到驗證碼 */
        $(".passwordInput").keydown(function(e) {
            if (e.key == "Enter") {
                if ($(this).val() != "") $(".verifyCode").focus();
                if ($(this).val() != "" && $(".verifyCode").val() != "") $('.loginBtn').click();
            }
        });
        /** 若有輸入驗證碼，按Enter登入 */
        $(".verifyCode").keydown(function(e) {
            if (e.key == "Enter" && $(this).val() != "") $('.loginBtn').click();
        });
        function verifyCodeReload(){
            var d = new Date();
            var src = $('.refresh-btn').children('img').prop('src').split('?')[0] + '?t=' + d.getMilliseconds();
            $('.refresh-btn').children('img').prop('src', src);
            $('[name="verifyCode"]').val('');
        }
        $(".refresh-btn").on('click', function () {
            verifyCodeReload();
        });

        /** 登入 */
        $('.loginBtn').click(function() {
            if ($('.accountInput').val() == '') {
                alert('請輸入帳號');
                $('.accountInput').focus();
                return false;
            }
            if($('.passwordInput').length > 0){
                if ($('.passwordInput').val() == '') {
                    alert('請輸入密碼');
                    $('.passwordInput').focus();
                    return false;
                }
            }
            if($('[name*="otpcode"]').length > 0){
                if ($('[name*="otpcode"]').val() == '') {
                    alert('請輸入驗證碼');
                    return false;
                }
            }
            if($('.verifyCode').length > 0){
                if ($('.verifyCode').val() == '') {
                    alert('請輸入驗證碼');
                    return false;
                }
            }

            $('.block_out.show').show();
            var formInput = $('#accountForm').serialize();

            // 公鑰xx
            publicKey = `{{ config('rsa.publickey') }}`;
            let crypt = new JSEncrypt();
            crypt.setPublicKey(publicKey)
            const account = formInput.match(/account=([^&]*)/)[1];
            const password = ($('.passwordInput').length > 0) ? formInput.match(/password=([^&]*)/)[1] : '';
            const verifyCode = ($('.verifyCode').length > 0) ? formInput.match(/verifyCode=([^&]*)/)[1] : '';
            var userData = {
                account:account,
                password:password,
                verifyCode:verifyCode
            };
            if($('[name*="otpcode"]').length > 0){
                let tempOtpName = $('[name*="otpcode"]').first().attr('name');
                userData[tempOtpName] = formInput.match(new RegExp(`${tempOtpName}=([^&]*)`))[1];
            }
            userData = crypt.encrypt(JSON.stringify(userData));
            const _token = formInput.match(/_token=([^&]*)/)[1];
            const sendData = {
                userData: userData,
                _token:_token,
            };

            $.ajax({
                    type: "POST",
                    url: "{{ url('/auth/login') }}",
                    // data: $('#accountForm').serialize(),
                    data: sendData,
                })
                .done(function(response) {
                    if (response.an == true) {
                        if(response.double_verify == true){
                            $("#accountForm").find('.input_box').first().after(response.code);
                            $('.block_out.show').hide();
                            if($('.verifyCode').length > 0){
                                verifyCodeReload();
                            }
                        }else{
                            location.replace("{{ url('/Fantasy/Cms') }}");
                        }
                    } else {
                        alert(response.message);
                        $('.block_out.show').hide();
                        if($('.verifyCode').length > 0){
                            verifyCodeReload();
                        }
                    }
                })
                .fail(function() {
                    alert('目前系統異常或斷線,請重新嘗試,若持續錯誤,請通知相關人員');
                    $('.block_out.show').hide();
                    if($('.verifyCode').length > 0){
                        verifyCodeReload();
                    }
                });

        });
        // 進入頁面直接focus在帳號欄
        $('.accountInput').focus();
    });
</script>
<style type="text/css">
    /* .block_out.show .box{
  background: url(https://scontent.frmq2-2.fna.fbcdn.net/v/t1.0-9/58805523_2432274390125130_6125968010982195200_o.jpg?_nc_cat=100&_nc_oc=AQmWbxTlp5gzR1reWbaOF1VHH-lNt5Fc8O71iIxUDfCDD5tSKF-c7Dq-txLkGW33Elr-vd6BoM3dhRQwatRONo1k&_nc_ht=scontent.frmq2-2.fna&oh=c1cea8f995b1dcf79625594b4825b1a7&oe=5E050694)no-repeat top left;
  background-size: 100%;
} */
    .progress-circle-indeterminate {
        background: url("/vender/pages/img/progress/progress-circle-master.svg") no-repeat top left;
        width: 50px;
        height: 50px;
        background-size: 100% auto;
        margin: 0 auto;
    }

    .progress-circle-indeterminate.progress-circle-warning {
        background-image: url("/vender/pages/img/progress/progress-circle-warning.svg");
    }

    .progress-circle-indeterminate.progress-circle-danger {
        background-image: url("/vender/pages/img/progress/progress-circle-danger.svg");
    }

    .progress-circle-indeterminate.progress-circle-info {
        background-image: url("/vender/pages/img/progress/progress-circle-info.svg");
    }

    .progress-circle-indeterminate.progress-circle-primary {
        background-image: url("/vender/pages/img/progress/progress-circle-primary.svg");
    }

    .progress-circle-indeterminate.progress-circle-success {
        background-image: url("/vender/pages/img/progress/progress-circle-success.svg");
    }

    .progress-circle-indeterminate.progress-circle-complete {
        background-image: url("/vender/pages/img/progress/progress-circle-complete.svg");
    }
</style>
