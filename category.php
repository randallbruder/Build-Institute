<?php
/**
 * The template for displaying Category Archive pages
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

<?php if ( have_posts() ): ?>
<h2>Category: <?php echo single_cat_title( '', false ); ?></h2>

<div id="blog-posts">
<?php while ( have_posts() ) : the_post(); ?>

		<div class="blog-post">
			<?php 
			if ( has_post_thumbnail() ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				echo '<div class="blog-post-thumbnail-wrapper"><div class="blog-post-thumbnail" style="background: url(' . $image[0] . '); background-size: cover;"></div></div>';
			}
			?>
			<div class="blog-post-text">
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p><?php print_custom_field('summary'); ?></p>
				<p class="blog-post-meta">
					Published on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date('F jS, Y'); ?></time><br />
					Written by <?php the_author(); ?>
				</p>
			</div>
		</div>

<?php endwhile; ?>
</div>

<div id="blog-sidebar">
	<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
	<?php endif; ?>

</div>

<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>