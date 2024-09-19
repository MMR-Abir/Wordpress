<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Adventure Resort
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses adventure_resort_header_style()
 */
function adventure_resort_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_resort_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'adventure_resort_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'adventure_resort_custom_header_setup' );

if ( ! function_exists( 'adventure_resort_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see adventure_resort_custom_header_setup().
	 */
	function adventure_resort_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.main-header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
					background-position: center top !important;
				    background-size: cover !important;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;