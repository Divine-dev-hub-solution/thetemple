<?php
/**
 * Infobox shortcode styel 5 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_infobox' ][ 'atts' ];
?>
<div class="sigma_icon-block text-center light icon-block-7">
                <?php
                if ( $atts[ 'icon_image' ] ) {
                  $image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
                  $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
                  if ( $image_url ) {
                    ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
                    <?php
                  }
                } elseif ( $atts[ 'icon_as' ] === 'number' ) {
                if ( is_int( ( int ) $atts[ 'infobox_number' ] ) ) {
                  ?>
                    <span class="icon-number" data-content="<?php echo esc_html( $atts[ 'infobox_number' ] ); ?>"><?php echo esc_html( $atts[ 'infobox_number' ] ); ?></span>
                  <?php
                }
              } else {
                if ( $atts[ 'icon_type' ] ) {
                  $icon_type = 'icon_' . $atts[ 'icon_type' ];
                  vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
                  if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
                    ?>
                    <i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i>
                    <?php
                  }
                }
              }
              ?>
            <div class="sigma_icon-block-content">
              <?php if($atts['infobox_subtitle']) { ?>
              <span><?php echo esc_html($atts['infobox_subtitle']); ?> <i class="far fa-arrow-right"></i> </span>
            <?php } if($atts['infobox_title']) { ?>
                <h5> <?php echo esc_html($atts['infobox_title']); ?></h5>
              <?php } if($atts[ 'infobox_content' ] ) { ?>
                <p><?php echo html_entity_decode(vc_value_from_safe($atts['infobox_content'], true)); ?></p>
              <?php } ?>
            </div>
            <?php
            if ( $atts[ 'add_icon' ] ) {
              if ( $atts[ 'icon_as' ] === 'image' ) {
                ?>
                <div class="icon-wrapper">
                <?php
                if ( $atts[ 'icon_image' ] ) {
                  $image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
                  $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
                  if ( $image_url ) {
                    ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
                    <?php
                  }
                }
                ?>
                </div>
                <?php
              } elseif ( $atts[ 'icon_as' ] === 'number' ) {
                if ( is_int( ( int ) $atts[ 'infobox_number' ] ) ) {
                  ?>
                  <div class="icon-wrapper">
                    <span class="icon-number" data-content="<?php echo esc_html( $atts[ 'infobox_number' ] ); ?>"><?php echo esc_html( $atts[ 'infobox_number' ] ); ?></span>
                  </div>
                  <?php
                }
              } else {
                if ( $atts[ 'icon_type' ] ) {
                  $icon_type = 'icon_' . $atts[ 'icon_type' ];
                  vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
                  if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
                    ?>
                    <div class="icon-wrapper"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></div>
                    <?php
                  }
                }
              }
            } ?>
          </div>
