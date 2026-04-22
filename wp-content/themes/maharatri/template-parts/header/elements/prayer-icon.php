<?php
/**
 * Template part for header prayer icon.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maharatri
 */
$header_prayer_btn = maharatri_get_option('display-header-prayer-icon');
  if($header_prayer_btn == true) {
?>
  <a href="<?php echo get_post_type_archive_link( 'prayer' ); ?>" class="d-none d-sm-flex align-items-center prayer-icon">
    <i class="flaticon-prayer"></i>
  </a>
<?php }
