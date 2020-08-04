<?php /*

  This file is part of a child theme called The WP Guru 2013.
  Functions in this file will be loaded before the parent theme's functions.
  For more information, please read https://codex.wordpress.org/Child_Themes.

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/*  Add your own functions below this line.
    ======================================== */ 

// includes
include plugin_dir_path (__FILE__) . 'includes/podcast-badge.php';
include plugin_dir_path (__FILE__) . 'includes/wordcount.php';
include plugin_dir_path (__FILE__) . 'includes/roles.php';

/* remove JetPack upsell messages */
/* https://mattreport.com/disable-jetpack-upsell-ads/ */
add_filter( 'jetpack_just_in_time_msgs', '_return_false' );


//
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
