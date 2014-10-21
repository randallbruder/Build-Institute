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
 Template Name: Homepage
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header-homepage' ) ); ?>

<div id="homepage-content" class="balance-text">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>

</div>

<main>

<div id="programs">
    
    <h1>Build Programs</h1>

    <?php $args = array(
    'numberposts'      => -1,
    'offset'           => 0,
    'orderby'          => 'menu_order',
    'order'            => 'DESC',
    'post_type'        => 'program',
    'post_status'      => 'publish',
    'suppress_filters' => true );
    
    $programs = get_posts( $args );
    
    foreach ( $programs as $post ) : setup_postdata( $post ); ?>
        <a href="<?php the_permalink(); ?>">
            <div id="programs-tile" style="background: #<?php print_custom_field('program_color'); ?>;">
                <div id="programs-tile-content" style="background: url(<?php print_custom_field('program_icon:to_image_src'); ?>) no-repeat left center; background-size: 60px 60px;">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </a>
    <?php endforeach;
    wp_reset_postdata();
    ?>

</div>

</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>