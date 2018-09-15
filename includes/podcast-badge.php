<?php
// The WP Guru 2013
// Apple Podcast Badge functions
// since @1.1

function versluis2013_add_badge ($content){
	
	$appleBadge = get_stylesheet_directory_uri() . "/images/Apple-Podcasts-Badge.png";
	$stitcherBadge = get_stylesheet_directory_uri() . "/images/Stitcher-Badge.png";
	
	if (in_category ('Podcast')) {
		
		// WP Guru Podcast
		$apple = "Catch this episode on my WP Guru Podcast:<br><a href='https://itunes.apple.com/us/podcast/screencast-the-wp-guru/id604088441' target='_blank'><img id='apple-badge' src='".$appleBadge . "'></a>";
		
		$stitcher = "<br><a href='https://www.stitcher.com/s?fid=228529&refid=stpr' target='_blank'><img id='stitcher-badge' src='".$stitcherBadge . "'></a>";
		
		$after = $apple . $stitcher;
	
	} else if (in_category ('Commodore Podcast')) {
	
		// Commodore Podcast
		$apple = "Catch this episode on my Commodore Podcast:<br><a href='https://itunes.apple.com/us/podcast/jays-commodore-podcast/id1433277622' target='_blank'><img id='apple-badge' src='".$appleBadge . "'></a>";
		
		$stitcher = "<br><a href='https://www.stitcher.com/s?fid=228528&refid=stpr' target='_blank'><img id='stitcher-badge' src='".$stitcherBadge . "'></a>";
		
		$after = $apple . $stitcher;
		
	} else if (in_category ('WordPress Podcast')) {
		
		// WordPress Podcast
		$apple = "Catch this episode on my WordPress Podcast:<br><a href='https://itunes.apple.com/us/podcast/jays-wordpress-podcast/id1436327933' target='_blank'><img id='apple-badge' src='".$appleBadge . "'></a>";
		
		$stitcher = "<br><a href='https://www.stitcher.com/s?fid=234013&refid=stpr' target='_blank'><img id='stitcher-badge' src='".$stitcherBadge . "'></a>";
		
		$after = $apple . $stitcher;
		
	} else {
		
		// it's not a Podcast
		$after = '';	
	}

	$content = $content . $after;
	return $content;
}
add_filter ('the_content', 'versluis2013_add_badge');

?>