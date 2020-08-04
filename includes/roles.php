<?php
/* ---------------------
/* The WP Guru 2013
/* Roles and Capabilities
/* ---------------------*/

// add file uploads to Contributor role
// @since 1.4

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

// define Supporter Role for ad-free browsing
// same capabilities as Subscriber
// @since 1.7

function guru_define_supporter_role () {
    add_role (
        'supporter',
        'Supporter', [
            'read' => true,
        ]
        );
}
add_action ('init', 'guru_define_supporter_role');