<?php
/**
 * Time Table shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_time_table' ][ 'atts' ];
?>
<div class="table-responsive-lg">
  <div class="sigma_mass-timing">
      <div class="sigma_mass-content-wrapper row no-gutters">
        <div class="col-lg-5">
          <?php
            if(!empty($atts['first_schedule_title'])) { ?>
              <h4><?php echo esc_html($atts['first_schedule_title']); ?></h4>
          <?php } ?>
          <?php
            $first_mass_schedule = vc_param_group_parse_atts( $atts['first_mass_schedule'] );
            if(!empty($first_mass_schedule)) { ?>
              <ul>
                <?php foreach($first_mass_schedule as $mass_item) { ?>
                  <li>
                    <?php if(!empty($mass_item['mass_timing'])) { ?>
                      <span><?php echo esc_html($mass_item['mass_timing']); ?></span>
                    <?php } if(!empty($mass_item['mass_title'])) { ?>
                      <?php echo $mass_item['mass_title']; ?>
                    <?php } ?>
                  </li>
                <?php } ?>
              </ul>
            <?php } ?>
          </div>
          <div class="col-lg-5">
            <?php
              if(!empty($atts['second_schedule_title'])) { ?>
                <h4><?php echo esc_html($atts['second_schedule_title']); ?></h4>
            <?php } ?>
            <?php
              $second_mass_schedule = vc_param_group_parse_atts( $atts['second_mass_schedule'] );
              if(!empty($second_mass_schedule)) { ?>
                <ul>
                  <?php foreach($second_mass_schedule as $mass_item) { ?>
                    <li>
                      <?php if(!empty($mass_item['mass_timing'])) { ?>
                        <span><?php echo esc_html($mass_item['mass_timing']); ?></span>
                      <?php } if(!empty($mass_item['mass_title'])) { ?>
                        <?php echo $mass_item['mass_title']; ?>
                      <?php } ?>
                    </li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </div>
            <div class="col-lg-2">
              <?php
                if(!empty($atts['third_schedule_title'])) { ?>
                  <h4><?php echo esc_html($atts['third_schedule_title']); ?></h4>
              <?php } ?>
              <?php
                $third_mass_schedule = vc_param_group_parse_atts( $atts['third_mass_schedule'] );
                if(!empty($third_mass_schedule)) { ?>
                  <ul>
                    <?php foreach($third_mass_schedule as $mass_item) { ?>
                      <li>
                        <?php if(!empty($mass_item['mass_timing'])) { ?>
                          <span><?php echo esc_html($mass_item['mass_timing']); ?></span>
                        <?php } if(!empty($mass_item['mass_title'])) { ?>
                          <?php echo $mass_item['mass_title']; ?>
                        <?php } ?>
                      </li>
                    <?php } ?>
                  </ul>
                <?php } ?>
              </div>
      </div>
    </div>
</div>
