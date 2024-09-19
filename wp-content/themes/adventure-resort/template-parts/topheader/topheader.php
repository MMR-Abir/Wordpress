<?php
/**
 * Displays top header
 *
 * @package Adventure Resort
 */
?>

<div class="top-info text-end">
	<div class="container">
		<div class="row top-header">
			<div class="col-xl-6 col-lg-5 col-md-4 col-sm-4 align-self-center">
				<div class="social-link">
			    	<?php if(get_theme_mod('adventure_resort_facebook_url') != ''){ ?>
			        	<a href="<?php echo esc_url(get_theme_mod('adventure_resort_facebook_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('adventure_resort_facebook_icon') ); ?>"></i></a>
			      	<?php }?>
			      	<?php if(get_theme_mod('adventure_resort_twitter_url') != ''){ ?>
			        	<a href="<?php echo esc_url(get_theme_mod('adventure_resort_twitter_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('adventure_resort_twitter_icon') ); ?>"></i></a>
			     	<?php }?>
			      	<?php if(get_theme_mod('adventure_resort_intagram_url') != ''){ ?>
			        	<a href="<?php echo esc_url(get_theme_mod('adventure_resort_intagram_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('adventure_resort_intagram_icon') ); ?>"></i></a>
			      	<?php }?>
			      	<?php if(get_theme_mod('adventure_resort_linkedin_url') != ''){ ?>
			        	<a href="<?php echo esc_url(get_theme_mod('adventure_resort_linkedin_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('adventure_resort_linkedin_icon') ); ?>"></i></a>
			      	<?php }?>
			      	<?php if(get_theme_mod('adventure_resort_pintrest_url') != ''){ ?>
			        	<a href="<?php echo esc_url(get_theme_mod('adventure_resort_pintrest_url','')); ?>"><i class="<?php echo esc_attr( get_theme_mod('adventure_resort_pintrest_icon') ); ?>"></i></a>
			      	<?php }?>
			    </div>
			</div>
			<div class="col-xl-6 col-lg-7 col-md-8 col-sm-8 align-self-center">
				<div class="row ">
					<div class="col-lg-6 col-md-7 col-sm-6 align-self-center">
						<?php if ( get_theme_mod('adventure_resort_topbar_mail_text') != "" ) {?>
					        <div class="text-center text-lg-end text-md-end py-2">
					            <p class="location m-0"><i class="fas fa-envelope me-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('adventure_resort_topbar_mail_text')); ?>"><?php echo esc_html(get_theme_mod('adventure_resort_topbar_mail_text')); ?></a></p>  
					        </div>
				        <?php }?>
					</div>
					<div class="col-lg-6 col-md-5 col-sm-6 align-self-center">
						<?php if ( get_theme_mod('adventure_resort_topbar_location_text') != "" ) {?>
					        <div class="text-center text-lg-end text-md-end py-2">
					            <p class="location m-0"><i class="fas fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('adventure_resort_topbar_location_text')); ?></p>  
					        </div>
				        <?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>