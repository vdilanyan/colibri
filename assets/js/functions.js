var $ = jQuery;
var whyEcopodsBtn = $('.why-ecopods');

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

	$('.nav-main a[href="#"]').click(function(e) {
		e.preventDefault();
	});
});

$(window).load(function() {

});

if (whyEcopodsBtn.length) {
	var btn = whyEcopodsBtn.find('a');
	var btnHeight = btn.outerHeight();
	var btnOffsetTop = btn.offset().top - 32;

	$(window).scroll(function() {
		var windowScrollTop = $(this).scrollTop();
		console.log(btnHeight);
		if (windowScrollTop > btnOffsetTop) {
			whyEcopodsBtn.height(btnHeight);
			btn.addClass('fixed');
		} else {
			btn.removeClass('fixed');
			whyEcopodsBtn.removeAttr('style');
		}
	});
}