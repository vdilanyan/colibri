var $ = jQuery;
var whyEcopodsBtn = $('.why-ecopods');
var productGallery = $('.product-gallery-small .img-container');
var productGalleryThumb = $('.product-gallery .product-thumb');
var whyEcopodsBanner = $('.page-template-why-ecopods .top-banner');
var termButton = $('.blog-terms a');
var parentCnt = $('.blog-posts');
var laodMore = $('.load-more a');

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
		if (!$(this).closest('.panel').find('.panel-collapse').hasClass('in')) {
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

	termButton.click(function(e) {
		e.preventDefault();
		var catSlug = $(this).attr('data-term-slug');
		var offset = parentCnt.find('.blog-post').length;
		var perPage = $(this).attr('data-per-page');
		$(this).parents('ul').find('li').removeClass('active');
		$(this).parent().addClass('active');
		laodMore.attr('data-term-slug', catSlug);
		loadCategory(catSlug, parentCnt, perPage, $(this));
	});

	laodMore.click(function(e) {
		e.preventDefault();
		var catSlug = $(this).attr('data-term-slug');
		var offset = parentCnt.find('.blog-post').length;
		var perPage = $(this).attr('data-per-page');
		loadMorePosts(catSlug, offset, parentCnt, perPage, $(this));
	});
});

$(window).load(function() {

});

$(window).scroll(function() {
	if (whyEcopodsBtn.length) {
		var btn = whyEcopodsBtn.find('a');
		var btnHeight = btn.outerHeight();
		var btnOffsetBottom = btn.offset().top + btnHeight;
		var windowScrollTop = $(this).scrollTop() + $(this).outerHeight() - 40;

		if (windowScrollTop >= btnOffsetBottom) {
			whyEcopodsBtn.height(btnHeight);
			btn.addClass('fixed');
		} else {
			btn.removeClass('fixed');
			whyEcopodsBtn.removeAttr('style');
		}
	}

	if (whyEcopodsBanner.length) {
		var windowScrollTop = $(this).scrollTop() - whyEcopodsBanner.outerHeight() / 3;
		whyEcopodsBanner.find('.parallax-img').each(function() {
			$(this).css({
				'transform': 'translateY(' + windowScrollTop + '%)',
				'opacity': windowScrollTop,
			});
		})
	}
});

function loadCategory(catSlug, parentCnt, perPage, button) {
	var nonce = button.attr('data-nonce');
	var loadData = {
		action: 'load_category',
		cat_slug: catSlug,
		posts_per_page: perPage,
		wp_nonce: nonce,
	};

	$.ajax({
		url: wp_var.ajax_url,
		type: 'GET',
		dataType: 'json',
		data: loadData,

		beforeSend: function () {
			parentCnt.addClass('loading');
		},

		success: function (response) {
			if (response.have_posts === true) {
				var foundPosts = response.found_posts;
				var content = $(response.html.replace(/(\r\n|\n|\r)/gm, ''));
				parentCnt.html(content).removeClass('loading');

				if (perPage >= foundPosts) {
					laodMore.parent().addClass('no-posts-to-load');
				} else {
					laodMore.parent().removeClass('no-posts-to-load');
				}
			}
		},
	});
}

function loadMorePosts(catSlug, offset, parentCnt, perPage, button) {
	var nonce = button.attr('data-nonce');
	var loadData = {
		action: 'load_more',
		cat_slug: catSlug,
		posts_per_page: perPage,
		offset: offset,
		wp_nonce: nonce,
	};

	$.ajax({
		url: wp_var.ajax_url,
		type: 'GET',
		dataType: 'json',
		data: loadData,

		beforeSend: function () {
			parentCnt.addClass('loading');
		},

		success: function (response) {
			if (response.have_posts === true) {
				var foundPosts = response.found_posts;
				var content = $(response.html.replace(/(\r\n|\n|\r)/gm, ''));
				parentCnt.append(content).removeClass('loading');

				if (offset + perPage >= foundPosts) {
					button.parent().addClass('no-posts-to-load');
				}
			}
		},
	});
}
