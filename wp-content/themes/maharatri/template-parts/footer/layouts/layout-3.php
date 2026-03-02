<?php
/**
 * Template part for footer layout 3.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
?>
<?php get_sidebar( 'footer' ); ?>
    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
      <div class="container-fluid">
        <div class="sigma_footer-copyright">
          <?php
          if ( maharatri_get_option('copyright_text_left') ) {
            echo wp_kses(
              maharatri_get_option('copyright_text_left'),
              array(
                'a' => array(
                  'href' => array(),
                  'title' => array()
                ),
                'p' =>  array()
              )
            );
          }
          ?>
        </div>
        <?php if(maharatri_get_option('display-footer-logo') == true) { ?>
        <div class="sigma_footer-logo">
        <?php maharatri_get_site_logo('footer-bottom-logo', false); ?>
        </div>
        <?php }
          if( maharatri_get_option('display-footer-bottom-social-links') ){
          $social_infos = maharatri_get_option('social_infos', '');
        ?>
          <div class="social-icon text-center text-sm-right">
          <?php
          if (is_array($social_infos) || is_object($social_infos)) {
          foreach ( $social_infos as $social_info ) {
            if ( maharatri_get_option($social_info . '_link') ) {
                $social_icon = '';
                $social_icon .= ($social_info == 'facebook') ? 'fab fa-facebook-f' : '';
                $social_icon .= ($social_info == 'twitter') ? 'fab fa-twitter' : '';
                $social_icon .= ($social_info == 'dribbble') ? 'fab fa-dribble' : '';
                $social_icon .= ($social_info == 'vimeo') ? 'fab fa-vimeo-v' : '';
                $social_icon .= ($social_info == 'pinterest') ? 'fab fa-pinterest-p' : '';
                $social_icon .= ($social_info == 'linkedin') ? 'fab fa-linkedin-in' : '';
                $social_icon .= ($social_info == 'youtube') ? 'fab fa-youtube' : '';
                $social_icon .= ($social_info == 'instagram') ? 'fab fa-instagram' : '';

              ?>
            <a href="<?php echo esc_url(maharatri_get_option($social_info . '_link')) ?>"><i class="fab fa-<?php echo esc_attr( $social_icon ); ?>"></i></a>
          <?php } } } ?>
          </div>
        <?php } ?>
      </div>
    </div>
