<?php
/**
 * Adventure Resort functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adventure Resort
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Adventure_Resort_Loader.php' );

$Adventure_Resort_Loader = new \WPTRT\Autoload\Adventure_Resort_Loader();

$Adventure_Resort_Loader->adventure_resort_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Adventure_Resort_Loader->adventure_resort_register();

if ( ! function_exists( 'adventure_resort_setup' ) ) :

	function adventure_resort_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'adventure-resort', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('adventure-resort-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','adventure-resort' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'adventure_resort_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_adventure_resort_dismissable_notice', 'adventure_resort_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'adventure_resort_setup' );


function adventure_resort_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adventure_resort_content_width', 1170 );
}
add_action( 'after_setup_theme', 'adventure_resort_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adventure_resort_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adventure-resort' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'adventure-resort' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'adventure-resort' ),
		'id'            => 'adventure-resort-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'adventure-resort' ),
		'id'            => 'adventure-resort-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'adventure-resort' ),
		'id'            => 'adventure-resort-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'adventure_resort_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adventure_resort_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'alumni-sans-inline-one',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One:ital@0;1&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'manrope',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'amatic-sc',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'adventure-resort-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'adventure-resort-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'adventure-resort-style',$adventure_resort_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('adventure-resort-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adventure_resort_scripts' );

/**
 * Enqueue Preloader.
 */
function adventure_resort_preloader() {

  $adventure_resort_theme_color_css = '';
  $adventure_resort_preloader_bg_color = get_theme_mod('adventure_resort_preloader_bg_color');
  $adventure_resort_preloader_dot_1_color = get_theme_mod('adventure_resort_preloader_dot_1_color');
  $adventure_resort_preloader_dot_2_color = get_theme_mod('adventure_resort_preloader_dot_2_color');
  $adventure_resort_logo_max_height = get_theme_mod('adventure_resort_logo_max_height');

  	if(get_theme_mod('adventure_resort_logo_max_height') == '') {
		$adventure_resort_logo_max_height = '200';
	}

	if(get_theme_mod('adventure_resort_preloader_bg_color') == '') {
		$adventure_resort_preloader_bg_color = '#FDD61F';
	}
	if(get_theme_mod('adventure_resort_preloader_dot_1_color') == '') {
		$adventure_resort_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('adventure_resort_preloader_dot_2_color') == '') {
		$adventure_resort_preloader_dot_2_color = '#000000';
	}
	$adventure_resort_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($adventure_resort_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($adventure_resort_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($adventure_resort_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($adventure_resort_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'adventure-resort-style',$adventure_resort_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'adventure_resort_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function adventure_resort_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*dropdown page sanitization*/
function adventure_resort_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function adventure_resort_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function adventure_resort_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function adventure_resort_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'adventure_resort_loop_columns');
if (!function_exists('adventure_resort_loop_columns')) {
	function adventure_resort_loop_columns() {
		$columns = get_theme_mod( 'adventure_resort_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

function adventure_resort_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer_setting' );
    $wp_customize->remove_control( 'pro_version_footer_setting' );

}
add_action( 'customize_register', 'adventure_resort_remove_customize_register', 11 );

/**
 * Get CSS
 */

function adventure_resort_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
   	wp_localize_script('admin-notice-script','adventure_resort',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('adventure_resort_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'adventure_resort_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_adventure-resort-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'adventure-resort-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'adventure_resort_getpage_css' );

if ( ! defined( 'ADVENTURE_RESORT_CONTACT_SUPPORT' ) ) {
define('ADVENTURE_RESORT_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/adventure-resort/','adventure-resort'));
}
if ( ! defined( 'ADVENTURE_RESORT_REVIEW' ) ) {
define('ADVENTURE_RESORT_REVIEW',__('https://wordpress.org/support/theme/adventure-resort/reviews/','adventure-resort'));
}
if ( ! defined( 'ADVENTURE_RESORT_LIVE_DEMO' ) ) {
define('ADVENTURE_RESORT_LIVE_DEMO',__('https://demo.themagnifico.net/adventure-resort/','adventure-resort'));
}
if ( ! defined( 'ADVENTURE_RESORT_GET_PREMIUM_PRO' ) ) {
define('ADVENTURE_RESORT_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/resort-wordpress-theme','adventure-resort'));
}
if ( ! defined( 'ADVENTURE_RESORT_PRO_DOC' ) ) {
define('ADVENTURE_RESORT_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/adventure-resort-pro-doc/','adventure-resort'));
}
if ( ! defined( 'ADVENTURE_RESORT_FREE_DOC' ) ) {
define('ADVENTURE_RESORT_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/adventure-resort-free-doc/','adventure-resort'));
}

add_action('admin_menu', 'adventure_resort_themepage');
function adventure_resort_themepage(){

	$adventure_resort_theme_test = wp_get_theme();

	$adventure_resort_theme_info = add_theme_page( __('Theme Options','adventure-resort'), __(' Theme Options','adventure-resort'), 'manage_options', 'adventure-resort-info.php', 'adventure_resort_info_page' );
}

function adventure_resort_info_page() {
	$adventure_resort_theme_user = wp_get_current_user();
	$adventure_resort_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap adventure-resort-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','adventure-resort'); ?><?php echo esc_html( $adventure_resort_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap demo-content">
						<h3><?php esc_html_e("Instant Demo Setup", "adventure-resort"); ?></h3>
						<p><?php esc_html_e("Import your entire demo content in just one click, including pages, posts, and design elements for a quick setup.", "adventure-resort"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'admin.php?page=theme-importer' )); ?>" class="button button-primary get">
							<?php esc_html_e("Start Demo Import", "adventure-resort"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "adventure-resort"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "adventure-resort"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "adventure-resort"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "adventure-resort"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Adventure Resort , feel free to contact us for any support regarding our theme.", "adventure-resort"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "adventure-resort"); ?>
						</a></p>
					</div>
				</div>
			</div>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "adventure-resort"); ?></h3>
						<p><?php esc_html_e("If You love Adventure Resort theme then we would appreciate your review about our theme.", "adventure-resort"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "adventure-resort"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "adventure-resort"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "adventure-resort"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "adventure-resort"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","adventure-resort"); ?></h2>
		<div class="adventure-resort-button-container">
			<a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "adventure-resort"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "adventure-resort"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "adventure-resort"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "adventure-resort"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "adventure-resort"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "adventure-resort"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "adventure-resort"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "adventure-resort"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "adventure-resort"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="adventure-resort-button-container">
			<a target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "adventure-resort"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function adventure_resort_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'adventure_resort_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}
add_action( 'wp_ajax_adventure_resort_dismissed_notice_handler', 'adventure_resort_ajax_notice_handler' );

function adventure_resort_deprecated_hook_admin_notice() {

    $adventure_resort_dismissed = get_user_meta(get_current_user_id(), 'adventure_resort_dismissable_notice', true);
    if ( !$adventure_resort_dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'adventure-resort'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'adventure-resort'); ?><p>
	    		<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( admin_url( 'admin.php?page=theme-importer' )); ?>"><?php esc_html_e( 'Start Demo Import', 'adventure-resort' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=adventure-resort-info.php' )); ?>"><?php esc_html_e( 'Get started', 'adventure-resort' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'adventure-resort' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( ADVENTURE_RESORT_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'adventure-resort' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'adventure_resort_deprecated_hook_admin_notice' );

function adventure_resort_switch_theme() {
    delete_user_meta(get_current_user_id(), 'adventure_resort_dismissable_notice');
}
add_action('after_switch_theme', 'adventure_resort_switch_theme');
function adventure_resort_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'adventure_resort_dismissable_notice', true);
    die();
}

// Demo Content Code

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu page to trigger theme import
add_action('admin_menu', 'demo_importer_admin_page');

function demo_importer_admin_page() {
    add_theme_page(
        'Demo Theme Importer',     // Page title
        'Theme Importer',          // Menu title
        'manage_options',          // Capability
        'theme-importer',          // Menu slug
        'demo_importer_page',      // Callback function
    );
}

// Display the page content with the button
function demo_importer_page() {
    ?>
    <div class="wrap-main-box">
        <div class="main-box">
            <h2><?php echo esc_html('Welcome to Adventure Resort','adventure-resort'); ?></h2>
            <h3><?php echo esc_html('Create your website in just one click','adventure-resort'); ?></h3>
            <hr>
            <p><?php echo esc_html('The "Begin Installation" helps you quickly set up your website by importing sample content that mirrors the demo version of the theme. This tool provides you with a ready-made layout and structure, so you can easily see how your site will look and start customizing it right away. It\'s a straightforward way to get your site up and running with minimal effort.','adventure-resort'); ?></p>
            <p><?php echo esc_html('Click the button below to install the demo content.','adventure-resort'); ?></p>
            <hr>
            <button id="import-theme-mods" class="button button-primary"><?php echo esc_html('Begin Installation','adventure-resort'); ?></button>
            <div id="import-response"></div>
        </div>
    </div>
    <?php
}

// Add the AJAX action to trigger theme mods import
add_action('wp_ajax_import_theme_mods', 'demo_importer_ajax_handler');

// Handle the AJAX request
function demo_importer_ajax_handler() {
    // Sample data to import
    $theme_mods_data = array(
        'header_textcolor' => '000000',  // Example: change header text color
        'background_color' => 'ffffff',  // Example: change background color
        'custom_logo'      => 123,       // Example: set a custom logo by attachment ID
        'footer_text'      => 'Custom Footer Text', // Example: custom footer text
    );

    // Call the function to import theme mods
    if (demo_theme_importer($theme_mods_data)) {
        // After importing theme mods, create the menu
        create_demo_menu();
        wp_send_json_success(array(
        	'msg' => 'Theme mods imported successfully.',
        	'redirect' => home_url()
        ));
    } else {
        wp_send_json_error('Failed to import theme mods.');
    }

    wp_die();
}

// Function to set theme mods
function demo_theme_importer($import_data) {
    if (is_array($import_data)) {
        foreach ($import_data as $mod_name => $mod_value) {
            set_theme_mod($mod_name, $mod_value);
        }
        return true;
    } else {
        return false;
    }
}

// Function to create demo menu
function create_demo_menu() {

    // Page import process
    $pages_to_create = array(
        array(
            'title'    => 'Home',
            'slug'     => 'home',
            'template' => 'page-template/home-template.php',
        ),
        array(
            'title'    => 'About',
            'slug'     => 'about',
            'template' => '',
        ),
        array(
            'title'    => 'Services',
            'slug'     => 'services',
            'template' => '',
        ),
        array(
            'title'    => 'Gallery',
            'slug'     => 'gallery',
            'template' => '',
        ),
        array(
            'title'    => 'Blog',
            'slug'     => 'blog',
            'template' => '',
        ),
        array(
            'title'    => 'Contact',
            'slug'     => 'contact',
            'template' => '',
        ),
    );

    // Loop through each page data to create pages
    foreach ($pages_to_create as $page_data) {
        $page_check = get_page_by_title($page_data['title']);
        
        // Check if the page doesn't exist already
        if (!$page_check) {
            $page = array(
                'post_type'    => 'page',
                'post_title'   => $page_data['title'],
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => $page_data['slug'],
            );
            
            // Insert the page and get the inserted page ID
            $page_id = wp_insert_post($page);
            
            // Set the page template
            if ($page_id) {
                add_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
        }
    }

    // Set 'Home' as the front page
    $home_page = get_page_by_title('Home');
    if ($home_page) {
        update_option('page_on_front', $home_page->ID);
        update_option('show_on_front', 'page');
    }

    // Set 'Blog' as the posts page
    $blog_page = get_page_by_title('Blog');
    if ($blog_page) {
        update_option('page_for_posts', $blog_page->ID);
    }
    // ------- Create Main Menu --------
    $menuname =  'Primary Menu';
    $bpmenulocation = 'primary';
    $menu_exists = wp_get_nav_menu_object($menuname);
    
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menuname);
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Home','adventure-resort'),
            'menu-item-classes' => 'home',
            'menu-item-url' => home_url( '/' ),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('About','adventure-resort'),
            'menu-item-classes' => 'about',
            'menu-item-url' => home_url( '/' ),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Services','adventure-resort'),
            'menu-item-classes' => 'services',
            'menu-item-url' => home_url( '/' ),
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Gallery','adventure-resort'),
            'menu-item-classes' => 'gallery',
            'menu-item-url' => home_url( '/' ),
            'menu-item-status' => 'publish'
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Blog','adventure-resort'),
            'menu-item-classes' => 'Blog',
            'menu-item-url' => home_url( '/index.php/blog/' ),
            'menu-item-status' => 'publish'
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Contact','adventure-resort'),
            'menu-item-classes' => 'contact',
            'menu-item-url' => home_url( '/' ),
            'menu-item-status' => 'publish'
        ));

        // Assign the menu to the location
        if (!has_nav_menu($bpmenulocation)) {
            $locations = get_theme_mod('nav_menu_locations');
            $locations[$bpmenulocation] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }
    
    //Social Links
    set_theme_mod( 'adventure_resort_facebook_icon', 'fab fa-facebook-f' );
    set_theme_mod( 'adventure_resort_facebook_url', 'www.facebok.com' );
    set_theme_mod( 'adventure_resort_twitter_icon', 'fab fa-twitter' );
    set_theme_mod( 'adventure_resort_twitter_url', 'www.twitter.com' );
    set_theme_mod( 'adventure_resort_intagram_icon', 'fab fa-instagram' );
    set_theme_mod( 'adventure_resort_intagram_url', 'www.instagram.com' );
    set_theme_mod( 'adventure_resort_linkedin_icon', 'fab fa-linkedin-in' );
    set_theme_mod( 'adventure_resort_linkedin_url', 'www.linkedin.com' );
    set_theme_mod( 'adventure_resort_pintrest_icon', 'fab fa-pinterest-p' );
    set_theme_mod( 'adventure_resort_pintrest_url', 'www.pinterest.com' );

    //Top Header
    set_theme_mod( 'adventure_resort_topbar_mail_text', 'adventure@example.com' );
    set_theme_mod( 'adventure_resort_topbar_location_text', '77 Rolling Green Road' );
    set_theme_mod( 'adventure_resort_header_button_text', 'Get Free Quote' );
    set_theme_mod( 'adventure_resort_header_button_url', '#' );

    //Slider
    set_theme_mod( 'adventure_resort_slider_short_heading', 'DISCOVER A WHOLE NEW WORLD OF FUN' );

    for($i=1;$i<=3;$i++){
         $title = 'WELCOME TO ADVENTURE RESORT';
         $content = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.';
            // Create post object
         $my_post = array(
         'post_title'    => wp_strip_all_tags( $title ),
         'post_content'  => $content,
         'post_status'   => 'publish',
         'post_type'     => 'page',
         );

         // Insert the post into the database
         $post_id = wp_insert_post( $my_post );

         if ($post_id) {
	        // Set the theme mod for the slider page
	        set_theme_mod('adventure_resort_top_slider_page' . $i, $post_id);

	        $image_url = get_template_directory_uri().'/assets/img/slider'.$i.'.png';

			$image_id = media_sideload_image($image_url, $post_id, null, 'id');

		        if (!is_wp_error($image_id)) {
		            // Set the downloaded image as the post's featured image
		            set_post_thumbnail($post_id, $image_id);
		        }
      	}
    }

    // Activities
    set_theme_mod( 'adventure_resort_services_heading', 'Activities & Facilities' );
    set_theme_mod( 'adventure_resort_services_content', 'ADVENTURE AWAITS YOU AT ADVENTURE RESORT' );
    for ($i=1; $i <=6 ; $i++) { 
    	set_theme_mod( 'adventure_resort_services_icon'.$i, 'fas fa-mountain');
    }

        $adventure_resort_post_name_array = array('Fresh Pond And Sea Fish', 'ATV Riding', 'Activities And Adventure', 'Fresh Organic Farm Vegetable', 'Camping And Born Fire', 'Trekking And Mountain Climbing',);

        // Create a category
        $adventure_resort_category_name = 'Featured'; // You can change this name
        $adventure_resort_services_sec_category = wp_create_category($adventure_resort_category_name);

        // Ensure the category is created
        if (is_wp_error($adventure_resort_services_sec_category)) {
            return; // Exit if category creation failed
        }

        // Set theme mod for featured section category
        set_theme_mod('adventure_resort_services_sec_category', $adventure_resort_category_name);

        for ($i = 0; $i < 6; $i++) {
            // Create post object
            $adventure_resort_post_name = $adventure_resort_post_name_array[$i];
            $adventure_resort_content = 'It is a long established fact that a reader will be distracted by the readable.';

            $my_post = array(
                'post_title'    => wp_strip_all_tags($adventure_resort_post_name),
                'post_content'  => $adventure_resort_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($adventure_resort_services_sec_category),
            );

            // Insert the post into the database
            $post_id = wp_insert_post($my_post);

            // Handle image
            $image_url = get_template_directory_uri() . '/assets/images/post-img' . ($i + 1) . '.png';

            // Download and attach image
            $image_id = media_sideload_image($image_url, $post_id, null, 'id');

            if (!is_wp_error($image_id)) {
                // Set featured image to post
                set_post_thumbnail($post_id, $image_id);
            }
        }

}
// Enqueue necessary scripts
add_action('admin_enqueue_scripts', 'demo_importer_enqueue_scripts');

function demo_importer_enqueue_scripts() {
    wp_enqueue_script(
        'demo-theme-importer',
        get_template_directory_uri() . '/assets/js/theme-importer.js', // Path to your JS file
        array('jquery'),
        null,
        true
    );

    wp_enqueue_style('demo-importer-style', get_template_directory_uri() . '/assets/css/importer.css', array(), '');

    // Localize script to pass AJAX URL to JS
    wp_localize_script(
        'demo-theme-importer',
        'demoImporter',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('theme_importer_nonce')
        )
    );
}
