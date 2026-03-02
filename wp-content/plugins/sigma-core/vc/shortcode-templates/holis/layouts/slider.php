<?php
/**
 * Holis shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_holis' ][ 'atts' ];
$the_query   = $sigma_shortcodes[ 'sigma_holis' ][ 'the_query' ];
$slick_options = array(
    'autoplay'       => isset( $atts[ 'post_enable_slider_autoplay' ] ) ? (boolean) $atts[ 'post_enable_slider_autoplay' ] : false,
    'infinite'      => isset( $atts[ 'post_enable_slider_loop' ] ) ? (boolean) $atts[ 'post_enable_slider_loop' ] : false,
    'arrows'     =>		isset( $atts[ 'post_enable_arrow' ] ) ? (boolean) $atts[ 'post_enable_arrow' ] : false,
    'speed'     =>		isset( $atts[ 'post_slider_speed' ] ) ? (int) $atts[ 'post_slider_speed' ] : 500,
    'centerMode'     =>		isset( $atts[ 'post_enable_slider_centermode' ] ) ? (boolean) $atts[ 'post_enable_slider_centermode' ] : false,
    'centerPadding'     =>		isset( $atts[ 'post_slider_centerpadding' ] ) ?  $atts[ 'post_slider_centerpadding' ] : '',
    'autoplaySpeed'     =>		isset( $atts[ 'post_slider_autoplayspeed' ] ) ? (int) $atts[ 'post_slider_autoplayspeed' ] : '',
    'dots'        => isset( $atts[ 'post_enable_navigation' ] ) ? (boolean) $atts[ 'post_enable_navigation' ] : false,
    'slidesToShow'       =>  isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 4,
    'slidesToScroll' => isset( $atts[ 'post_slider_scroll' ] ) ? (int) $atts[ 'post_slider_scroll' ] : 1,
    'responsive' => array(
        array(
            'breakpoint' => 1800,
            'settings'  => array(
                'slidesToShow' => isset( $atts[ 'post_slider_responsive_xl' ] ) ? (int) $atts[ 'post_slider_responsive_xl' ] : 4,
                'centerPadding'     =>	isset( $atts[ 'post_slider_centerpadding_xl' ] ) ?  $atts[ 'post_slider_centerpadding_xl' ] : '',
            ),
        ),
        array(
            'breakpoint' => 1400,
            'settings'  => array(
                'slidesToShow' => isset( $atts[ 'post_slider_responsive_lg' ] ) ? (int) $atts[ 'post_slider_responsive_lg' ] : 3,
                'centerPadding'     =>	isset( $atts[ 'post_slider_centerpadding_lg' ] ) ?  $atts[ 'post_slider_centerpadding_lg' ] : '',
            ),
        ),
        array(
            'breakpoint' => 992,
            'settings'  => array(
                'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_md' ] ) ? (int) $atts[ 'post_slider_responsive_md' ] : 2,
                'centerPadding'     =>	isset( $atts[ 'post_slider_centerpadding_md' ] ) ?  $atts[ 'post_slider_centerpadding_md' ] : '',
            ),
        ),
        array(
            'breakpoint' => 768,
            'settings'  => array(
                'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_sm' ] ) ? (int) $atts[ 'post_slider_responsive_sm' ] : 2,
                'centerPadding'     =>	isset( $atts[ 'post_slider_centerpadding_sm' ] ) ?  $atts[ 'post_slider_centerpadding_sm' ] : '',
            ),
        ),
        array(
            'breakpoint' => 576,
            'settings'  => array(
                'slidesToShow' =>  isset( $atts[ 'post_slider_responsive_xs' ] ) ? (int) $atts[ 'post_slider_responsive_xs' ] : 1,
                'centerPadding'     =>	isset( $atts[ 'post_slider_centerpadding_xs' ] ) ? $atts[ 'post_slider_centerpadding_xs' ] : '',
            ),
        ),
    )
);
?>
<div class="slick-slider shortcode_slider" data-slick="<?php echo esc_attr( json_encode( $slick_options ) ); ?>">
    <?php
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        sigmacore_get_vc_shortcode_template( 'holis/styles/' . $atts[ 'style' ] );
    }
    /* Reset Post Data */
    wp_reset_postdata();
    ?>
</div>
