<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Build Institute
 * @since 		Build Institute 1.0
 */
 
 /*
 Template Name: Events
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<main>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
    <?php endwhile; ?>

    <div id="events-fullcalendar">
        <?php echo do_shortcode( '[eo_fullcalendar theme=false tooltip=false]' ) ?>
    </div>
    
    <div id="events-list">
        <?php echo do_shortcode( '[eo_events showpastevents=false]<div class="events-list-date">%start{l, F jS, Y }%at%start{ g:ia}%</div><h3><a href="%event_url%">%event_title%</a></h3><div class="events-list-content">%event_excerpt{30}% <a href="%event_url%">More Info</a></div>[/eo_events]' ) ?>
    </div>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>