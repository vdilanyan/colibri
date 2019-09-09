<?php
function share_buttons() {
	$link = get_the_permalink();
	$title = get_the_title();
	$img = get_the_post_thumbnail_url();
	$src = get_bloginfo("url");

	$result = "<li><a class=\"transition facebook\" href=\"https://www.facebook.com/sharer/sharer.php?u=".$link."\" target=\"_blank\" ><i class=\"fa fa-facebook-square\"></i></a></li>".
		"<li><a class=\"transition twitter\" href=\"https://twitter.com/home?status=".$link."\" target=\"_blank\"><i class=\"fa fa-twitter-square\"></i></a></li>".
		"<li><a class=\"transition google\" href=\"https://plus.google.com/share?url=".$link."\" target=\"_blank\"><i class=\"fa fa-google-plus-square\"></i></a></li>".
		"<li><a class=\"transition linkedin\" href=\"https://www.linkedin.com/shareArticle?mini=true&url=".$link."&title=".$title."&summary=&source=".$src."\" target=\"_blank\"><i class=\"fa fa-linkedin-square\"></i></a></li>".
		"<li><a class=\"transition pinterest\" href=\"https://pinterest.com/pin/create/button/?url=".$link."&media=".$img."&description=\" target=\"_blank\"><i class=\"fa fa-pinterest-square\"></i></a></li>";
	return $result;
}
add_shortcode("share", "share_buttons");