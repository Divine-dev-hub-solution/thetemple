<?php
/**
 * Template part for displaying puja details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maharatri
 */
$puja_details = get_post_meta( get_the_ID(), 'sigma_puja_details', true );
$puja_client_name = maharatri_is_not_empty($puja_details, 'sigma_puja_client_name') ? $puja_details['sigma_puja_client_name'] : '';
$puja_year = maharatri_is_not_empty($puja_details, 'sigma_puja_year') ? $puja_details['sigma_puja_year'] : '';
$puja_terms = get_the_terms( get_the_ID(), 'puja-category' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-puja-details' ); ?>>
    <?php if(has_post_thumbnail()) { ?>
    <div class="sigma_post-single-thumb">
        <?php the_post_thumbnail(); ?>
        <?php if(maharatri_get_option('show_puja_infobox') == true) {
            if(!empty($puja_client_name) || !empty($puja_year) || !empty($puja_terms)) {
            ?>
        <div class="sigma_box">
            <?php if(!empty($puja_client_name)) { ?>
                <div class="sigma_list-item">
                    <label><?php echo esc_html__('Puja Type:', 'maharatri'); ?></label>
                    <span><?php echo esc_html($puja_client_name); ?></span>
                </div>
            <?php } if(!empty($puja_year)) { ?>
                <div class="sigma_list-item">
                    <label><?php echo esc_html__('Date:', 'maharatri'); ?></label>
                    <span><?php echo esc_html($puja_year); ?></span>
                </div>
            <?php } if(!empty($puja_terms)) { ?>
            <div class="sigma_list-item">
                <label><?php echo esc_html__('Category:', 'maharatri'); ?></label>
                <?php
                $terms_data = array();
                foreach ( $puja_terms as $get_term ) {
                    $terms_data[ $get_term->slug ] = $get_term->name;
                }
                ?>
                <span><?php echo esc_html( implode( ', ', $terms_data ) ); ?></span>
            </div>
            <?php } ?>
            <?php
            if ( function_exists('sigmacore_posts_share') && maharatri_get_option('show_puja_share') == true ) {
                sigmacore_posts_share();
            }
            ?>
        </div>
        <?php } } ?>
    </div>
    <?php } ?>
    <div class="sigma-puja-content">
        <?php the_content(); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
  // Pagination
  maharatri_single_post_pagination();
  
  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;
