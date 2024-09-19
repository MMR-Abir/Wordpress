<?php
/**
 * Adventure Resort Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Adventure Resort
 */

if ( ! defined( 'ADVENTURE_RESORT_URL' ) ) {
    define( 'ADVENTURE_RESORT_URL', esc_url( 'https://www.themagnifico.net/products/resort-wordpress-theme', 'adventure-resort') );
}
if ( ! defined( 'ADVENTURE_RESORT_TEXT' ) ) {
    define( 'ADVENTURE_RESORT_TEXT', __( 'Adventure Resort Pro','adventure-resort' ));
}
if ( ! defined( 'ADVENTURE_RESORT_BUY_TEXT' ) ) {
    define( 'ADVENTURE_RESORT_BUY_TEXT', __( 'Buy Adventure Resort Pro','adventure-resort' ));
}

use WPTRT\Customize\Section\Adventure_Resort_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Adventure_Resort_Button::class );

    $manager->add_section(
        new Adventure_Resort_Button( $manager, 'adventure_resort_pro', [
            'title'       => esc_html( ADVENTURE_RESORT_TEXT,'adventure-resort' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'adventure-resort' ),
            'button_url'  => esc_url( ADVENTURE_RESORT_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'adventure-resort-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'adventure-resort-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adventure_resort_customize_register($wp_customize){

    // Pro Version
    class Adventure_Resort_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ADVENTURE_RESORT_BUY_TEXT,'adventure-resort' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Adventure_Resort_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('adventure_resort_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'adventure-resort' ),
        'section'        => 'title_tagline',
        'settings'       => 'adventure_resort_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('adventure_resort_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'adventure-resort' ),
        'section'        => 'title_tagline',
        'settings'       => 'adventure_resort_theme_description',
        'type'           => 'checkbox',
    )));

    //Logo
    $wp_customize->add_setting('adventure_resort_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'adventure_resort_sanitize_number_absint'
    ));
    $wp_customize->add_control('adventure_resort_logo_max_height',array(
        'label' => esc_html__('Logo Width','adventure-resort'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('adventure_resort_global_color_settings',array(
        'title' => esc_html__('Global Settings','adventure-resort'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'adventure_resort_global_color', array(
        'default' => '#FDD61F',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'adventure-resort'),
        'section' => 'adventure_resort_global_color_settings',
        'settings' => 'adventure_resort_global_color',
    )));

    //Typography option
    $adventure_resort_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'adventure_resort_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_heading_color', array(
        'label' => __('Heading Color', 'adventure-resort'),
        'section' => 'adventure_resort_global_color_settings',
        'settings' => 'adventure_resort_heading_color',
    )));

    $wp_customize->add_setting('adventure_resort_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'adventure_resort_sanitize_choices',
    ));
    $wp_customize->add_control( 'adventure_resort_heading_font_family', array(
        'section' => 'adventure_resort_global_color_settings',
        'label'   => __('Heading Fonts', 'adventure-resort'),
        'type'    => 'select',
        'choices' => $adventure_resort_font_array,
    ));

    $wp_customize->add_setting('adventure_resort_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','adventure-resort'),
        'section' => 'adventure_resort_global_color_settings',
        'setting' => 'adventure_resort_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'adventure_resort_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_paragraph_color', array(
        'label' => __('Paragraph Color', 'adventure-resort'),
        'section' => 'adventure_resort_global_color_settings',
        'settings' => 'adventure_resort_paragraph_color',
    )));

    $wp_customize->add_setting('adventure_resort_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'adventure_resort_sanitize_choices',
    ));
    $wp_customize->add_control( 'adventure_resort_paragraph_font_family', array(
        'section' => 'adventure_resort_global_color_settings',
        'label'   => __('Paragraph Fonts', 'adventure-resort'),
        'type'    => 'select',
        'choices' => $adventure_resort_font_array,
    ));

    $wp_customize->add_setting('adventure_resort_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','adventure-resort'),
        'section' => 'adventure_resort_global_color_settings',
        'setting' => 'adventure_resort_paragraph_font_size',
        'type'  => 'text'
    ));

    // General Settings
     $wp_customize->add_section('adventure_resort_general_settings',array(
        'title' => esc_html__('General Settings','adventure-resort'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('adventure_resort_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_resort_sanitize_choices'
    ));
    $wp_customize->add_control('adventure_resort_width_option',array(
        'type' => 'select',
        'section' => 'adventure_resort_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','adventure-resort'),
            'Wide Width' => __('Wide Width','adventure-resort'),
            'Boxed Width' => __('Boxed Width','adventure-resort')
        ),
    ) );

    $wp_customize->add_setting('adventure_resort_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'adventure_resort_sanitize_choices'
    ));
    $wp_customize->add_control('adventure_resort_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','adventure-resort'),
            'Capitalize' => __('Capitalize','adventure-resort'),
            'Lowercase' => __('Lowercase','adventure-resort'),
        ),
        'section'=> 'adventure_resort_general_settings',
    ));

    $wp_customize->add_setting('adventure_resort_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'adventure-resort' ),
        'section'        => 'adventure_resort_general_settings',
        'settings'       => 'adventure_resort_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'adventure_resort_preloader_bg_color', array(
        'default' => '#FDD61F',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','adventure-resort'),
        'section' => 'adventure_resort_general_settings',
        'settings' => 'adventure_resort_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'adventure_resort_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','adventure-resort'),
        'section' => 'adventure_resort_general_settings',
        'settings' => 'adventure_resort_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'adventure_resort_preloader_dot_2_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_resort_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','adventure-resort'),
        'section' => 'adventure_resort_general_settings',
        'settings' => 'adventure_resort_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('adventure_resort_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'adventure-resort' ),
        'section'        => 'adventure_resort_general_settings',
        'settings'       => 'adventure_resort_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('adventure_resort_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'adventure_resort_sanitize_choices'
    ));
    $wp_customize->add_control('adventure_resort_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'adventure_resort_general_settings',
        'choices' => array(
            'Right' => __('Right','adventure-resort'),
            'Left' => __('Left','adventure-resort'),
            'Center' => __('Center','adventure-resort')
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'adventure_resort_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'adventure_resort_sanitize_select',
    ) );

    $wp_customize->add_control('adventure_resort_products_per_row', array(
       'label' => __( 'Product per row', 'adventure-resort' ),
       'section'  => 'adventure_resort_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

     // Social Link
    $wp_customize->add_section('adventure_resort_social_link',array(
        'title' => esc_html__('Social Links','adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_facebook_icon',array(
        'label' => esc_html__('Facebook Icon','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('adventure_resort_facebook_url',array(
        'label' => esc_html__('Facebook Link','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('adventure_resort_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_twitter_icon',array(
        'label' => esc_html__('Twitter Icon','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('adventure_resort_twitter_url',array(
        'label' => esc_html__('Twitter Link','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('adventure_resort_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_intagram_icon',array(
        'label' => esc_html__('Intagram Icon','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_intagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('adventure_resort_intagram_url',array(
        'label' => esc_html__('Intagram Link','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('adventure_resort_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_linkedin_icon',array(
        'label' => esc_html__('Linkedin Icon','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('adventure_resort_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('adventure_resort_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_pintrest_icon',array(
        'label' => esc_html__('Pinterest Icon','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_pintrest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('adventure_resort_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','adventure-resort'),
        'section' => 'adventure_resort_social_link',
        'setting' => 'adventure_resort_pintrest_url',
        'type'  => 'url'
    ));

    //Top Header
    $wp_customize->add_section('adventure_resort_top_header',array(
        'title' => esc_html__('Top Header Option','adventure-resort')
    ));

    $wp_customize->add_setting('adventure_resort_topbar_mail_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_topbar_mail_text',array(
        'label' => esc_html__('Mail Id','adventure-resort'),
        'section' => 'adventure_resort_top_header',
        'setting' => 'adventure_resort_topbar_mail_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('adventure_resort_topbar_location_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_topbar_location_text',array(
        'label' => esc_html__('Location','adventure-resort'),
        'section' => 'adventure_resort_top_header',
        'setting' => 'adventure_resort_topbar_location_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('adventure_resort_header_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_header_button_text',array(
        'label' => esc_html__('Header Button Text','adventure-resort'),
        'section' => 'adventure_resort_top_header',
        'setting' => 'adventure_resort_header_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('adventure_resort_header_button_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_header_button_url',array(
        'label' => esc_html__('Header Button Url','adventure-resort'),
        'section' => 'adventure_resort_top_header',
        'setting' => 'adventure_resort_header_button_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('adventure_resort_header_search_setting', array(
        'default' => true,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_header_search_setting',array(
        'label'          => __( 'Show Header Search Icon', 'adventure-resort' ),
        'section'        => 'adventure_resort_top_header',
        'settings'       => 'adventure_resort_header_search_setting',
        'type'           => 'checkbox',
    )));

    //Slider
    $wp_customize->add_section('adventure_resort_top_slider',array(
        'title' => esc_html__('Slider Settings','adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_slider_section_setting', array(
        'default' => true,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_slider_section_setting',array(
        'label'          => __( 'Show Header Slider', 'adventure-resort' ),
        'section'        => 'adventure_resort_top_slider',
        'settings'       => 'adventure_resort_slider_section_setting',
        'type'           => 'checkbox',
    )));

    for ( $adventure_resort_count = 1; $adventure_resort_count <= 3; $adventure_resort_count++ ) {

        $wp_customize->add_setting( 'adventure_resort_top_slider_page' . $adventure_resort_count, array(
            'default'           => '',
            'sanitize_callback' => 'adventure_resort_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'adventure_resort_top_slider_page' . $adventure_resort_count, array(
            'label'    => __( 'Select Slide Page', 'adventure-resort' ),
            'description' => __('Slider image size (1400 x 550)','adventure-resort'),
            'section'  => 'adventure_resort_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('adventure_resort_slider_short_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_slider_short_heading',array(
        'label' => esc_html__('Short Heading','adventure-resort'),
        'section' => 'adventure_resort_top_slider',
        'setting' => 'adventure_resort_slider_short_heading',
        'type'  => 'text'
    ));

    // Activities
    $wp_customize->add_section('adventure_resort_services_section',array(
        'title' => esc_html__('Activities Option','adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_activities_section_setting', array(
        'default' => true,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'adventure_resort_activities_section_setting',array(
        'label'          => __( 'Show Header Activities', 'adventure-resort' ),
        'section'        => 'adventure_resort_services_section',
        'settings'       => 'adventure_resort_activities_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('adventure_resort_services_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_services_heading',array(
        'label' => esc_html__('Short Heading','adventure-resort'),
        'section' => 'adventure_resort_services_section',
        'setting' => 'adventure_resort_services_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('adventure_resort_services_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_resort_services_content',array(
        'label' => esc_html__('Heading','adventure-resort'),
        'section' => 'adventure_resort_services_section',
        'setting' => 'adventure_resort_services_content',
        'type'  => 'text'
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('adventure_resort_services_sec_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_resort_sanitize_select',
    ));
    $wp_customize->add_control('adventure_resort_services_sec_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Activities','adventure-resort'),
        'section' => 'adventure_resort_services_section',
    ));

    for ($i=1; $i <=6; $i++) {
        $wp_customize->add_setting('adventure_resort_services_icon'.$i,array(
            'default' => 'fas fa-mountain',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('adventure_resort_services_icon'.$i,array(
            'label' => esc_html__('Activities Icon ','adventure-resort').$i,
            'section' => 'adventure_resort_services_section',
            'setting' => 'adventure_resort_services_icon'.$i,
            'type'  => 'text',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg: fas fa-mountain','adventure-resort')
        ));
    }

    // Post Settings
     $wp_customize->add_section('adventure_resort_post_settings',array(
        'title' => esc_html__('Post Settings','adventure-resort'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('adventure_resort_post_page_title',array(
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('adventure_resort_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'adventure-resort'),
        'section'     => 'adventure_resort_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_post_page_meta',array(
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('adventure_resort_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'adventure-resort'),
        'section'     => 'adventure_resort_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_post_page_thumb',array(
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('adventure_resort_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'adventure-resort'),
        'section'     => 'adventure_resort_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_post_page_content',array(
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('adventure_resort_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'adventure-resort'),
        'section'     => 'adventure_resort_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_single_post_page_content',array(
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('adventure_resort_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'adventure-resort'),
        'section'     => 'adventure_resort_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'adventure-resort'),
    ));
    
    // Footer
    $wp_customize->add_section('adventure_resort_site_footer_section', array(
        'title' => esc_html__('Footer', 'adventure-resort'),
    ));

    $wp_customize->add_setting('adventure_resort_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_resort_sanitize_choices'
    ));
    $wp_customize->add_control('adventure_resort_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','adventure-resort'),
        'section' => 'adventure_resort_site_footer_section',
        'choices' => array(
            'Left' => __('Left','adventure-resort'),
            'Center' => __('Center','adventure-resort'),
            'Right' => __('Right','adventure-resort')
        ),
    ) );

    $wp_customize->add_setting('adventure_resort_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'adventure_resort_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_resort_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','adventure-resort'),
        'section' => 'adventure_resort_site_footer_section',
    ));

    $wp_customize->add_setting('adventure_resort_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('adventure_resort_footer_text_setting', array(
        'label' => __('Replace the footer text', 'adventure-resort'),
        'section' => 'adventure_resort_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('adventure_resort_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_resort_sanitize_choices'
    ));
    $wp_customize->add_control('adventure_resort_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','adventure-resort'),
        'section' => 'adventure_resort_site_footer_section',
        'choices' => array(
            'Left' => __('Left','adventure-resort'),
            'Center' => __('Center','adventure-resort'),
            'Right' => __('Right','adventure-resort')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Adventure_Resort_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Adventure_Resort_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'adventure_resort_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'adventure-resort' ),
        'description' => esc_url( ADVENTURE_RESORT_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'adventure_resort_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function adventure_resort_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function adventure_resort_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function adventure_resort_customize_preview_js(){
    wp_enqueue_script('adventure-resort-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'adventure_resort_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function adventure_resort_panels_js() {
    wp_enqueue_style( 'adventure-resort-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'adventure-resort-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'adventure_resort_panels_js' );