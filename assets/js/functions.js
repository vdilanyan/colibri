var $ = jQuery;
var whyEcopodsBtn = $('.why-ecopods');
var productGallery = $('.product-gallery-small .img-container');
var productGalleryThumb = $('.product-gallery .product-thumb');

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

	$('.accordion-heading a').click(function() {
		$('.accordion-element').removeClass('active');
		if(!$(this).closest('.panel').find('.panel-collapse').hasClass('in')) {
			$(this).parents('.accordion-element').addClass('active');
		}
	});

	if (productGallery.length) {
		productGallery.click(function() {
			productGallery.removeClass('active');
			$(this).addClass('active');
			productGalleryThumb.attr('src', $(this).data('url'));
		});
	}
});

$(window).load(function() {

});

if (whyEcopodsBtn.length) {
	var btn = whyEcopodsBtn.find('a');
	var btnHeight = btn.outerHeight();
	var btnOffsetBottom = btn.offset().top + btnHeight;

	$(window).scroll(function() {
		var windowScrollTop = $(this).scrollTop() + $(this).outerHeight() - 40;

		if (windowScrollTop >= btnOffsetBottom) {
			whyEcopodsBtn.height(btnHeight);
			btn.addClass('fixed');
		} else {
			btn.removeClass('fixed');
			whyEcopodsBtn.removeAttr('style');
		}
	});
}