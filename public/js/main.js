// window.onscroll = function() {menuFix()};
// var menu = document.getElementById("menuMain");banner
// var titleCate = document.getElementById("titleCate");
// var sticky = menu.offsetTop;
// function menuFix() {
// 	console.log(window.pageYOffset);
//     if (window.pageYOffset > sticky) {
//         menu.classList.add("sticky");
//     } else {
//         menu.classList.remove("sticky");
//     }
//     if (window.pageYOffset > 70) {
//         titleCate.classList.add("loadCate");
//     } else {
//         titleCate.classList.remove("loadCate");
//     }
// }
$(document).ready(function(){
	$('.lazy').lazy({
		effect: "fadeIn",
        effectTime: 2000,
        threshold: 0
	});
	$('.slider-partner').slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoPlay:true,
		speed:1000,
		dots:false,
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        slidesToShow: 5
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        slidesToShow: 2
		      }
		    }
	  	]
	});
	$('#btnSearch').click(function(){
		if($('.itemSearch').hasClass('visibility')){
			$('.itemSearch').removeClass('visibility');
		}else{
			$('.itemSearch').addClass('visibility');
		} 
	});
	// $('.slideIdea').slick({
	// 	infinite: true,
	// 	slidesToShow: 3,
	// 	slidesToScroll: 1,
	// 	autoPlay:true,
	// 	speed:1000,
	// 	dots:false,
	// 	nextArrow: '<div class="btn-next"><i class="fa fa-angle-right"></i></div>',
	// 	prevArrow: '<div class="btn-prev"><i class="fa fa-angle-left"></i></div>',
	// 	responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	        arrows: false,
	// 	        slidesToShow: 2
	// 	      }
	// 	    },
	// 	    {
	// 	      breakpoint: 480,
	// 	      settings: {
	// 	        arrows: false,
	// 	        slidesToShow: 1
	// 	      }
	// 	    }
	//   	]
	// });
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slideIdea'
	});
	$('.slideIdea').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		centerMode: true,
		focusOnSelect: true,
		centerPadding: '0px',
		// nextArrow: '<div class="btn-next"><i class="fa fa-angle-right"></i></div>',
		// prevArrow: '<div class="btn-prev"><i class="fa fa-angle-left"></i></div>',
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        slidesToShow: 1
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
	$('.sliderProductDetail').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoPlay:true,
		speed:1000,
		dots:false,
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        slidesToShow: 4
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        slidesToShow: 2
		      }
		    }
	  	]
	});
	$('.btn-menu-mobi').click(function(){
	    if($('.ul-menu-mobi').hasClass('move_mobi_fix')){
			$('.ul-menu-mobi').removeClass('move_mobi_fix');
			$('#bg-fix').css('display','none');
		}else{
			$('.ul-menu-mobi').addClass('move_mobi_fix');
			$('#bg-fix').css('display','block');
		} 
	});
	$('#bg-fix').click(function(){
		$('#bg-fix').css('display','none');
		$('.ul-menu-mobi').removeClass('move_mobi_fix');
	});
	$("#slider").nivoSlider({
 		 animSpeed    : 500,
 		 controlNav   : false,
 		 directionNav: false,
 		 beforeChange : function(){
	 		$('.nivo-caption p').removeClass('animated slideInLeft').hide();
	 		$('.nivo-caption h2').removeClass('animated slideInRight').hide();
	 		$('.nivo-caption a').removeClass('animated fadeInUp').hide();
 		 },
 		 afterChange : function(){

	 		$('.nivo-caption p').addClass('animated slideInLeft').show();
	 		$('.nivo-caption h2').addClass('animated slideInRight').show();
	 		$('.nivo-caption a').addClass('animated fadeInUp').show();
 		 }
 	});
    //Back to Top
    if ($('#back-to-top').length) {
	    var scrollTrigger = 100, // px
	        backToTop = function () {
	            var scrollTop = $(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                $('#back-to-top').addClass('show');
	            } else {
	                $('#back-to-top').removeClass('show');
	            }
	        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}
});
