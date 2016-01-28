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

	<h1><?php the_title(); ?></h1>
	
	<div id="event-date"><h3><?php eo_the_start('l, F jS, Y'); ?> at <?php eo_the_start('g:ia'); ?></h3></div>
	
	<?php if( eo_get_venue() ): ?>
		
		<div id="event-venue">
			<h4><?php eo_venue_name(); ?></h4>
		</div>

	<?php endif; ?>
	
	<?php the_content(); ?>
	
	<?php if( eo_get_venue() ):
		$location = explode(',', eo_get_venue_name(), 2);
		echo do_shortcode( "[google-map-sc width=100% height=300 zoom=15 type=ROADMAP address='".$location[1]."']" );
	endif; ?>
	
	<?php echo do_shortcode( '[button url="http://www.buildinstitute.com/events/" arrow="left"]All Events[/button]' ) ?>

<?php endwhile; ?>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>