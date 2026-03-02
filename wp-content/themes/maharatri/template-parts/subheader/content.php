<?php
/**
 * Page title layout.
 *
 * @package Maharatri
 */
global $post;
if ( is_404() ) {
	return;
}
// Check if subheader is active
$subheader_is_active = maharatri_subheader_is_active();
if(!$subheader_is_active){
	return;
}
// Get the page title and caption
$page_title = maharatri_subheader_get_title();
$page_caption = maharatri_subheader_get_caption();
$page_background_image = maharatri_subheader_get_background_image();
$page_title_alignment = ( maharatri_get_option('page_title_alignment') ) ? maharatri_get_option('page_title_alignment') : 'text-left';
$page_title_pattern = (maharatri_get_option('page_title_pattern') ) ? maharatri_get_option('page_title_pattern') : 'pattern-linear';
$is_breadcrumb_active = ( maharatri_get_option('display_breadcrumb') ) && maharatri_get_option('display_breadcrumb') ? 'yes' : '';
$breadcrumb_position = ( maharatri_get_option('breadcrumb_position') ) ? maharatri_get_option('breadcrumb_position') : 'inline';
$subheader_style = (maharatri_get_option('subheader_style')) ? maharatri_get_option('subheader_style') : 'style-1';
?>
<div class="sigma-subheader  <?php echo esc_attr('subheader-' . $subheader_style . ' ' . $page_title_alignment . ' ' . $page_title_pattern . ' ' . $breadcrumb_position); ?>" <?php if($page_background_image){ echo 'style="background-image:url('.esc_url($page_background_image).')"'; } ?>>
	<div class="sigma-subheader-layer container">
		<?php if($is_breadcrumb_active && $breadcrumb_position == 'before-title'){ ?>
			<div class="breadcrumb-nav">
			<?php echo maharatri_subheader_get_breadcrumbs(); ?>
			</div>
		<?php } ?>
		<div class="subheader-title-wrapper">
				<?php if($page_title){ ?>
				<h1 class="page-title"> <?php echo esc_html($page_title) ?> </h1>
			<?php } ?>
			<?php if($page_caption){ ?>
				<p class="subheader-caption"> <?php echo esc_html($page_caption) ?> </p>
			<?php } ?>
		</div>
		<?php if($is_breadcrumb_active && ($breadcrumb_position == 'after-title' || $breadcrumb_position == 'inline')){ ?>
			<div class="breadcrumb-nav">
			<?php echo maharatri_subheader_get_breadcrumbs(); ?>
			</div>
			<?php } ?>
		</div>
		<?php if($page_title_pattern == 'pattern-circular'){ ?>
			<div class="page-title-shape">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
					<path d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z">
					</path>
				</svg>
			</div>
		<?php } ?>
</div>
<?php if($is_breadcrumb_active && $breadcrumb_position == 'below-image'){ ?>
	<div class="breadcrumb-nav below-image <?php echo esc_attr($page_title_alignment); ?>">
		<div class="container">
			<?php echo maharatri_subheader_get_breadcrumbs(); ?>
		</div>
	</div>
<?php } ?>
