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
include plugin_dir_path (__FILE__) . 'includes/ads.php';

/* remove JetPack upsell messages */
/* https://mattreport.com/disable-jetpack-upsell-ads/ */
add_filter( 'jetpack_just_in_time_msgs', '_return_false' );

?>