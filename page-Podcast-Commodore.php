<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 
  Template Name: Podcast Feed - Commodore
 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
                        
<?php 
//
// show a list of articles by category
// https://codex.wordpress.org/Class_Reference/WP_Query

// count all articles in this category
$query = new WP_Query( array( 'category_name' => 'commodore-podcast', 'nopaging' => true ) );
$results = $query->found_posts;
echo "<p>There are currently <strong>$results episodes</strong> to listen to in my Commodore Podcast Feed.<br>Here's a list of every single one:</p>";

// list all articles in this category
// echo "<h3>Commodore Articles</h3>";
$query = new WP_Query( array( 'category_name' => 'commodore-podcast', 'nopaging' => true ) );
$results = $query->found_posts;
if ($query->have_posts() ) {
	echo "";
	while ($query->have_posts() ) {
		$query->the_post();
		echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	}
	echo "";
} // end of category articles list

// insert Apple Badge here
$badge = get_stylesheet_directory_uri() . "/images/Apple-Podcasts-Badge.png";
$text = "<br><h3>Subscribe on iTunes for all current and future epidoes:</h3><a href='https://itunes.apple.com/us/podcast/jays-commodore-podcast/id1433277622' target='_blank'><img id='apple-badge' src='".$badge . "'></a>";
echo $text;
// end of Apple Badge

?>
                        
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php // comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>