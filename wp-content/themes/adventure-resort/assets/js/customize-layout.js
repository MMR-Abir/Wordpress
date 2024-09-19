(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-adventure_resort_options-';
		
		// Label
		function adventure_resort_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'adventure_resort_global_color' || id === 'adventure_resort_heading_color' || id === 'adventure_resort_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'adventure_resort_scroll_hide' || id === 'adventure_resort_preloader_hide' || id === 'adventure_resort_sticky_header' || id === 'adventure_resort_products_per_row' || id === 'adventure_resort_scroll_top_position' || id === 'adventure_resort_products_per_row' || id === 'adventure_resort_width_option' || id === 'adventure_resort_nav_menu_text_transform')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'adventure_resort_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'adventure_resort_facebook_icon' || id === 'adventure_resort_twitter_icon' || id === 'adventure_resort_intagram_icon'|| id === 'adventure_resort_linkedin_icon'|| id === 'adventure_resort_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'adventure_resort_topbar_location_text' || id === 'adventure_resort_topbar_mail_text' || id === 'adventure_resort_header_button_text' || id === 'adventure_resort_header_search_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'adventure_resort_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Activities

			if ( id === 'adventure_resort_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'adventure_resort_footer_widget_content_alignment' || id === 'adventure_resort_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'adventure_resort_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'adventure_resort_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-adventure_resort_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		adventure_resort_customizer_label( 'custom_logo', 'Logo Setup' );
		adventure_resort_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		adventure_resort_customizer_label( 'adventure_resort_global_color', 'Global Color' );
		adventure_resort_customizer_label( 'adventure_resort_heading_color', 'Heading Typography' );
		adventure_resort_customizer_label( 'adventure_resort_paragraph_color', 'Paragraph Typography' );

		// General Setting
		adventure_resort_customizer_label( 'adventure_resort_preloader_hide', 'Preloader' );
		adventure_resort_customizer_label( 'adventure_resort_scroll_hide', 'Scroll To Top' );
		adventure_resort_customizer_label( 'adventure_resort_scroll_top_position', 'Scroll to top Position' );
		adventure_resort_customizer_label( 'adventure_resort_products_per_row', 'woocommerce Setting' );
		adventure_resort_customizer_label( 'adventure_resort_width_option', 'Site Width Layouts' );
		adventure_resort_customizer_label( 'adventure_resort_nav_menu_text_transform', 'Nav Menus Text Transform' );

		// Colors
		adventure_resort_customizer_label( 'adventure_resort_theme_color', 'Theme Color' );
		adventure_resort_customizer_label( 'background_color', 'Colors' );
		adventure_resort_customizer_label( 'background_image', 'Image' );

		//Header Image
		adventure_resort_customizer_label( 'header_image', 'Header Image' );

		// Social Icon
		adventure_resort_customizer_label( 'adventure_resort_facebook_icon', 'Facebook' );
		adventure_resort_customizer_label( 'adventure_resort_twitter_icon', 'Twitter' );
		adventure_resort_customizer_label( 'adventure_resort_intagram_icon', 'Intagram' );
		adventure_resort_customizer_label( 'adventure_resort_linkedin_icon', 'Linkedin' );
		adventure_resort_customizer_label( 'adventure_resort_pintrest_icon', 'Pintrest' );

		// Header
		adventure_resort_customizer_label( 'adventure_resort_topbar_location_text', 'Location' );
		adventure_resort_customizer_label( 'adventure_resort_topbar_mail_text', 'Email Address' );
		adventure_resort_customizer_label( 'adventure_resort_header_button_text', 'Header Button' );
		adventure_resort_customizer_label( 'adventure_resort_header_search_setting', 'Search' );

		//Slider
		adventure_resort_customizer_label( 'adventure_resort_slider_section_setting', 'Slider' );

		//Activities
		adventure_resort_customizer_label( 'adventure_resort_activities_section_setting', 'Activities' );

		//Footer
		adventure_resort_customizer_label( 'adventure_resort_footer_widget_content_alignment', 'Footer' );
		adventure_resort_customizer_label( 'adventure_resort_show_hide_copyright', 'Copyright' );

		//Post setting
		adventure_resort_customizer_label( 'adventure_resort_post_page_title', 'Post Settings' );

		//Single post setting
		adventure_resort_customizer_label( 'adventure_resort_single_post_page_content', 'Single Post Settings' );
	

	});

})( jQuery );
