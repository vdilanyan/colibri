var $ = jQuery;

$(document).ready(function() {
	$('.our-customers-carousel').slick({
		slidesToShow: 2,
		slidesToScroll: 2,
		infinite: true,
		dots: true,
		arrows: true,
		prevArrow: '<button class="slick-prev slick-arrow"><img src="' + wp_var.template_dir + '/assets/img/arrow-right.png"></button>',
		nextArrow: '<button class="slick-next slick-arrow"><img src="' + wp_var.template_dir + '/assets/img/arrow-left.png"></button>',
		adaptiveHeight: true,
	});
});

$(window).load(function() {

});
