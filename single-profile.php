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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article class="profile">
	
	<?php
		$related_post = get_custom_field('graduated_from:get_post');
		$program_color = $related_post['program_color'];
		if ($program_color  != ''):
	 ?>
		<div id="program-color" style="display: none; color: #<?php echo $program_color ?>;"></div>
	<?php endif; ?>
	
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	
		<div id="profile-featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
		<div id="profile-title">
			<h1><?php the_title(); ?></h1><br />
			<h2><?php print_custom_field('associated_company'); ?></h2>
		</div>
	
		<?php else: ?>
	
		<div id="profile-title">
			<h1><?php the_title(); ?></h1><br />
			<h2><?php print_custom_field('associated_company'); ?></h2>
		</div>
	
		<?php endif; ?>
	
	<div id="profile-content">
		<?php the_content(); ?>
	</div>

</article>
<?php endwhile; ?>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>