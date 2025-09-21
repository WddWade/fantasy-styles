<div class="change_pwd_modal wddChangePWDMain">
    <div class="changePwd_sec">
        <section class="title">
            <div>Change Password</div>
            <span>修改您的登入密碼</span>
        </section>
        <section id="accountForm">
            <div class="frame">
                <div class="input_box">
                    <input type="password" placeholder="請輸入新密碼" class="changePWDInput" name="password">
                </div>
                <div class="input_box">
                    <input type="password" placeholder="驗證新密碼" class="changePWDInput2" name="password2">
                </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </section>
        <section class="controllers">
            <button class="changePWd_btn changePWDBtn" type="submit">SAVE</button>
            <div class="changePWDErrorMsg" style="display:none">驗證新密碼錯誤，請確認新密碼是否輸入相同</div>
        </section>
        {{-- <div class="forwho">{{config('cms.ProjectName')}}</br>All Rights Reserved.<span>Fantasy By WDD</span></div> --}}
    </article>
</div>
