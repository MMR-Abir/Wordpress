<?php

    $adventure_resort_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $adventure_resort_scroll_position = get_theme_mod( 'adventure_resort_scroll_top_position','Right');
    if($adventure_resort_scroll_position == 'Right'){
        $adventure_resort_theme_css .='#button{';
            $adventure_resort_theme_css .='right: 20px;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_scroll_position == 'Left'){
        $adventure_resort_theme_css .='#button{';
            $adventure_resort_theme_css .='left: 20px;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_scroll_position == 'Center'){
        $adventure_resort_theme_css .='#button{';
            $adventure_resort_theme_css .='right: 50%;left: 50%;';
        $adventure_resort_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $adventure_resort_footer_widget_heading_alignment = get_theme_mod( 'adventure_resort_footer_widget_heading_alignment','Left');
    if($adventure_resort_footer_widget_heading_alignment == 'Left'){
        $adventure_resort_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $adventure_resort_theme_css .='text-align: left;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_footer_widget_heading_alignment == 'Center'){
        $adventure_resort_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $adventure_resort_theme_css .='text-align: center;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_footer_widget_heading_alignment == 'Right'){
        $adventure_resort_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $adventure_resort_theme_css .='text-align: right;';
        $adventure_resort_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $adventure_resort_footer_widget_content_alignment = get_theme_mod( 'adventure_resort_footer_widget_content_alignment','Left');
    if($adventure_resort_footer_widget_content_alignment == 'Left'){
        $adventure_resort_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $adventure_resort_theme_css .='text-align: left;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_footer_widget_content_alignment == 'Center'){
        $adventure_resort_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $adventure_resort_theme_css .='text-align: center;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_footer_widget_content_alignment == 'Right'){
        $adventure_resort_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $adventure_resort_theme_css .='text-align: right;';
        $adventure_resort_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $adventure_resort_copyright_content_alignment = get_theme_mod( 'adventure_resort_copyright_content_alignment','Center');
    if($adventure_resort_copyright_content_alignment == 'Left'){
        $adventure_resort_theme_css .='.footer-menu-left{';
        $adventure_resort_theme_css .='text-align: left !important;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_copyright_content_alignment == 'Center'){
        $adventure_resort_theme_css .='.footer-menu-left{';
            $adventure_resort_theme_css .='text-align: center !important;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_copyright_content_alignment == 'Right'){
        $adventure_resort_theme_css .='.footer-menu-left{';
            $adventure_resort_theme_css .='text-align: right !important;';
        $adventure_resort_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $adventure_resort_width_option = get_theme_mod( 'adventure_resort_width_option','Full Width');
    if($adventure_resort_width_option == 'Boxed Width'){
        $adventure_resort_theme_css .='body{';
            $adventure_resort_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $adventure_resort_theme_css .='}';
        $adventure_resort_theme_css .='.scrollup i{';
            $adventure_resort_theme_css .='right: 100px;';
        $adventure_resort_theme_css .='}';
        $adventure_resort_theme_css .='.page-template-custom-home-page .home-page-header{';
            $adventure_resort_theme_css .='padding: 0px 40px 0 10px;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_width_option == 'Wide Width'){
        $adventure_resort_theme_css .='body{';
            $adventure_resort_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $adventure_resort_theme_css .='}';
        $adventure_resort_theme_css .='.scrollup i{';
            $adventure_resort_theme_css .='right: 30px;';
        $adventure_resort_theme_css .='}';
    }else if($adventure_resort_width_option == 'Full Width'){
        $adventure_resort_theme_css .='body{';
            $adventure_resort_theme_css .='max-width: 100%;';
        $adventure_resort_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $adventure_resort_nav_menu = get_theme_mod( 'adventure_resort_nav_menu_text_transform','Uppercase');
    if($adventure_resort_nav_menu == 'Capitalize'){
        $adventure_resort_theme_css .='.main-navigation .menu > li > a{';
            $adventure_resort_theme_css .='text-transform:Capitalize;';
        $adventure_resort_theme_css .='}';
    }
    if($adventure_resort_nav_menu == 'Lowercase'){
        $adventure_resort_theme_css .='.main-navigation .menu > li > a{';
            $adventure_resort_theme_css .='text-transform:Lowercase;';
        $adventure_resort_theme_css .='}';
    }
    if($adventure_resort_nav_menu == 'Uppercase'){
        $adventure_resort_theme_css .='.main-navigation .menu > li > a{';
            $adventure_resort_theme_css .='text-transform:Uppercase;';
        $adventure_resort_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $adventure_resort_global_color = get_theme_mod('adventure_resort_global_color');

    if($adventure_resort_global_color != false){
        $adventure_resort_theme_css .='#button, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt,.woocommerce a.added_to_cart, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, #colophon, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover, .main-navigation ul.sub-menu > li > a:hover, .main-navigation ul.sub-menu > li > a:focus{';
            $adventure_resort_theme_css .='background-color: '.esc_attr($adventure_resort_global_color).';';
        $adventure_resort_theme_css .='}';
    }

    if($adventure_resort_global_color != false){
        $adventure_resort_theme_css .='.top-info .social-link a i:hover, .top-info p.location i, .navbar-brand a span.last_slide_head, .service-icon i, section.featured span.last_slide_head, #site-navigation .menu ul li a:hover, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $adventure_resort_theme_css .='color: '.esc_attr($adventure_resort_global_color).';';
        $adventure_resort_theme_css .='}';
    }

    if($adventure_resort_global_color != false){
        $adventure_resort_theme_css .='.postcat-name{';
            $adventure_resort_theme_css .='color: '.esc_attr($adventure_resort_global_color).' !important;';
        $adventure_resort_theme_css .='}';
    }

    if($adventure_resort_global_color != false){
        $adventure_resort_theme_css .='.button-header a, #top-slider .slide-btn a, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $adventure_resort_theme_css .='border-color: '.esc_attr($adventure_resort_global_color).';';
        $adventure_resort_theme_css .='}';
    }

    if($adventure_resort_global_color != false){
        $adventure_resort_theme_css .='.woocommerce-message, .woocommerce-info{';
            $adventure_resort_theme_css .='border-top-color: '.esc_attr($adventure_resort_global_color).';';
        $adventure_resort_theme_css .='}';
    }

    $adventure_resort_theme_css .='@media screen and (max-width:1000px) {';
        if($adventure_resort_global_color != false){
            $adventure_resort_theme_css .='.toggle-nav i, .sidenav .closebtn{
            background: '.esc_attr($adventure_resort_global_color).';
            }';
        }
    $adventure_resort_theme_css .='}';

    /*-------------------- Heading typography -------------------*/

    $adventure_resort_heading_color = get_theme_mod('adventure_resort_heading_color');
    $adventure_resort_heading_font_family = get_theme_mod('adventure_resort_heading_font_family');
    $adventure_resort_heading_font_size = get_theme_mod('adventure_resort_heading_font_size');
    if($adventure_resort_heading_color != false || $adventure_resort_heading_font_family != false || $adventure_resort_heading_font_size != false){
        $adventure_resort_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #top-slider .slider-inner-box h3, .featured h3.main-heading, .article-box h3.entry-title, .featured h4.main-heading, .ser-content h4 a, #colophon h5, .sidebar h5{';
            $adventure_resort_theme_css .='color: '.esc_attr($adventure_resort_heading_color).'!important; 
            font-family: '.esc_attr($adventure_resort_heading_font_family).'!important;
            font-size: '.esc_attr($adventure_resort_heading_font_size).'px !important;';
        $adventure_resort_theme_css .='}';
    }

    $adventure_resort_paragraph_color = get_theme_mod('adventure_resort_paragraph_color');
    $adventure_resort_paragraph_font_family = get_theme_mod('adventure_resort_paragraph_font_family');
    $adventure_resort_paragraph_font_size = get_theme_mod('adventure_resort_paragraph_font_size');
    if($adventure_resort_paragraph_color != false || $adventure_resort_paragraph_font_family != false || $adventure_resort_paragraph_font_size != false){
        $adventure_resort_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $adventure_resort_theme_css .='color: '.esc_attr($adventure_resort_paragraph_color).'!important; 
            font-family: '.esc_attr($adventure_resort_paragraph_font_family).'!important;
            font-size: '.esc_attr($adventure_resort_paragraph_font_size).'px !important;';
        $adventure_resort_theme_css .='}';
    }