<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<main>

<div id="blog-single">
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<article>
	
		<h1><?php the_title(); ?></h1>
		<p class="blog-post-meta">
			Published on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date('F jS, Y'); ?></time><br />
			Written by <?php print_custom_field('post_author_custom'); ?><br />
			<?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
		</p>
		
		<div id="blog-content"><?php the_content(); ?></div>
		
		<div id="blog-authorbio">
			<div id="blog-authorbio-image" style="background-image: url(<?php print_custom_field('blog_authorimage:to_image_src'); ?>);"></div>
			<h3>About the Author</h3>
			<p><?php print_custom_field('blog_authorabout'); ?></p>
		</div>
		
		<!-- Shortcode doesn't seem to work, just hardcoding the HTML in here, suppose it's the same anyway -->
		<a href="http://buildinstitute.org/blog/" class="ghost-button-a"><span class="ghost-button arrow-left">Back to all blog posts</span></a>
	
		<?php comments_template( '', true ); ?>
	
	</article>
	<?php endwhile; ?>

</div>

<div id="blog-sidebar">
	<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
	<?php endif; ?>

</div>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>