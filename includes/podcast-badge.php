<?php
// The WP Guru 2013
// Apple Podcast Badge functions
// since @1.1

function versluis2013_add_badge ($content){
	
	$badge = get_stylesheet_directory_uri() . "/images/Apple-Podcasts-Badge.png";
	
	if (in_category ('Podcast')) {
		
		// WP Guru Podcast
		$after = "Catch this episode on my WP Guru Podcast:<br><a href='https://itunes.apple.com/us/podcast/screencast-the-wp-guru/id604088441' target='_blank'><img id='apple-badge' src='".$badge . "'></a>";
	
	} else if (in_category ('Commodore Podcast')) {
		
		// Storyist Podcast
		$after = "Catch this episode on my Commodore Podcast:<br><a href='https://itunes.apple.com/us/podcast/jays-commodore-podcast/id1433277622' target='_blank'><img id='apple-badge' src='".$badge . "'></a>";
		
	} else if (in_category ('WordPress Podcast')) {
		
		// WordPress Podcast
		$after = "Catch this episode on my WordPress Podcast:<br><a href='https://itunes.apple.com/us/podcast/jays-commodore-podcast/id1433277622' target='_blank'><img id='apple-badge' src='".$badge . "'></a>";
		
	} else {
		
		// it's not a Podcast
		$after = '';	
	}

	$content = $content . $after;
	return $content;
}
add_filter ('the_content', 'versluis2013_add_badge');

?>