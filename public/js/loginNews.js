$('#btnRegister').on('click', function () {
	var $btn = $(this).button('loading');
	$('.err').html('');
	$('.alert-custom-signup').addClass('hidden');
	$('.alert-custom-signup').removeClass('success-signup');
})
$( document ).ready(function() {
	// Đăng ký
	$("#registerForm").submit(function(event) {
		data = $("#registerForm").serialize();
		jQuery.ajax({
			url: 'auth/signUp',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(data) {
				$('.err').html('');
				if (data.success == 1) {
					$("#registerForm :input").val("");
					$('.alert-custom-signup').removeClass('hidden');
					$('.alert-custom-signup').addClass('success-signup');
                    $('.alert-custom-signup').text(data.message);
                    $("#btnRegister").prop('disabled', false);
                    $('#btnRegister').text('Đăng ký');
				} else if(data.success == 3) {
					$('.alert-custom-signup').removeClass('hidden');
                    $('.alert-custom-signup').text(data.message);
					$("#btnRegister").prop('disabled', false);
                    $('#btnRegister').text('Đăng ký');
				} else if(data.success == 4) {
					$('.alert-custom-signup').removeClass('hidden');
                    $('.alert-custom-signup').text(data.message);
					$("#btnRegister").prop('disabled', false);
                    $('#btnRegister').text('Đăng ký');
				} else {
					if (data.errors) {
						for (field in data.errors) {
							$("#error-"+field).html(data.errors[field]);
						}
						$("#btnRegister").prop('disabled', false);
						$('#btnRegister').text('Đăng ký');
					}
				}
			},
		});
		return false;
	});
	/////Đăng nhap
	// click hidden
    $('#onLogin').click(function(event) {
        $('.alert-custom-login').addClass('hidden');
    });
    /////submit
    $("#singinForm").submit(function(event) {
        data = $("#singinForm").serialize();
        jQuery.ajax({
            url: 'auth/signin',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                $('.err').html('');
                if (data.success == 1) {
                    $("#registerForm :input").val("");
                    toastr.success(data.message);
                    window.location.href = 'tai-khoan.html';
                } else if(data.success == 2) {
                    $('.alert-custom-login').removeClass('hidden');
                    $('.alert-custom-login').text(data.message);
                } else if(data.success == 3) {
                    $('.alert-custom-login').removeClass('hidden');
                    $('.alert-custom-login').text(data.message);
                }else if(data.success == 5) {
                    toastr.error(data.message);
                }else {
                    if (data.errors) {
                        for (field in data.errors) {
                            $("#error1-"+field).html(data.errors[field]);
                        }
                    }
                }
            },
        });
        return false;
    });
    //////Forgetpasss
    $('#btnForget').on('click', function () {
		var $btn = $(this).button('loading');
		$('.err').html('');
		$('.alert-custom-forget').addClass('hidden');
	})
	////////
	$("#forgetPassForm").submit(function(event) {
		data = $("#forgetPassForm").serialize();
		jQuery.ajax({
			url: 'auth/forgetpass',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(data) {
				$('.err').html('');
				if (data.success == 1) {
					$("#forgetPassForm :input").val("");
					$('.alert-custom-forget').removeClass('hidden');
					$('.alert-custom-forget').addClass('success-forget');
                    $('.alert-custom-forget').text(data.message);
                    $("#btnForget").prop('disabled', false);
                    $('#btnForget').text('Lấy lại mật khẩu');
				}else if(data.success == 2) {
					$('.alert-custom-forget').removeClass('hidden');
                    $('.alert-custom-forget').text(data.message);
                    $("#btnForget").prop('disabled', false);
                    $('#btnForget').text('Lấy lại mật khẩu');
				}else if(data.success == 4) {
					toastr.error(data.message);
					$("#btnForget").prop('disabled', false);
					$('#btnForget').text('Lấy lại mật khẩu');
				}else {
					if (data.errors) {
						for (field in data.errors) {
							$("#error2-"+field).html(data.errors[field]);
						}
						$("#btnForget").prop('disabled', false);
						$('#btnForget').text('Lấy lại mật khẩu');
					}
				}
			},
		});
		return false;
	});
});