<?php
/**
 * Template part for footer layout 2.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
?>
<?php if( maharatri_get_option('display-footer-topbar') ){ ?>
  <div class="footer-top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <div class="logo">
            <?php maharatri_get_site_logo('footer-logo', false); ?>
          </div>
          <?php if( maharatri_get_option('footer_newsletter_text') ){ ?>
            <p> <?php echo esc_html(maharatri_get_option('footer_newsletter_text')) ?> </p>
          <?php } ?>
          <?php
          if( maharatri_get_option('footer_newsletter_shortcode') ){
            echo do_shortcode( maharatri_get_option('footer_newsletter_shortcode') );
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <?php get_sidebar( 'footer' ); ?>
  <div class="sigma-copyright">
    <div class="container">
      <div class="footer-copyright-section">
        <div class="footer-left">
          <?php
          if ( maharatri_get_option('copyright_text_left') ) {
            echo esc_html( maharatri_get_option('copyright_text_left') );
          }
          ?>
        </div>
        <div class="footer-right">
          <?php
            if( maharatri_get_option('display-footer-social-links') ){
            $social_infos = maharatri_get_option('social_infos');
          ?>
            <div class="social-icon text-center">
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
    </div>
  </div>
