<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
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

<div id="blog-header">
	<?php if ( is_active_sidebar( 'blog_header' ) ) : ?>
		<?php dynamic_sidebar( 'blog_header' ); ?>
	<?php endif; ?>
</div>

<div id="blog-posts">

	<?php if ( have_posts() ): ?>
	
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
					Written by <?php print_custom_field('post_author_custom'); ?><br /><br />
					
					<?php
					$postcategories = get_categories();
					if ($postcategories) {
						if (count($postcategories) == 1){
							echo '<strong>Catergory:</strong> ';
						}
						else {
							echo '<strong>Catergories:</strong> ';
						}
						foreach($postcategories as $category) {
							echo $category->name . ', '; 
						}
					  	echo '<br />';
					}
					?>
					
					
					<?php
					$posttags = get_the_tags();
					if ($posttags) {
						echo '<strong>Tags:</strong> ';
					  foreach($posttags as $tag) {
						echo $tag->name . ', '; 
					  }
					}
					?>
				</p>
			</div>
		</div>
	<?php endwhile; ?>
	
	<?php else: ?>
		<h2>No posts to display</h2>
	<?php endif; ?>

</div>

<div id="blog-sidebar">
	<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
	<?php endif; ?>
					
</div>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>