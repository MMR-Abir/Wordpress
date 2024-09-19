<?php
//about theme info
add_action( 'admin_menu', 'skt_trekking_abouttheme' );
function skt_trekking_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-trekking'), esc_html__('About Theme', 'skt-trekking'), 'edit_theme_options', 'skt_trekking_guide', 'skt_trekking_mostrar_guide');   
} 
//guidline for about theme
function skt_trekking_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-trekking'); ?>
		   </div>
          <p><?php esc_html_e('SKT Trekking is an adventure camp thrilling exciting sports adrenaline rush activities summer camping for kids mountaineering and other activities like travel, jungle safari, destination, holiday, tourism, tours, backpacking, camping, climbing, fishing, hiking, nature, outdoor, running, surfing, rafting, cruise, trip, itineraries, hunting, railing, skating, skiing, water games. Tour hotel restaurant operators food drink and bed and breakfast motels airlines vacation portals travel agents can also operate this kind of business to attract more tourists. SEO friendly, easy to use, flexible and scalable. WooCommerce plug and play for shop. Compatible with contact form for call to action. Booking plugins can also be integrated easily.','skt-trekking'); ?></p>
          <a href="<?php echo esc_url(SKT_TREKKING_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_TREKKING_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-trekking'); ?></a> | 
				<a href="<?php echo esc_url(SKT_TREKKING_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-trekking'); ?></a> | 
				<a href="<?php echo esc_url(SKT_TREKKING_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-trekking'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_TREKKING_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>