<?php 
/**
 * Adventure Lite functions and definitions
 *
 * @package Adventure Lite
 */

 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'adventure_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function adventure_lite_setup() {
	$GLOBALS['content_width'] = apply_filters( 'adventure_lite_content_width', 640 );
	load_theme_textdomain( 'adventure-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 62,
		'width'       => 136,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'adventure-lite' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // adventure_lite_setup
add_action( 'after_setup_theme', 'adventure_lite_setup' );
function adventure_lite_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adventure-lite' ),
		'description'   => esc_html__( 'Appears on sidebar', 'adventure-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3>',
		'after_widget'  => '</aside>',
	) ); 
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'adventure-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'adventure-lite' ),
		'id'            => 'fc-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'adventure-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'adventure-lite' ),
		'id'            => 'fc-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'adventure-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'adventure-lite' ),
		'id'            => 'fc-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'adventure-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'adventure-lite' ),
		'id'            => 'fc-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );		
}
add_action( 'widgets_init', 'adventure_lite_widgets_init' );


/**
* Enqueue theme fonts.
*/
function adventure_lite_fonts() {
	$fonts_url = adventure_lite_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'adventure-lite-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
	}
}
add_action( 'wp_enqueue_scripts', 'adventure_lite_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'adventure_lite_fonts', 1 );

/**
 * Retrieve webfont URL to load fonts locally.
 */
function adventure_lite_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Playfair Display:400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
		'Oswald:200,300,400,500,600,700,800',
		'Roboto:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'adventure_lite_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}
	
	
function adventure_lite_scripts() {
	if ( !is_rtl() ) {
		wp_enqueue_style( 'adventure-lite-basic-style', get_stylesheet_uri() );
		wp_enqueue_style( 'adventure-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	}
	if ( is_rtl() ) {
		wp_enqueue_style( 'adventure-lite-rtl', get_template_directory_uri() . "/rtl.css");
	}	
	wp_enqueue_style( 'adventure-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'adventure-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'adventure-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01062020', true );
	wp_enqueue_script( 'adventure-lite-customscripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );
	wp_localize_script( 'adventure-lite-navigation', 'adventureliteScreenReaderText', array(
		'expandMain'   => __( 'Open main menu', 'adventure-lite' ),
		'collapseMain' => __( 'Close main menu', 'adventure-lite' ),
		'expandChild'   => __( 'Expand submenu', 'adventure-lite' ),
		'collapseChild' => __( 'Collapse submenu', 'adventure-lite' ),
	) );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adventure_lite_scripts' );

function adventure_lite_admin_style() {
  wp_enqueue_style('adventure-lite-admin-style', get_template_directory_uri()."/css/adventure-lite-admin-style.css");
}
add_action('admin_enqueue_scripts', 'adventure_lite_admin_style');

define('ADVENTURE_LITE_SKTTHEMES_URL','https://www.sktthemes.org');
define('ADVENTURE_LITE_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/adventure-wordpress-theme');
define('ADVENTURE_LITE_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-travel-blog-wordpress-theme');
define('ADVENTURE_LITE_SKTTHEMES_THEME_DOC','http://sktthemesdemo.net/documentation/adventure-lite-documentation');
define('ADVENTURE_LITE_SKTTHEMES_LIVE_DEMO','http://sktperfectdemo.com/demos/adventure');
define('ADVENTURE_LITE_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('ADVENTURE_LITE_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function adventure_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
if ( ! function_exists( 'adventure_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function adventure_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

add_filter( 'body_class','adventure_lite_body_class' );
function adventure_lite_body_class( $classes ) {
	if ( adventure_lite_is_woocommerce_activated() ) {
		$classes[] = 'woocommerce';
	}
	
    return $classes;
}

/**
 * Filter the except length to 21 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function adventure_lite_custom_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 25;
}
add_filter( 'excerpt_length', 'adventure_lite_custom_excerpt_length', 999 );
 
/**
 *
 * Style For About Theme Page
 *
 */
function adventure_lite_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_adventure_lite_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'adventure-lite-about-page-style', get_template_directory_uri() . '/css/adventure-lite-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'adventure_lite_admin_about_page_css_enqueue' );

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'adventure_lite_is_woocommerce_activated' ) ) {
	function adventure_lite_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'adventure_lite_activation_notice' );
}
function adventure_lite_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="adventure-lite-notice-container">
        	<div class="adventure-lite-notice-img"><img src="<?php echo esc_url( ADVENTURE_LITE_SKTTHEMES_THEME_URI . 'images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="adventure-lite-notice-content">
            <div class="adventure-lite-notice-heading"><?php echo esc_html__('Thank you for installing Adventure Lite!', 'adventure-lite'); ?></div>
            <p class="largefont"><?php echo esc_html__('Adventure Lite comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'adventure-lite'); ?></p>
            </div>
            <div class="adventure-lite-clear"></div>
        </div>
    </div>
    <?php
}

function adventure_lite_wp_admin_style($hook) {
	 	if ( 'themes.php' != $hook ) {
			return;
		}
		wp_enqueue_style( 'adventure-lite-admin-style', get_template_directory_uri() . '/css/adventure-lite-admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'adventure_lite_wp_admin_style' );

// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function adventure_lite_skip_link_focus_fix() {  
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php       
}
add_action( 'wp_print_footer_scripts', 'adventure_lite_skip_link_focus_fix' );

function adventure_lite_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'adventure_lite_load_dashicons', 999);

/**
 * Include the Plugin_Activation class.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'adventure_lite_register_required_plugins' );
 
function adventure_lite_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		)
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins',   // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'wp_enqueue_scripts', 'adventure_lite_custom_enqueue_wc_cart_fragments' );
function adventure_lite_custom_enqueue_wc_cart_fragments() {
    wp_enqueue_script( 'wc-cart-fragments' );
}

add_filter( 'woocommerce_add_to_cart_fragments', 'adventure_lite_mini_cart_count');
function adventure_lite_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="mini-cart-count">
        <?php echo esc_html(WC()->cart->get_cart_contents_count()); ?>
    </div>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'adventure_lite_refresh_cart_total');
function adventure_lite_refresh_cart_total( $fragments ) {
		ob_start();
	?>
		<div id="mini-cart-total">
			<?php echo esc_html_e('Total', 'adventure-lite'); ?>
				<div class="clear"></div>
				<?php echo wp_kses_post(WC()->cart->get_cart_total()); ?>
		</div>
		<?php
				$fragments['#mini-cart-total'] = ob_get_clean();
		return $fragments;
}