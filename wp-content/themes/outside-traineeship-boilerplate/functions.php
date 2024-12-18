<?php
/**
 * Outside Traineeship Biolerplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Outside_Traineeship_Biolerplate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function outside_traineeship_biolerplate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Outside Traineeship Biolerplate, use a find and replace
		* to change 'outside-traineeship-biolerplate' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'outside-traineeship-biolerplate', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Primary', 'outside-traineeship-biolerplate' ),
			'footer-menu' => esc_html__( 'Footer', 'outside-traineeship-biolerplate' ),
		)
		
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'outside_traineeship_biolerplate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'outside_traineeship_biolerplate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function outside_traineeship_biolerplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'outside_traineeship_biolerplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'outside_traineeship_biolerplate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function outside_traineeship_biolerplate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'outside-traineeship-biolerplate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'outside-traineeship-biolerplate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'outside_traineeship_biolerplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function outside_traineeship_biolerplate_scripts() {
	wp_enqueue_style('app.css', get_template_directory_uri().'/public/styles/app.css', false, null);
    wp_enqueue_script('app.js', get_template_directory_uri().'/public/scripts/app.js', ['jquery'], null, true);
	
    wp_enqueue_script('history.js', get_template_directory_uri().'/public/scripts/history.js', ['jquery'], null, true);

    wp_enqueue_script('contact-section.js', get_template_directory_uri().'/public/scripts/contact-section.js', ['jquery'], null, true);

	wp_localize_script('contact-section.js', 'ajax_object', array(
		'ajax_url'	=> admin_url('admin-ajax.php'),
	));

}
add_action('wp_enqueue_scripts', 'outside_traineeship_biolerplate_scripts');


function is_block_preview(){
	return is_admin() ? true : false;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/acf-block.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'General Settings',
        'menu_title'    => 'General Settings',
        'menu_slug'     => 'general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'general-settings',
    ));

}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function add_custom_class_to_menu_links($atts, $item, $args) {
    // Check if this is the specific menu location
    if (isset($args->theme_location) && $args->theme_location === 'header-menu') {
        // Add your custom class
        $atts['class'] = 'text-lg text-neutral-600 nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_custom_class_to_menu_links', 10, 3);

/*
Wordpress AJAX for form handling
*/
function handle_form_submission() {
	$first_name 	= sanitize_text_field($_POST['first_name']);
	$last_name		= sanitize_text_field($_POST['last_name']);
    $email			= sanitize_email($_POST['email']);
    $phone			= $_POST['phone'];
	$move_in_date	= $_POST['move_in_date'];
	$unit_type		= $_POST['unit_type'];
	$room_type		= $_POST['room_type'];

	// if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($move_in_date) || empty($unit_type) || empty($room_type)) {
	// 	wp_send_json_error('All fields are required');
	// }

	$post_id = wp_insert_post(array(
		'post_title'   => $first_name . ' ' . $last_name,
        'post_type'    => 'contact-form',
        'post_status'  => 'publish',
	));

	if (is_wp_error($post_id)) {
        wp_send_json_error('Failed to create contact form submission.');
    }

	$group_data = array(
        'first_name'   	=> $first_name,
        'last_name'    	=> $last_name,
        'email'        	=> $email,
        'phone_number'	=> $phone,
        'move_in_date' 	=> $move_in_date,
        'unit_type'    	=> $unit_type,
        'room_type'    	=> $room_type,
    );

	update_field('form_details', $group_data, $post_id);

	$to      = $email; // Send the email to the submitted email address
    $subject = 'Thank You for Your Submission';
    $message = "Dear $first_name $last_name,\n\n";
    $message .= "Thank you for your submission. Here are the details you provided:\n\n";
    $message .= "First Name: $first_name\n";
    $message .= "Last Name: $last_name\n";
    $message .= "Phone: $phone\n";
    $message .= "Move-In Date: $move_in_date\n";
    $message .= "Unit Type: $unit_type\n";
    $message .= "Room Type: $room_type\n\n";
    $message .= "We will get back to you shortly.\n\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    // Send the email
    $mail_sent = wp_mail($to, $subject, $message, $headers);

    if (!$mail_sent) {
        wp_send_json_error('Failed to send email. Please try again later.');
    }

	wp_send_json_success("Thank you, $first_name $last_name! Your contact is recorded");
}

add_action('wp_ajax_submit_form_action', 'handle_form_submission');
add_action('wp_ajax_nopriv_submit_form_action', 'handle_form_submission');