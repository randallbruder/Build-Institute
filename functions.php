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

	add_theme_support( 'post-thumbnails', array( 'program', 'profile', 'post' ) );
	
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
		
		register_sidebar( array(
			'name' => 'Blog Sidebar',
			'id' => 'blog_sidebar',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' => 'Blog Header',
			'id' => 'blog_header',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
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
	
	function ghost_button( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'url' => 'http://buildinstitute.org',
			'arrow' => 'none',
		), $atts );

		$button_classes = "ghost-button";
		
		if ($a['arrow'] == 'left') { $button_classes .= " arrow-left"; }
		if ($a['arrow'] == 'right') { $button_classes .= " arrow-right"; }
		
		return '<a href="'.$a['url'].'" class="ghost-button-a"><span class="'.$button_classes.'">' . $content . '</span></a>';
	}
	
	add_shortcode('button', 'ghost_button');

	/* ========================================================================================================================
	
	Jetpack Share Image Thing
	
	======================================================================================================================== */

	function fb_home_image( $tags ) {
		if ( is_home() || is_front_page() ) {
			// Remove the default blank image added by Jetpack
			unset( $tags['og:image'] );
	
			$fb_home_img = home_url().'/facebook.jpg';
			$tags['og:image'] = esc_url( $fb_home_img );
		}
		return $tags;
	}
	add_filter( 'jetpack_open_graph_tags', 'fb_home_image' );
	
	
	
	function fb_custom_image( $media, $post_id, $args ) {
		if ( $media ) {
			return $media;
		} else {
			$permalink = get_permalink( $post_id );
			$url = apply_filters( 'jetpack_photon_url', home_url().'/facebook.jpg' );
	
			return array( array(
				'type'  => 'image',
				'from'  => 'custom_fallback',
				'src'   => esc_url( $url ),
				'href'  => $permalink,
			) );
		}
	}
	add_filter( 'jetpack_images_get_images', 'fb_custom_image', 10, 3 );


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
		
		wp_register_script( 'classie', get_template_directory_uri().'/js/classie.js', array(), '1.0', true );
		wp_enqueue_script( 'classie' );
		
		wp_register_script( 'sidebarEffects', get_template_directory_uri().'/js/sidebarEffects.js', array(), '1.0.0', true );
		wp_enqueue_script( 'sidebarEffects' );
		
		wp_register_script( 'selectbox', get_template_directory_uri().'/js/jquery.selectbox-0.2.min.js', array(), '0.2', true );
		wp_enqueue_script( 'selectbox' );
		
		wp_register_script( 'lightSlider', get_template_directory_uri().'/js/jquery.lightSlider.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'lightSlider' );
		
		wp_register_script( 'clampJs', get_template_directory_uri().'/js/clamp.min.js', array(), '0.5.1', true );
		wp_enqueue_script( 'clampJs' );
		
		wp_register_script( 'mmenu', get_template_directory_uri().'/js/jquery.mmenu.min.js', array(), '4.5.5', true );
		wp_enqueue_script( 'mmenu' );
		
		wp_register_script( 'mmenu-header', get_template_directory_uri().'/js/jquery.mmenu.header.min.js', array(), '4.5.5', true );
		wp_enqueue_script( 'mmenu-header' );
		
		wp_register_script( 'balance-text', get_template_directory_uri().'/js/jquery.balancetext.min.js', array(), '1.3.0', true );
		wp_enqueue_script( 'balance-text' );
		
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', time().'.0', 'screen' );
		wp_enqueue_style( 'screen' );
		
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ), time().'.0' );
		wp_enqueue_script( 'site' );
		
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
				<?php comment_text() ?>
				<p class="comment-meta"><strong>Posted by <?php comment_author_link() ?></strong> on <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date('F jS, Y') ?></a></time></p>
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