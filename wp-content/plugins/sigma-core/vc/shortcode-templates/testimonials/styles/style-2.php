<?php
/**
 * Testimonial shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_testimonials' ][ 'atts' ];
$testimonial_details         = get_post_meta( $post->ID, 'sigma_testimonial_details', true );
$sigma_testimonial_designation  = isset( $testimonial_details['sigma_testimonial_designation'] ) ? $testimonial_details['sigma_testimonial_designation'] : '';
$sigma_testimonial_rating       = isset( $testimonial_details['sigma_testimonial_rating'] ) ? (int) $testimonial_details['sigma_testimonial_rating'] : '';
?>
<div class="sigma_testimonial-inner">
  <?php if(has_post_thumbnail($post->ID)){ ?>
  <div class="sigma_testimonial-thumb">
    <?php the_post_thumbnail(); ?>
  </div>
<?php } ?>
  <div>
    <div class="sigma_testimonial-body">
      <div class="sigma_rating-wrapper">
        <?php
        if ( $sigma_testimonial_rating ) {
          ?>
          <div class="sigma-testimonial-rating">
            <?php
            for ( $i = 1; 5 >= $i; $i++ ) {
              if ( $sigma_testimonial_rating >= $i ){
                ?>
                <i class="fas fa-star active"></i>
                <?php
              } else {
                ?>
                <i class="fal fa-star"></i>
                <?php
              }
            }
            ?>
          </div>
          <?php
        }
        ?>
      </div>
      <?php the_excerpt(); ?>
    </div>
    <div class="sigma_testimonial-footer">
      <div class="sigma_testimonial-author">
        <cite><?php echo esc_html( $post->post_title ); ?></cite>
        <?php if($sigma_testimonial_designation) { ?>
          <span><?php echo esc_html($sigma_testimonial_designation); ?></span>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
