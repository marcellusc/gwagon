<?php
/**
 * Template part for displaying feature car section
 *
 * @package Auto Dealer Lite
 * @subpackage auto_dealer_lite
 */
?>

<section id="featured-car" class="py-5 text-center text-md-left">
  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-8 col-md-8 align-self-center">
        <?php if( get_theme_mod('auto_dealer_lite_featured_car_section_short_title') != ''){ ?>
          <h6><?php echo esc_html(get_theme_mod('auto_dealer_lite_featured_car_section_short_title','')); ?></h6>
        <?php }?>
        <?php if( get_theme_mod('auto_dealer_lite_featured_car_section_tittle') != ''){ ?>
          <h2><?php echo esc_html(get_theme_mod('auto_dealer_lite_featured_car_section_tittle','')); ?></h2>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="car-button text-center text-md-right my-3 my-md-0">
          <?php if( get_theme_mod('auto_dealer_lite_featured_car_button_text') != '' || get_theme_mod('auto_dealer_lite_featured_car_button_link') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('auto_dealer_lite_featured_car_button_link','')); ?>" class="my-3"><i class="fas fa-angle-right mr-4"></i><?php echo esc_html(get_theme_mod('auto_dealer_lite_featured_car_button_text','')); ?></a>
          <?php }?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php 
        $post_category = get_theme_mod('auto_dealer_lite_featured_car_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'auto-dealer-lite')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-6 col-md-6">
              <div class="cat-inner-box mb-3 p-3">
                <h3><?php the_title(); ?></h3>
                <?php if( get_post_meta($post->ID, 'auto_dealer_lite_compare_price', true) ) {?>
                  <h4 class="my-3"><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_compare_price',true)); ?></h4>
                <?php }?>
                <div class="row">
                  <div class="col-lg-8 col-md-7 align-self-center">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                  </div>
                  <div class="col-lg-4 col-md-5 align-self-center">
                    <div class="featured-car-box">
                      <?php if( get_post_meta($post->ID, 'auto_dealer_lite_body_type', true) ) {?>
                        <p><i class="fas fa-car mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_body_type',true)); ?></p>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'auto_dealer_lite_model_year', true) ) {?>
                        <p><i class="fas fa-calendar-alt mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_model_year',true)); ?></p>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'auto_dealer_lite_engine_type', true) ) {?>
                        <p><i class="fas fa-power-off mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_engine_type',true)); ?></p>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'auto_dealer_lite_car_color', true) ) {?>
                        <p><i class="fas fa-tint mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_car_color',true)); ?></p>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'auto_dealer_lite_mileage', true) ) {?>
                        <p><i class="fas fa-road mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'auto_dealer_lite_mileage',true)); ?></p>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</section> 