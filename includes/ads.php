<?php
/* ---------------------
/* The WP Guru 2013
/* Ad Functions
/* ---------------------*/

// add Divi Banner at the top of the page
// @since 1.5

function showDiviBanner () {
	// build the banner
	$divi = '<a href="https://www.elegantthemes.com/affiliates/idevaffiliate.php?id=6674_5_1_20" target="_blank" rel="nofollow"><img style="border:0px" src="https://www.elegantthemes.com/affiliates/media/banners/divi_728x90.jpg" width="728" height="90" alt="Divi WordPress Theme"></a>';
	$banner = '<div align="center">' . $divi . '</div>';
	
	global $post;

    // if we're logged in, or if this is the donations /hire me page, 
	// or if this is the home page, or if we're mobile,
	// do not show the banner
	if (is_user_logged_in()) return;
	if ($post->post_name == 'support') return;
	if ($post->post_name == 'hire-me') return;
	if (is_home()) return;
	if (wp_is_mobile()) return;
	
	// print the banner
	echo $banner;
}
add_action ('get_header', 'showDiviBanner');

// add Amazon oneLink shenanigans
function guru_amazonOneLink() {
	$oneLink = '<div id="amzn-assoc-ad-5e4fb363-4081-411a-8049-667d48d2b006"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=5e4fb363-4081-411a-8049-667d48d2b006"></script>';
	echo $oneLink;
}
add_action ('wp_footer', 'guru_amazonOneLink');