$(document).ready(function(){
	$('.slideSlick').slick({
	  	autoplay: true,
	  	speed: 800,
	  	arrows: false,
	  	dots: true,
	})

	$('.lazy').lazy({
		effect: "fadeIn",
        effectTime: 2000,
        threshold: 0
	});
	$('.bdsVipSlick').slick({
	    infinite: true,
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
	  	autoplay: true,
  		autoplaySpeed: 2000,
	  	nextArrow: '<div class="btn-next"></div>',
		prevArrow: '<div class="btn-prev"></div>',
		responsive: [
		    {
		      breakpoint: 800,
		      settings: {
		        arrows: false,
		        slidesToShow: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        slidesToShow: 1
		      }
		    }
	  	]
	});
	$('.photoOneSlick').slick({
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	arrows: false,
	  	fade: true,
	  	asNavFor: '.photoSlick'
	});
	$('.photoSlick').slick({
	  	slidesToShow: 9,
	  	slidesToScroll: 1,
	  	asNavFor: '.photoOneSlick',
	  	dots: false,
	  	focusOnSelect: true
	});
	$('.boxForgetPass').hide();
    // Show tỉnh thành trong trang showroom
    $('.change_addr').change(function(){
        $('.showroom_addr_dteail').hide();
        $('.' + $(this).val()).show();
    });
});
function showSearch(){
	if($('.boxForm').hasClass('show')){
		$('.boxForm').removeClass('show');
	}else{
		$('.boxForm').addClass('show');
	}
}
function chooseTypeBDS(type){
	$('.chooseType').removeClass('active');
	$('.chooseType' + type).addClass('active');
	$('#type').val(type);
}
function openForm(){
	$('.boxForgetPass').slideToggle();
}
function FormatNumber(num)
{
    var pattern = "0123456789.";
    var len = num.value.length;
    if (len != 0)
    {
        var index = 0;

        while ((index < len) && (len != 0))
            if (pattern.indexOf(num.value.charAt(index)) == -1)
            {
                if (index == len-1)
                    num.value = num.value.substring(0, len-1);
                else if (index == 0)
                        num.value = num.value.substring(1, len);
                     else num.value = num.value.substring(0, index)+num.value.substring(index+1, len);
                index = 0;
                len = num.value.length;
            }
            else index++;
    }
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}
function del(id) {
    swal({title: "Bạn có chắc?",showCancelButton: true, }
    , function(isConfirm){
        if (isConfirm) {
            $('.delete'+id).parent().parent().fadeOut();
            var control = $('.delete'+id).attr('data-control');
            if(id != '')
            {
                $.ajax
                ({
                    method: "POST",
                    url: control+"/delete",
                    data: { id:id},
                });
            }
        }else{
            swal("Dữ liệu của bạn đã không bị xóa!");
        }
    });
}
