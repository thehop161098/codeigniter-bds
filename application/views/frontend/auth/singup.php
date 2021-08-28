<div class="login">
	<div class="title">Đăng ký</div>
	<div class="clear"></div>
	<form method="POST" id="registerForm">
		<div class="clear height10"></div>
		<div class="item form-group">
			<input type="text" name="Register[fullname]" placeholder="Họ tên">
			<small class="text-red err" id="error-fullname"></small>
		</div>
		<div class="item form-group">
			<input type="text" name="Register[email]" placeholder="Email">
			<small class="text-red err" id="error-email"></small>
		</div>
		<div class="item form-group">
			<input type="text" name="Register[phone]" placeholder="Số điện thoại">
			<small class="text-red err" id="error-phone"></small>
		</div>
		<div class="item form-group">
			<input type="password" name="Register[password]" placeholder="Mật khẩu">
			<small class="text-red err" id="error-password"></small>
		</div>
		<div class="item form-group">
			<input type="password" name="Register[re-password]" placeholder="Nhập lại mật khẩu">
			<small class="text-red err" id="error-re-password"></small>
		</div>
		<div class="alert-custom-signup hidden"></div>
		<div class="item">
			<button type="submit" id="btnRegister" data-loading-text="Đang gửi...">Đăng ký</button>
		</div>
	</form>
</div>
