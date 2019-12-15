<?php
/**
 * Webalive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webalive
 */

if ( ! function_exists( 'webalive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function webalive_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Webalive, use a find and replace
		 * to change 'webalive' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'webalive', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'webalive' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'webalive_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add Post Format Support
		 */
		add_theme_support( 'post-formats', array( 
			'audio',
			'aside', 
			'gallery', 
			'image',
			'link',
			'video',
		) );

		/**
		 * WooCommerce Support
		 */
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'webalive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webalive_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'webalive_content_width', 640 );
}
add_action( 'after_setup_theme', 'webalive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webalive_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'webalive' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	// Top Link Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Top Link', 'webalive' ),
		'id'            => 'toplink-widget',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	// Header Quick Link Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Header Quick Link', 'webalive' ),
		'id'            => 'header-quicklink-widget',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );


	// Footer Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'webalive' ),
		'id'            => 'footer-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'webalive' ),
		'id'            => 'footer-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'webalive' ),
		'id'            => 'footer-widget-3',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Footer Widget 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'webalive' ),
		'id'            => 'footer-widget-4',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	// Footer Widget 5
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 5', 'webalive' ),
		'id'            => 'footer-widget-5',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

 
	// Footer Widget 6
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 6', 'webalive' ),
		'id'            => 'footer-widget-6',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

 
	// Copyright Widget 1
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright Widget 1', 'webalive' ),
		'id'            => 'copyright-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-copyright-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	// Copyright Widget 2
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright Widget 2', 'webalive' ),
		'id'            => 'copyright-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'webalive' ),
		'before_widget' => '<div id="%1$s" class="widget webalive-copyright-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'webalive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webalive_public_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'webalive-style', get_stylesheet_uri() );
	wp_enqueue_style( 'webalive', get_template_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_style( 'webalive-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	

	wp_enqueue_script( 'webalive-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), rand(), true );
	wp_enqueue_script( 'webalive-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), rand(), true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), rand(), true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('popper'), rand(), true );
	wp_enqueue_script( 'webalive-google-review', get_template_directory_uri() . '/assets/js/google-review.js',array('jquery'), rand(), true );
	wp_enqueue_script( 'webalive-blog-js', get_template_directory_uri() . '/assets/js/blog.js',array('jquery'), rand(), true );
	wp_enqueue_script( 'webalive', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), rand(), true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webalive_public_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Bootstrap 4 Navwalkers
 */
require get_template_directory() . '/navwalkers.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/webalive-woocommerce.php';
	require get_template_directory() . '/inc/woocommerce/webalive-woocommerce-template-hooks.php';
	require get_template_directory() . '/inc/woocommerce/webalive-woocommerce-functions.php';
}

/**
 * TGM Plugin Activation
 */
require get_template_directory() . '/inc/plugins/tgm-plugin-activation.php';


/**
 * Change the defualt WP login logo
 */
function webalive_login_screen_logo() {
	echo '<style type="text/css">
	.login h1 a {background-image: url('.get_bloginfo( 'template_directory' ).'/assets/img/login-screen.png) !important; height: 80px !important;background-size:100%;width:165px;  }
	</style>';
}
add_action( 'login_head', 'webalive_login_screen_logo' );

function webalive_login_head_url( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'webalive_login_head_url' );

/**
 * A function that contains all options value
 */
function webalive_theme_options() {
	return $webalive_options = array(
		'webalive_header_type' => 'default', // Options: default, large, minimal, none
	);
}


/**
 * Display 3 latest post
 * @author Rasadin
 * @since 1.0.0
 */
function display_three_latest_post() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'post',
	   	'posts_per_page' => 3,
	));
	  if ( $the_query->have_posts() ) : ?>
		
		<?php $return_html = '<div class="row latest-post">' ?>

	  	<?php foreach( $the_query->posts as $post ): ?>

		<!-- calculation of reading time -->
		<?php
		$content = get_post_field('post_content', $post->ID);
		$word_count = str_word_count( strip_tags( $content ) );
		// echo $word_count;
		$readingtime = ceil($word_count / 200);
		if ($readingtime == 1) {
			// $timer = " minute";
			 $timer = " min read";
		} else {
			// $timer = " minutes";
			 $timer = " min read";
		}
		$totalreadingtime = $readingtime . $timer;
		// echo $totalreadingtime;

	
		$return_html .= '
		
		<div class="col-sm-4">
		
			<div class="webalive-blogpost">
					<div class="webalive-blogpost-picture"> <a href=" '.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID).'</a></div>
				<div class="webalive-blogpost-detail">
					<div class="webalive-blogpost-readtime"> <span class ="post_date">'.get_the_date().'</span>	'. "- " .'<span class ="post_read_time">'.$totalreadingtime.'</span></div>
					<h3 class="webalive-blogpost-title"> <a href=" '.get_the_permalink($post->ID).'">'. get_the_title($post->ID).'</a></h3>
				</div>
			</div>
 		</div>
		'; 

	endforeach;

	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_three_latest_post_shortcode', 'display_three_latest_post');


/**
 * Custom Post -- Services
 * @author Rasadin
 * @since 1.0.0
 */
function ethos_serices_custom_post() {
	$labels = array(
	  'name'               => _x( 'Services', 'post type general name' ),
	  'singular_name'      => _x( 'Service', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'service' ),
	  'add_new_item'       => __( 'Add New Service' ),
	  'edit_item'          => __( 'Edit Service' ),
	  'new_item'           => __( 'New Service' ),
	  'all_items'          => __( 'All Services' ),
	  'view_item'          => __( 'View Service' ),
	  'search_items'       => __( 'Search Services' ),
	  'not_found'          => __( 'No service found' ),
	  'not_found_in_trash' => __( 'No service found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Services'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds services and service specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor','taxonomies', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'services', $args ); 
  }
  add_action( 'init', 'ethos_serices_custom_post' );
 




/**
 * Display Services
 * @author Rasadin
 * @since 1.0.0
 */
function display_ethos_serices() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'services',
	   	'posts_per_page' => 6,
	));
	  if ( $the_query->have_posts() ) : ?>
		
		<?php $return_html = '<div class="container-fluid row service-post">' ?>

	  	<?php foreach( $the_query->posts as $post ): ?>

		<!-- calculation of reading time -->
		<?php
		$return_html .= '
		<div class="col-sm-4">
		<a href=" '.get_the_permalink($post->ID).'">
			<div class="webalive-service-post">
				<div class="webalive-service-title"> '. get_the_title($post->ID).'</div>
			</div>
		</a>
		</div>
		'; 

	endforeach;

	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_ethos_serices_shortcode', 'display_ethos_serices');


/**
 * Generate breadcrumbs
 * @author Rasadin
 * @since 1.0.0
 */
function get_breadcrumb() {
	echo '<a href="'.home_url().'" rel="nofollow">Home</a>';

    if (is_category() || is_single()) {
		global $post;
		// the_category();
		$categories = get_the_terms( $post->ID, 'category' );

		if ($categories != ""){
		$category_id = get_cat_ID( $categories[0]->name);
		$category_link = get_category_link( $category_id ); ?>
		<a href=" <?php echo $category_link ?>"><span class="separator"> &nbsp;&gt; </span> <?php echo $categories[0]->name; ?></a> <?php
		}

		if (is_single()) {
			echo '<span class="separator">';
			echo " &nbsp;&#62; ";
			echo '</span>';
			the_title();		
		}
    } elseif (is_page()) {
		echo '<span class="separator">';
		echo " &nbsp;&#62; ";
		echo '</span>';
		echo the_title();
		
	}
	elseif (!is_page()) {
		echo '<span class="separator">';
		echo " &nbsp;&#62; ";
		echo '</span>';
		echo 'Blog';
		
	}

	 elseif (is_search()) {
		echo '<span class="separator">';
		echo " &nbsp;&#62;Search Results for... ";
		echo '</span>';
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}
add_shortcode('get_breadcrumb_shortcode', 'get_breadcrumb');



/**
 * Custom Post -- Team Member
 * @author Rasadin
 * @since 1.0.0
 */
function ethos_members_custom_post() {
	$labels = array(
	  'name'               => _x( 'Members', 'post type general name' ),
	  'singular_name'      => _x( 'Member', 'post type singular name' ),
	  'add_new'            => _x( 'Add New', 'member' ),
	  'add_new_item'       => __( 'Add New Member' ),
	  'edit_item'          => __( 'Edit Member' ),
	  'new_item'           => __( 'New Member' ),
	  'all_items'          => __( 'All Members' ),
	  'view_item'          => __( 'View Member' ),
	  'search_items'       => __( 'Search Members' ),
	  'not_found'          => __( 'No member found' ),
	  'not_found_in_trash' => __( 'No member found in the Trash' ), 
	  'parent_item_colon'  => '',
	  'menu_name'          => 'Members'
	);
	$args = array(
	  'labels'        => $labels,
	  'description'   => 'Holds members and member specific data',
	  'public'        => true,
	  'menu_position' => 5,
	  'supports'      => array( 'title', 'editor','taxonomies', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'   => true,
	);
	register_post_type( 'members', $args ); 
  }
  add_action( 'init', 'ethos_members_custom_post' );


/**
 * Custom Post -- Add meta field for member designation
 * @author Rasadin
 * @since 1.0.0
 */
function add_metabox_member_designation() {
	add_meta_box(
		'member_designation_metabox', // metabox ID, it also will be the HTML id attribute
		'Member Information', // title
		'member_designation_display_metabox', // this is a callback function, which will print HTML of our metabox
		'members', // post type or post types in array
		'normal', // position on the screen where metabox should be displayed (normal, side, advanced)
		'default' // priority over another metaboxes on this page (default, low, high, core)
	);
}
add_action( 'admin_menu', 'add_metabox_member_designation' );


/**
 * Custom Post --  Member Designation Input Field
 * @author Rasadin
 * @since 1.0.0
 */
function member_designation_display_metabox( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'member_designation_metabox_nonce' ); //needed for security reasons

	//text field
	$html = '<p><label>Designation: <input type="text" name="member_designation_title" value="' . esc_attr( get_post_meta($post->ID, 'member_designation_title',true) )  . '" /></label></p>';
	$linkedin_link = '<p><label>LinkedIn Link: <input type="text" name="member_linkedin_link" value="' . esc_attr( get_post_meta($post->ID, 'member_linkedin_link',true) )  . '" /></label></p>';
	$phone_number = '<p><label>Phone Number: <input type="phone" name="member_phone_number" value="' . esc_attr( get_post_meta($post->ID, 'member_phone_number',true) )  . '" /></label></p>';
	$email_id = '<p><label>Email: <input type="email" name="member_email_id" value="' . esc_attr( get_post_meta($post->ID, 'member_email_id',true) )  . '" /></label></p>';
	$title_for_editor = '<p><label>Expertise:</label></p>';
	// print all of this
	echo $html;
	echo $linkedin_link;
	echo $phone_number;
	echo $email_id;
	echo $title_for_editor;
	$content = get_post_meta($post->ID, 'member_editor_box_for_expertise' , true ) ;
	wp_editor( htmlspecialchars_decode($content), 'member_editor_box_for_expertise', array("media_buttons" => false) );


}

/**
 * Custom Post --  Member Designation Input Field Value Save
 * @author Rasadin
 * @since 1.0.0
 */
function member_designation_save_post_meta( $post_id, $post ) {
	// Security checks
	if ( !isset( $_POST['member_designation_metabox_nonce'] ) 
	|| !wp_verify_nonce( $_POST['member_designation_metabox_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	
	//Check current user permissions
	$post_type = get_post_type_object( $post->post_type );
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	
	// Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
 
	if ($post->post_type == 'members') { // define your own post type here
		update_post_meta($post_id, 'member_designation_title', sanitize_text_field( $_POST['member_designation_title'] ) );
		update_post_meta($post_id, 'member_designation_noindex', $_POST['member_designation_noindex']);	
		update_post_meta($post_id, 'member_linkedin_link', sanitize_text_field( $_POST['member_linkedin_link'] ) );
		update_post_meta($post_id, 'member_phone_number', sanitize_text_field( $_POST['member_phone_number'] ) );
		update_post_meta($post_id, 'member_email_id', sanitize_text_field( $_POST['member_email_id'] ) );
	    $data=htmlspecialchars($_POST['member_editor_box_for_expertise']);
    	update_post_meta($post_id, 'member_editor_box_for_expertise', $data );

	}
	return $post_id;
}
add_action( 'save_post', 'member_designation_save_post_meta', 10, 2 );

/**
 * Display 3 Members
 * @author Rasadin
 * @since 1.0.0
 */
function display_three_members() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'members',
	   	'posts_per_page' => 3,
	));
	  if ( $the_query->have_posts() ) : 
		$return_html = '<div class="row member-list">';
	  	foreach( $the_query->posts as $post ): 
		$return_html .= '
		<div class="col-sm-4">
			<div class="webalive-member-post">
					<div class="webalive-member-picture"> <a href=" '.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID).'</a></div>
				<div class="webalive-member-detail">
					<h3> <a href=" '.get_the_permalink($post->ID).'">'. get_the_title($post->ID).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_designation_title', true ).'</a></h3>
				</div>
			</div>
 		</div>
		'; 
	endforeach;
	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_three_members_shortcode', 'display_three_members');



 /**
 * Display All Members
 * @author Rasadin
 * @since 1.0.0
 */
function display_all_members() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'members',
	   	'posts_per_page' => '',
	));
	  if ( $the_query->have_posts() ) : 
		$return_html = '<div class="row member-list">';
	  	foreach( $the_query->posts as $post ): 
		$return_html .= '
		<div class="col-sm-4">
			<div class="webalive-member-post">
					<div class="webalive-member-picture"> <a href=" '.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID).'</a></div>
				<div class="webalive-member-detail">
					<h3> <a href=" '.get_the_permalink($post->ID).'">'. get_the_title($post->ID).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_designation_title', true ).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_linkedin_link', true ).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_phone_number', true ).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_email_id', true ).'</a></h3>
					<h4> <a href=" '.get_the_permalink($post->ID).'">'. get_post_meta($post->ID, 'member_editor_box_for_expertise', true ).'</a></h3>
				</div>
			</div>
 		</div>
		'; 
	endforeach;
	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_all_members_shortcode', 'display_all_members');
 

 /**
 * Display first 3 latest blog post
 * @author Rasadin
 * @since 1.0.0
 */
function display_first_3_latest_blog_post() {
	$the_query = new WP_Query( array(
	  	'post_type' => 'post',
	   	'posts_per_page' => 3,
	));
	  if ( $the_query->have_posts() ) : ?>
		
		<?php $return_html = '<div class="row featured-post">' ?>

	  	<?php foreach( $the_query->posts as $post ): ?>

		<!-- calculation of reading time -->
		<?php
		$content = get_post_field('post_content', $post->ID);
		$word_count = str_word_count( strip_tags( $content ) );
		// echo $word_count;
		$readingtime = ceil($word_count / 200);
		if ($readingtime == 1) {
			// $timer = " minute";
			 $timer = " min read";
		} else {
			// $timer = " minutes";
			 $timer = " min read";
		}
		$totalreadingtime = $readingtime . $timer;
		// echo $totalreadingtime;
		$categories = get_the_terms( $post->ID, 'category' );
		$category_id = get_cat_ID( $categories[0]->name);
		$category_link = get_category_link( $category_id );
	
		$return_html .= '
		
		<div class="featured-card">
				<div class="featured-post-picture"> <a href=" '.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID).'</a></div>
			<div class="featured-post-detail">
				<div class="featured-post-category"><a href="'.$category_link.'">'.$categories[0]->name.'</a></div>
				<div class="featured-post-readtime"> <span class ="post_date">'.get_the_date().'</span>	'. "- " .'<span class ="post_read_time">'.$totalreadingtime.'</span></div>
				<h3 class="featured-post-title"> <a href=" '.get_the_permalink($post->ID).'">'. get_the_title($post->ID).'</a></h3>
			</div>
		</div>
		
		'; 

	endforeach;

	$return_html .= '</div>';
	endif;
	// wp_reset_postdata(); 
	return $return_html;

}
 add_shortcode('display_first_3_latest_blog_post_shortcode', 'display_first_3_latest_blog_post');


/**
 * Display all blog post
 * @author Rasadin
 * @since 1.0.0
 */


function blog_recent_post_load( $atts, $content=null ) { ?>
	<div id="ajax-posts" class="row">
		 <?php
			 $postsPerPage = 3;
			 $args = array(
					 'post_type' => 'post',
					 'posts_per_page' => $postsPerPage,
					 
			 );
			 $loop = new WP_Query($args);
			 while ($loop->have_posts()) : $loop->the_post();
		 ?>
 
		  <div class="small-12 large-4 columns">
				 <h1><?php the_title(); ?></h1>
				 <p><?php the_content(); ?></p>
		  </div>
 
		  <?php
				 endwhile;
		 wp_reset_postdata();
		  ?>
	 </div>
	 <div id="more_posts">Load More</div>
	 <?php
 }
 add_shortcode('blog_recent_post_load_shortcode', 'blog_recent_post_load');


 function more_post_ajax(){
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    header("Content-Type: text/html");
    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );
    $loop = new WP_Query($args);
    $out = '';
    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '<div class="small-12 large-4 columns">
                <h1>'.get_the_title().'</h1>
                <p>'.get_the_content().'</p>
         </div>';
    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


