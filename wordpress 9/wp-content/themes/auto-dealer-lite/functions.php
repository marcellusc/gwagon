<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'auto_dealer_lite_after_setup_theme' );
function auto_dealer_lite_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'auto-dealer-lite-featured-image', 2000, 1200, true );
    add_image_size( 'auto-dealer-lite-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function auto_dealer_lite_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'auto-dealer-lite' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'auto-dealer-lite' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'auto-dealer-lite' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'auto-dealer-lite' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'auto-dealer-lite' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'auto-dealer-lite' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'auto-dealer-lite' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'auto-dealer-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'auto_dealer_lite_widgets_init' );

// enqueue styles for child theme
function auto_dealer_lite_enqueue_styles() {

    wp_enqueue_style( 'auto-dealer-lite-fonts', automobile_hub_fonts_url(), array(), null );

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'auto-dealer-lite-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'auto-dealer-lite-child-style' ), '1.0' );
    
    // enqueue parent styles
    wp_enqueue_style('automobile-hub-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('auto-dealer-lite-child-style', get_stylesheet_directory_uri() .'/style.css', array('automobile-hub-style'));

    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'auto-dealer-lite-child-style',$automobile_hub_tp_theme_css );
    
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'auto_dealer_lite_enqueue_styles');

function auto_dealer_lite_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'auto-dealer-lite-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'auto_dealer_lite_admin_scripts' );

define('AUTO_DEALER_LITE_CREDIT',__('https://www.themespride.com/themes/free-auto-dealer-wordpress-theme/','auto-dealer-lite') );
if ( ! function_exists( 'auto_dealer_lite_credit' ) ) {
    function auto_dealer_lite_credit(){
        echo "<a href=".esc_url(AUTO_DEALER_LITE_CREDIT)." target='_blank'>".esc_html__('Auto Dealer WordPress Theme','auto-dealer-lite')."</a>";
    }
}

function auto_dealer_lite_header_style() {
    if ( get_header_image() ) :
    $custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'auto-dealer-lite-child-style', $custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'auto_dealer_lite_header_style' );

// Featured Cars Meta
function auto_dealer_lite_bn_custom_meta_featured() {
    add_meta_box( 'bn_meta', __( 'Car Feature Meta Feilds', 'auto-dealer-lite' ), 'auto_dealer_lite_meta_callback_featured_car', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'auto_dealer_lite_bn_custom_meta_featured');
}

function auto_dealer_lite_meta_callback_featured_car( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'auto_dealer_lite_featured_car_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $compare_price = get_post_meta( $post->ID, 'auto_dealer_lite_compare_price', true );
    $body_type = get_post_meta( $post->ID, 'auto_dealer_lite_body_type', true );
    $model_year = get_post_meta( $post->ID, 'auto_dealer_lite_model_year', true );
    $engine_type  = get_post_meta( $post->ID, 'auto_dealer_lite_engine_type', true );
    $car_color = get_post_meta( $post->ID, 'auto_dealer_lite_car_color', true );
    $mileage = get_post_meta( $post->ID, 'auto_dealer_lite_mileage', true );
    ?>
    <div id="custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Compare Price', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_compare_price" id="auto_dealer_lite_compare_price" value="<?php echo esc_attr($compare_price); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Body-Type', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_body_type" id="auto_dealer_lite_body_type" value="<?php echo esc_attr($body_type); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Model-Year', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_model_year" id="auto_dealer_lite_model_year" value="<?php echo esc_attr($model_year); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Engine-Type', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_engine_type" id="auto_dealer_lite_engine_type" value="<?php echo esc_attr($engine_type); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Color', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_car_color" id="auto_dealer_lite_car_color" value="<?php echo esc_attr($car_color); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Car Mileage', 'auto-dealer-lite' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="auto_dealer_lite_mileage" id="auto_dealer_lite_mileage" value="<?php echo esc_attr($mileage); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function auto_dealer_lite_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['auto_dealer_lite_featured_car_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['auto_dealer_lite_featured_car_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Compare Price
    if( isset( $_POST[ 'auto_dealer_lite_compare_price' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_compare_price', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_compare_price' ]) ) );
    }
    // Save Car Body-Type
    if( isset( $_POST[ 'auto_dealer_lite_body_type' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_body_type', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_body_type' ]) ) );
    }
    // Save Car Model-Year
    if( isset( $_POST[ 'auto_dealer_lite_model_year' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_model_year', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_model_year' ]) ) );
    }
    // Save Car Engine-Type
    if( isset( $_POST[ 'auto_dealer_lite_engine_type' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_engine_type', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_engine_type' ]) ) );
    }
    // Save Car Color
    if( isset( $_POST[ 'auto_dealer_lite_car_color' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_car_color', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_car_color' ]) ) );
    }
    // Save Car Mileage
    if( isset( $_POST[ 'auto_dealer_lite_mileage' ] ) ) {
        update_post_meta( $post_id, 'auto_dealer_lite_mileage', strip_tags( wp_unslash( $_POST[ 'auto_dealer_lite_mileage' ]) ) );
    }
}
add_action( 'save_post', 'auto_dealer_lite_bn_metadesig_save' );


if ( ! defined( 'AUTOMOBILE_HUB_FREE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_FREE_THEME_URL', 'https://www.themespride.com/themes/free-auto-dealer-wordpress-theme/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_RATE_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_RATE_THEME_URL', 'https://wordpress.org/support/theme/auto-dealer-lite/reviews/#new-post' );
}
if ( ! defined( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/auto-dealer-lite/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/auto-dealer-lite/'));
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_PRO_THEME_URL', 'https://www.themespride.com/themes/auto-dealer-wordpress-theme/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DEMO_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DEMO_THEME_URL', 'https://www.themespride.com/auto-dealer-pro/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_DOCS_THEME_URL' ) ) {
    define( 'AUTOMOBILE_HUB_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/auto-dealer-lite/' );
}
if ( ! defined( 'AUTOMOBILE_HUB_PRO_THEME_NAME' ) ) {
    define( 'AUTOMOBILE_HUB_PRO_THEME_NAME', esc_html__( 'Auto Dealer Pro Theme', 'auto-dealer-lite' ));
}