<?php
/**
 * Displays main header
 *
 * @package Adventure Resort
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $adventure_resort_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $adventure_resort_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('adventure_resort_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('adventure_resort_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $adventure_resort_description = get_bloginfo( 'description', 'display' );
                            if ( $adventure_resort_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('adventure_resort_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($adventure_resort_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-2 col-sm-2 col-6 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-xl-1 col-lg-1 col-md-2 col-sm-2 col-6 align-self-center header-right-box">
                <?php if (get_theme_mod('adventure_resort_header_search_setting', true) != '') { ?>
                    <span class="head-search">
                        <span class="header-search-wrapper">
                            <span class="search-main">
                                <i class="fa fa-search"></i>
                            </span>
                            <div class="search-form-main clearfix">
                                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="hidden" name="post_type" value="product"> <!-- Set post type to product for WooCommerce products -->
                                    <label>
                                        <input type="search" class="search-field form-control" placeholder="Search for products..." value="<?php echo get_search_query(); ?>" name="s">
                                    </label>
                                    <input type="submit" class="search-submit btn btn-primary mt-3" value="Search">
                                </form>
                            </div>
                        </span>
                    </span>
                <?php } ?>
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','adventure-resort' ); ?>"><i class="fas fa-shopping-cart"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
                    <?php }?>
                </span>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 align-self-center text-lg-end text-md-end button-header">
                <?php if( get_theme_mod('adventure_resort_header_button_url') !='' || get_theme_mod('adventure_resort_header_button_text') !='') {?>
                    <a href="<?php echo esc_url(get_theme_mod('adventure_resort_header_button_url')); ?>"><?php echo esc_html(get_theme_mod('adventure_resort_header_button_text')); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
