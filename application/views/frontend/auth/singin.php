<div class="title">Đăng nhập</div>
<div class="clear"></div>
<form action="" method="POST" id="singinForm">
    <div class="clear height10"></div>
    <div class="item form-group">
        <input type="text" name="Login[email]" placeholder="Email">
        <small class="text-red err" id="error1-email"></small>
    </div>
    <div class="item form-group">
        <input type="password" name="Login[password]" placeholder="Mật khẩu">
        <small class="text-red err" id="error1-password"></small>
    </div>
    <div class="item">
        <button type="submit" id="onLogin">Đăng nhập</button>
    </div>
    <div class="alert-custom-login hidden"></div>
    <div class="item">
        <a onclick="openForm();" class="btnForgetPass">Quên mật khẩu?</a>
    </div>
</form>