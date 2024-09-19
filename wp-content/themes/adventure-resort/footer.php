<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adventure Resort
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
	      	<div class="row">
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		          	<?php if (is_active_sidebar('adventure-resort-footer1')) : ?>
                        <?php dynamic_sidebar('adventure-resort-footer1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'adventure-resort' ); ?></h5>
                            <div class="textwidget">
                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'adventure-resort' ); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('adventure-resort-footer2')) : ?>
                        <?php dynamic_sidebar('adventure-resort-footer2'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'adventure-resort' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Home', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'Tournaments', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'Reviews', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'About Us', 'adventure-resort' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('adventure-resort-footer3')) : ?>
                        <?php dynamic_sidebar('adventure-resort-footer3'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'adventure-resort' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'FAQ', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'Site Maps', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'Privacy Policy', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'Contact Us', 'adventure-resort' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('adventure-resort-footer4')) : ?>
                        <?php dynamic_sidebar('adventure-resort-footer4'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'adventure-resort' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'adventure-resort' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( '+11 6254 7855', 'adventure-resort' ); ?></li>
                            	<li><?php esc_html_e( 'support@example.com', 'adventure-resort' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('adventure_resort_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('adventure_resort_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'adventure-resort' ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'adventure-resort' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					    <span>
			          	 	<a target="_blank" href="<?php echo esc_url( 'https://themagnifico.net/products/free-adventure-wordpress-theme'); ?>">
				              	<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'adventure-resort' ),'Resort WordPress Theme' );
				              	?>
			          		</a>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'adventure-resort' ),'TheMagnifico'  );
				            ?>
	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('adventure_resort_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('adventure_resort_scroll_hide','')){ ?>
	    	<a id="button"><?php esc_html_e('TOP','adventure-resort'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>