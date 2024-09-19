<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
<?php if (get_theme_mod('adventure_resort_slider_section_setting', true) != '') { ?>
  <section id="top-slider">
    <?php $adventure_resort_slide_pages = array();
      for ( $adventure_resort_count = 1; $adventure_resort_count <= 3; $adventure_resort_count++ ) {
        $adventure_resort_mod = intval( get_theme_mod( 'adventure_resort_top_slider_page' . $adventure_resort_count ));
        if ( 'page-none-selected' != $adventure_resort_mod ) {
          $adventure_resort_slide_pages[] = $adventure_resort_mod;
        }
      }
      if( !empty($adventure_resort_slide_pages) ) :
        $adventure_resort_args = array(
          'post_type' => 'page',
          'post__in' => $adventure_resort_slide_pages,
          'orderby' => 'post__in'
        );
        $adventure_resort_query = new WP_Query( $adventure_resort_args );
        if ( $adventure_resort_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $adventure_resort_query->have_posts() ) : $adventure_resort_query->the_post(); ?>
        <div class="slide-box">
          <div class="slider-image">
            <?php if(has_post_thumbnail()){
              the_post_thumbnail();
              } else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
            <?php } ?>
          </div>
          <div class="slider-inner-box">
            <?php if(get_theme_mod('adventure_resort_slider_short_heading') != ''){ ?>
              <h5 class="main-heading mb-4"><?php echo esc_html(get_theme_mod('adventure_resort_slider_short_heading')); ?></h5>
            <?php }?>
            <h3 class="m-0 mb-4 pb-3"><?php the_title(); ?></h3>
            <div class="slide-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Discover More','adventure-resort'); ?></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>
<?php }?>

<?php if (get_theme_mod('adventure_resort_activities_section_setting', true) != '') { ?>
  <section class="featured py-5">
    <div class="container ">
      <div class="heading text-center mb-4">
        <?php if(get_theme_mod('adventure_resort_services_heading') != ''){ ?>
          <h4 class="main-heading mb-3"><?php echo esc_html(get_theme_mod('adventure_resort_services_heading')); ?></h4>
        <?php }?>
        <?php if(get_theme_mod('adventure_resort_services_content') != ''){ ?>
          <h3 class="main-heading"><?php echo esc_html(get_theme_mod('adventure_resort_services_content')); ?></h3>
        <?php }?>
      </div>
      <div class="row m-0 ser-box">
        <?php
          $adventure_resort_services_cat = get_theme_mod('adventure_resort_services_sec_category','');
          if($adventure_resort_services_cat){
            $adventure_resort_page_query5 = new WP_Query(array( 'category_name' => esc_html($adventure_resort_services_cat,'adventure-resort'),'posts_per_page' => 6));
            $i=1;
            while( $adventure_resort_page_query5->have_posts() ) : $adventure_resort_page_query5->the_post(); ?>
              <?php if(get_theme_mod('adventure_resort_services_icon'.$i,'fas fa-stethoscope')){ ?>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0 service-box">
                  <div class="feature-box m-0">
                    <div class="ser-content">
                      <div class="service-icon">
                        <i class="<?php echo esc_attr(get_theme_mod('adventure_resort_services_icon'.$i,'fas fa-campground')); ?> mb-1"></i>
                      </div>
                      <h4 class="my-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </div>
                  </div>
                </div>
              <?php }?>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>
<?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>