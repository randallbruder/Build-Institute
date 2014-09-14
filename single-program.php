<?php
/**
 * The Template for displaying all Program posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<main class="program">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>

	<?php
		$program_color = get_post_meta($post->ID, 'program_color', true);
		if ($program_color  != ''):
	 ?>
		<div id="program-color" style="display: none; color: #<?php print_custom_field('program_color') ?>;"></div>
	<?php endif; ?>
	

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	
	<div id="featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
		<h1 style="background: url(<?php print_custom_field('program_icon:to_image_src'); ?>) no-repeat 20px center #<?php print_custom_field('program_color') ?>; background-size: 38px 38px;"><?php the_title(); ?></h1>
	</div>
	
	<?php else: ?>
		
		<h1 style="background: url(<?php print_custom_field('program_icon:to_image_src'); ?>) no-repeat 20px center #<?php print_custom_field('program_color') ?>; background-size: 38px 38px;"><?php the_title(); ?></h1>
	
	<?php endif; ?>
	
	<?php the_content(); ?>

</article>
<?php endwhile; ?>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>