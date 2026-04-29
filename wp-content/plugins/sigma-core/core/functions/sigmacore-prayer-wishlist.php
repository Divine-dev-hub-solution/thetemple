<?php
if (!defined('ABSPATH')) {
    exit;  // Exit if accessed directly
}

/**
 * Class to perform Ajax wishlist for Prayer
 *
 * @since 1.0.0
 */
class Sigmacore_Ajax_Wishlist {

    private static $instance = null;

    public static function instance() {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct(){
        add_action('wp_ajax_add_ajax_wishlist',  array($this,  'add_ajax_wishlist'));
        add_action('wp_ajax_nopriv_add_ajax_wishlist',  array($this,  'add_ajax_wishlist'));
    }

    public function add_ajax_wishlist(){

        $post_id = $_POST['post_id'];
        $mode = $_POST['mode'];
        $user_id = get_current_user_id();

        // Show Popup login of !user_logged
        if (!is_user_logged_in()) {
            echo json_encode(array('logged_in' => false, 'add_wishlist' => ''));
            die();
        }

        if($mode == 'add') {
            $wishlist = get_user_meta($user_id, 'sc_wishlist', true);
            if (is_array($wishlist)) {
                if (!in_array($post_id, $wishlist)) {
                    $wishlist[] = $post_id;
                    update_user_meta($user_id, 'sc_wishlist', $wishlist);
                }
            } else {
                $wishlist = array($post_id);
                update_user_meta($user_id, 'sc_wishlist', $wishlist);
            }
            echo json_encode(array('logged_in' => true, 'add_wishlist' => 'added', 'mode' => 'add'));
            die();
        }
        if($mode == 'remove'){
            $wishlist = get_user_meta($user_id, 'sc_wishlist', true);
            if (is_array($wishlist)) {
                foreach ($wishlist as $key => $value) {
                    if ( $post_id == $value ) {
                        unset($wishlist[$key]);
                    }
                }
            }
            update_user_meta($user_id, 'sc_wishlist', $wishlist);
            echo json_encode(array('logged_in' => true, 'remove_wishlist' => 'removed', 'mode' => 'remove'));
            die();
        }
    }

    public static function ajax_wishlist_icon($post_id){

        $user_id = get_current_user_id();
        $wishlist_data = get_user_meta($user_id, 'sc_wishlist', true);
        $check_wishlist = false;
        if(is_array($wishlist_data)) {
            if(in_array($post_id, $wishlist_data)) {
                $check_wishlist = true;
            }
        } else {
            if($post_id == $wishlist_data) {
                $check_wishlist = true;
            }
        }
        ?>
        <a href="<?php the_permalink(); ?>" class="sigma_btn-custom prayer-link-btn ajax-wishlist-btn <?php echo (!$check_wishlist ? 'wishlist-add' : 'wishlist-remove wishlist-added'); ?>" data-post_id="<?php echo esc_attr($post_id); ?>">
            <i class="fal fa-heart me-2"></i>
            <?php esc_html_e('I Prayed For This', 'sigma-core'); ?>
        </a>
        <?php
    }

}

new Sigmacore_Ajax_Wishlist();
