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

include 'includes/podcast-badge.php';

/* remove JetPack upsell messages */
/* https://mattreport.com/disable-jetpack-upsell-ads/ */
add_filter( 'jetpack_just_in_time_msgs', '_return_false' );

/* ---------------------
/* Word Count functions 
/* ---------------------*/
function guru_getWordCountFromPosts () {
	
	$count = 0;
	$posts = get_posts( array(
			'numberposts' => -1,
			'post_type' => 'any'
	));
	
	foreach( $posts as $post ) {
		$count += str_word_count( strip_tags( get_post_field( 'post_content', $post->ID )));
	}
	$num =  number_format_i18n( $count );
	
	return $count;
}

function guru_getWordCountCommentsCurrentUser() {
	
	$count = 0;
	$user_id = get_current_user_id();
	$comments = get_comments( array(
			'user_id' => $user_id
	));
	foreach( $comments as $comment ) {
		$count += str_word_count( $comment->comment_content );
	}
	return $count;
}

function clickable_content ($content){
	
	$content = make_clickable($content);
	return $content;
}
add_filter ('the_content', 'clickable_content');

//
// add file uploads to Contributor role
// @since 1.4
// 
function guru_add_uploads_to_contribs () {
	global $pagenow;
	
	// grab contribtor role
	$role = get_role ('contributor');
	
	// if this theme is activated, add the upload capability
	if ('themes.php' == $pagenow && isset ($_GET['activated'])) {
		$role -> add_cap ('upload_files');
	} else {
		// remove when deactivated
		$role -> remove_cap ('upload_files');
	}
}
add_action ('load-themes.php', 'guru_add_uploads_to_contribs');


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
