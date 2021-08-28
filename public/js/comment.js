function sendCmmt(){
	if(document.getElementById('fullname').value == ''){
		toastr["error"]("Vui lòng nhập họ & tên của bạn");
		document.getElementById('fullname').focus();
		return false;
	}else if(document.getElementById('email').value == ''){
		toastr["error"]("Vui lòng nhập email của bạn");
		document.getElementById('email').focus();
		return false;
	}else if(document.getElementById('phone').value == ''){
		toastr["error"]("Vui lòng nhập số điện thoại của bạn");
		document.getElementById('phone').focus();
		return false;
	}else if(document.getElementById('content').value == ''){
		toastr["error"]("Vui lòng nhập nội dung");
		document.getElementById('content').focus();
		return false;
	}else if(document.getElementById('captcha').value == ''){
		toastr["error"]("Vui lòng nhập mã captcha");
		document.getElementById('captcha').focus();
		return false;
	}else if(document.getElementById('captcha').value != document.getElementById('ReCC').value){
		toastr["error"]("Mã captcha không đúng");
		document.getElementById('captcha').focus();
		return false;
	}else{
		var email = document.getElementById('email').value;
		if (validateEmail(email)) {
			var fullname = document.getElementById('fullname').value;
			var email = document.getElementById('email').value;
			var phone = document.getElementById('phone').value;
			var content = document.getElementById('content').value;
			var typeID = document.getElementById('typeID').value;
			$.ajax
	        ({
	            method: "POST",
	            url: "comment/index",
	            data: { fullname:fullname,email:email,phone:phone,content:content,typeID:typeID},
	            dataType: "json",
	            success: function(data){
	                if(data.rs == 1){
	                    swal("Thành công", "Chúng tôi sẽ kiểm tra và phản hồi bình luận của bạn trong vài giờ tới. Xin cảm ơn!", "success");
	                }else{
	                	swal("Thất bại", "Bình luận thất bại. Vui lòng kiểm tra lại", "success");
	                }
	                document.getElementById("fullname").value = "";
	                document.getElementById("email").value = "";
	                document.getElementById("phone").value = "";
	                document.getElementById("content").value = "";
	                document.getElementById("typeID").value = "";
	                document.getElementById("ReCC").value = "";
	            }
	        });
		}else{
			toastr["error"]("Email không đúng định dạng");
			document.getElementById('email').focus();
			return false;
		}
	}
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}