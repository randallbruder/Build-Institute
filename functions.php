<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails', array( 'program', 'profile' ) );
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */
	
	/* ========================================================================================================================
	
	Register our sidebars and widgetized areas
	
	======================================================================================================================== */

	function arphabet_widgets_init() {
	
		register_sidebar( array(
			'name' => 'Footer Left',
			'id' => 'footer_left',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => 'Footer Middle',
			'id' => 'footer_middle',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => 'Footer Right',
			'id' => 'footer_right',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );
	
	/* ========================================================================================================================
	
	Custom Shortcodes
	
	======================================================================================================================== */
		  
	function display_build_programs() {
	   query_posts(array('posts_per_page' => -1, 'offset' => 0, 'orderby' => 'menu_order', 'order' => 'DESC', 'post_type' => 'program', 'post_status' => 'publish', 'suppress_filters' => true ));
	   if (have_posts()) :
		  while (have_posts()) : the_post();
			 $return_string .= '<a href="'.get_permalink().'"><div id="programs-tile" style="background: #'.get_custom_field('program_color').';"><div id="programs-tile-content" style="background: url('.get_custom_field('program_icon:to_image_src').') no-repeat left center; background-size: 60px 60px;"><h2>'.get_the_title().'</h2></div></div></a>';
		  endwhile;
	   endif;
	   wp_reset_query();
	   return $return_string;
	}

	add_shortcode('programs', 'display_build_programs');
	
	function display_build_profiles() {
	   query_posts(array('posts_per_page' => -1, 'offset' => 0, 'orderby' => 'date', 'order' => 'DESC', 'post_type' => 'profile', 'post_status' => 'publish', 'suppress_filters' => true ));
	   if (have_posts()) :
	   	$return_string .= '<div id="profiles">';
		while (have_posts()) : the_post();
			
			if (has_post_thumbnail( $post->ID ) ):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			endif;
			
			$post = get_custom_field('graduated_from:get_post');
			$program_color = $post['program_color'];
			
			list($r, $g, $b) = sscanf($program_color, "%02x%02x%02x");
			
			$return_string .= '<div class="profiles-single"><a href="'.get_permalink().'"><div class="profiles-thumb" style="background-image: url('.$image[0].')"></div><div class="profiles-title" style="background: rgba('.$r.', '.$g.', '.$b.', .7);"><h2>'.get_the_title().'</h2><h3>'.get_custom_field('associated_company').'</h3></div></a></div>';
		  endwhile;
		  $return_string .= '</div>';
	   endif;
	   wp_reset_query();
	   return $return_string;
	}
	
	add_shortcode('profiles-grid', 'display_build_profiles');
	

	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ), time().'.0' );
		wp_enqueue_script( 'site' );
		
		wp_register_script( 'classie', get_template_directory_uri().'/js/classie.js', array(), '1.0', true );
		wp_enqueue_script( 'classie' );
		
		wp_register_script( 'sidebarEffects', get_template_directory_uri().'/js/sidebarEffects.js', array(), '1.0.0', true );
		wp_enqueue_script( 'sidebarEffects' );
		
		wp_register_script( 'selectbox', get_template_directory_uri().'/js/jquery.selectbox-0.2.min.js', array(), '0.2', true );
		wp_enqueue_script( 'selectbox' );
		
		wp_register_script( 'lightSlider', get_template_directory_uri().'/js/jquery.lightSlider.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'lightSlider' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', time().'.0', 'screen' );
        wp_enqueue_style( 'screen' );
        
	}
	
	function my_theme_add_editor_styles() {
		add_editor_style( 'editor-style.css' );
	}
	add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	
	/* Disable comments on attachments */
	
	function filter_media_comment_status( $open, $post_id ) {
		$post = get_post( $post_id );
		if( $post->post_type == 'attachment' ) {
			return false;
		}
		return $open;
	}
	add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );