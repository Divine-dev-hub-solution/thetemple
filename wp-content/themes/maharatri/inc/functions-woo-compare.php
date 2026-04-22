<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
if( !maharatri_is_woo_active() ){
  return;
}
/**
 * WooCommerce compare functions
 *
 * @package maharatri
 */

if ( ! function_exists( 'maharatri_add_to_compare' ) ) {
	/**
	 * Add product to comapre
	 *
	 * @since 1.0.0
	 */
	function maharatri_add_to_compare() {
		$id = sanitize_text_field( $_GET['id'] );

		$cookie_name = maharatri_compare_cookie_name();

		if ( maharatri_is_product_in_compare( $id ) ) {
			maharatri_compare_json_response();
		}

		$products = maharatri_get_compared_products();

		$products[] = $id;

		setcookie( $cookie_name, json_encode( $products ), 0, COOKIEPATH, COOKIE_DOMAIN, false, false );

		$_COOKIE[$cookie_name] = json_encode( $products );

		maharatri_compare_json_response();
	}

	add_action( 'wp_ajax_maharatri_add_to_compare', 'maharatri_add_to_compare' );
	add_action( 'wp_ajax_nopriv_maharatri_add_to_compare', 'maharatri_add_to_compare' );
}

if ( ! function_exists( 'maharatri_add_to_compare_loop_btn' ) ) {
	/**
	 * Add to compare button on loop product.
	 *
	 * @since 1.0.0
	 */
	function maharatri_add_to_compare_loop_btn() {
		if ( maharatri_get_option( 'show_woo_compare_btn' ) == true) {
			maharatri_add_to_compare_btn( 'maharatri-compare-button compare-icon-button' );
		}
	}
}

add_action('maharatri/product/controls', 'maharatri_add_to_compare_loop_btn', 30);

if ( ! function_exists( 'maharatri_add_to_compare_single_btn' ) ) {
	/**
	 * Add to compare button on single product.
	 *
	 * @since 1.0.0
	 */
	function maharatri_add_to_compare_single_btn() {
		if ( maharatri_get_option( 'show_woo_compare_btn' ) ) {
			maharatri_add_to_compare_btn( 'maharatri-product-single-compare-btn' );
		}
	}
}

add_action('maharatri/product/product_details_controls', 'maharatri_add_to_compare_single_btn');

if ( ! function_exists( 'maharatri_add_to_compare_btn' ) ) {
	/**
	 * Add to compare button.
	 *
	 * @since 1.0.0
	 *
	 * @param string $classes Extra classes.
	 */
	function maharatri_add_to_compare_btn( $classes = '' ) {
		global $product;
		?>
			<div class="maharatri-compare-btn maharatri-product-compare-button <?php echo esc_attr( $classes ); ?>">
				<a href="<?php echo esc_url( maharatri_get_compare_page_url() ); ?>" data-id="<?php echo esc_attr( $product->get_id() ); ?>" data-added-text="<?php esc_html_e( 'Compare products', 'maharatri' ); ?>">
					<?php esc_html_e( 'Compare', 'maharatri' ); ?>
				</a>
			</div>
		<?php
	}
}

if ( ! function_exists( 'maharatri_compare_json_response' ) ) {
	/**
	 * Compare JSON reponse.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_json_response() {
		$count = 0;
		$products = maharatri_get_compared_products();

		ob_start();

		maharatri_get_compared_products_table();

		$table_html = ob_get_clean();

		if ( is_array( $products ) ) {
			$count = count( $products );
		}

		wp_send_json( array(
			'count' => $count,
			'table' => $table_html,
		) );
	}
}

if ( ! function_exists( 'maharatri_get_compare_page_url' ) ) {
	/**
	 * Get compare page ID.
	 *
	 * @since 1.0.0
	 */
	function maharatri_get_compare_page_url() {
		$page_id = maharatri_get_option( 'compare_page' );

		return get_permalink( $page_id );
	}
}


if ( ! function_exists( 'maharatri_remove_from_compare' ) ) {
	/**
	 * Add product to comapre
	 *
	 * @since 1.0.0
	 */
	function maharatri_remove_from_compare() {
		$id = sanitize_text_field( $_GET['id'] );

		$cookie_name = maharatri_compare_cookie_name();

		if ( ! maharatri_is_product_in_compare( $id ) ) {
			maharatri_compare_json_response();
		}

		$products = maharatri_get_compared_products();

		foreach ( $products as $k => $product_id ) {
			if ( intval( $id ) == $product_id ) {
				unset( $products[ $k ] );
			}
		}

		if ( empty( $products ) ) {
			setcookie( $cookie_name, false, 0, COOKIEPATH, COOKIE_DOMAIN, false, false );
			$_COOKIE[$cookie_name] = false;
		} else {
			setcookie( $cookie_name, json_encode( $products ), 0, COOKIEPATH, COOKIE_DOMAIN, false, false );
			$_COOKIE[$cookie_name] = json_encode( $products );
		}

		maharatri_compare_json_response();
	}

	add_action( 'wp_ajax_maharatri_remove_from_compare', 'maharatri_remove_from_compare' );
	add_action( 'wp_ajax_nopriv_maharatri_remove_from_compare', 'maharatri_remove_from_compare' );
}


if ( ! function_exists( 'maharatri_is_product_in_compare' ) ) {
	/**
	 * Is product in compare
	 *
	 * @since 1.0.0
	 */
	function maharatri_is_product_in_compare( $id ) {
		$list = maharatri_get_compared_products();

		return in_array( $id, $list, true );
	}
}


if ( ! function_exists( 'maharatri_get_compare_count' ) ) {
	/**
	 * Get compare number.
	 *
	 * @since 1.0.0
	 */
	function maharatri_get_compare_count() {
		$count = 0;
		$products = maharatri_get_compared_products();

		if ( is_array( $products ) ) {
			$count = count( $products );
		}

		return $count;
	}
}


if ( ! function_exists( 'maharatri_compare_cookie_name' ) ) {
	/**
	 * Get compare cookie namel.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_cookie_name() {
		$name = 'maharatri_compare_list';
    return $name;
	}
}


if ( ! function_exists( 'maharatri_get_compared_products' ) ) {
	/**
	 * Get compared products IDs array
	 *
	 * @since 3.3
	 */
	function maharatri_get_compared_products() {
		$cookie_name = maharatri_compare_cookie_name();
        return isset( $_COOKIE[ $cookie_name ] ) ? json_decode( wp_unslash( $_COOKIE[ $cookie_name ] ), true ) : array();
	}
}

if ( ! function_exists( 'maharatri_is_products_have_field' ) ) {
	/**
	 * Checks if the products have such a field.
	 *
	 * @since 1.0.0
	 */
	function maharatri_is_products_have_field( $field_id, $products ) {
		foreach ( $products as $product_id => $product ) {
			if ( isset( $product[ $field_id ] ) && ( ! empty( $product[ $field_id ] ) && '-' !== $product[ $field_id ] && 'N/A' !== $product[ $field_id ] ) ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'maharatri_get_compared_products_table' ) ) {
	/**
	 * Get compared products data table HTML
	 *
	 * @since 1.0.0
	 */
	function maharatri_get_compared_products_table() {
		$products = maharatri_get_compared_products_data();
		$fields = maharatri_get_compare_fields();
    $table_wrapper_classs = empty($products) ? 'empty-table' : '';
    $table_wrapper_classs .= !empty($products) && (count($products) > 3) ? ' table-scroll' : '';
		?>
		<div class="maharatri-compare-table woocommerce <?php echo esc_attr($table_wrapper_classs); ?>">
			<?php
			if ( ! empty( $products ) ) {
				array_unshift( $products, array() );
				foreach ( $fields as $field_id => $field ) {
					if ( ! maharatri_is_products_have_field( $field_id, $products ) ) {
						continue;
					}
					?>
						<div class="maharatri-compare-row compare-<?php echo esc_attr( $field_id ); ?>">
							<?php foreach ( $products as $product_id => $product ) : ?>
								<?php if ( ! empty( $product ) ) : ?>
									<div class="maharatri-compare-col compare-value" data-title="<?php echo esc_attr( $field ); ?>">
										<?php maharatri_compare_display_field( $field_id, $product ); ?>
									</div>
								<?php else: ?>
									<div class="maharatri-compare-col compare-field">
										<?php echo esc_html( $field ); ?>
									</div>
								<?php endif; ?>

							<?php endforeach ?>
						</div>
					<?php
				}
			} else {
				?>
					<p class="maharatri-empty-compare maharatri-empty-page">
						<?php esc_html_e('Compare list is empty.', 'maharatri'); ?>
					</p>
					<p class="return-to-shop">
						<a class="button" href="<?php echo esc_url(get_permalink( wc_get_page_id( 'shop' ))); ?>">
							<?php esc_html_e( 'Return to shop', 'maharatri' ); ?>
						</a>
					</p>
				<?php
			}

			?>
		</div>
		<?php
	}
}


if ( ! function_exists( 'maharatri_get_compare_fields' ) ) {
	/**
	 * Get compare fields data.
	 *
	 * @since 1.0.0
	 */
	function maharatri_get_compare_fields() {
		$fields = array(
			'basic' => ''
		);

		$fields_settings = maharatri_get_option('compare_fields');

		if ( count( $fields_settings ) > 1 ) {
			$fields_labels = maharatri_compare_available_fields( true );

			foreach ( $fields_settings as $field ) {
				if ( isset( $fields_labels [ $field ] ) ) {
					$fields[ $field ] = $fields_labels [ $field ]['name'];
				}
			}

			return $fields;
		}

		if ( isset( $fields_settings['enabled'] ) && count( $fields_settings['enabled'] ) > 1 ) {
			$fields = $fields + $fields_settings['enabled'];
			unset( $fields['placebo'] );
		}


		return $fields;
	}
}


if ( ! function_exists( 'maharatri_compare_display_field' ) ) {
	/**
	 * Get compare fields data.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_display_field( $field_id, $product ) {
		$type = $field_id;
		if ( 'pa_' === substr( $field_id, 0, 3 ) ) {
			$type = 'attribute';
		}
		switch ( $type ) {
			case 'basic':
				echo '<div class="compare-basic-content">';
					echo '<a href="#" class="maharatri-compare-remove" data-id="' . esc_attr( $product['id'] ) . '"><span class="remove-loader"></span>' . esc_html__( 'Remove', 'maharatri' ) . '</a>';
					echo '<a class="product-image" href="' . get_permalink( $product['id'] ) . '">' . $product['basic']['image']. '</a>';
					echo '<a class="product-title" href="' . get_permalink( $product['id'] ) . '">' . $product['basic']['title']. '</a>';
          echo wp_kses($product['basic']['rating'], array(
               'div' => array(
                   'class' => array(),
                   'role' => array(),
                   'aria-label' => array()
               ),
               'span' => array(
                   'style' => array(),
                   'class' => array(),
               ),
               'strong' => array(
                   'class' => array(),
               ),
           ));
					echo '<div class="price">';
            echo wp_kses($product['basic']['price'], array(
                 'span' => array(
                     'class' => array(),
                 ),
                 'del' => array(
                     'aria-hidden' => array(),
                 ),
                 'ins' => array(
                     'aria-hidden' => array(),
                 ),
             ));
					echo '</div>';
          echo apply_filters( 'maharatri_compare_add_to_cart_btn', $product['basic']['add_to_cart'] );
				echo '</div>';
			break;
			case 'attribute':
				if ( $field_id === maharatri_get_option( 'brands_attribute' ) ) {
					$brands = wc_get_product_terms( $product['id'], $field_id, array( 'fields' => 'all' ) );
					if ( empty( $brands ) ) {
						echo '-';
						return;
					}
					foreach ($brands as $brand) {
						$image = get_term_meta( $brand->term_id, 'image', true);
						if( ! empty( $image ) ) {
							echo '<div class="maharatri-compare-brand">';
								echo apply_filters( 'maharatri_image', '<img src="' . esc_url( $image ) . '" title="' . esc_attr( $brand->name ) . '" alt="' . esc_attr( $brand->name ) . '" />' );
							echo '</div>';
						}
					}
				} else {
          echo wp_kses($product[ $field_id ], array(
               'div' => array(
                   'class' => array(),
                   'data-title' => array(),
               ),
           ));
				}
				break;
			case 'weight':
				if ( $product[ $field_id ] ) {
					$unit = $product[ $field_id ] !== '-' ? get_option( 'woocommerce_weight_unit' ) : '';
					echo wc_format_localized_decimal( $product[ $field_id ] ) . ' ' . esc_attr( $unit );
				}
				break;
			case 'description':
				echo apply_filters( 'woocommerce_short_description', $product[ $field_id ] );
				break;
			default:
        echo wp_kses($product[ $field_id ], array(
             'div' => array(
                 'class' => array(),
                 'data-title' => array(),
             ),
         ));
				break;
		}
	}

}


if ( ! function_exists( 'maharatri_get_compared_products_data' ) ) {
	/**
	 * Get compared products data
	 *
	 * @since 1.0.0
	 */
	function maharatri_get_compared_products_data() {
		$ids = maharatri_get_compared_products();

		if ( empty( $ids ) ) {
			return array();
		}

		$args = array(
			'include' => $ids,
			'limit'   => 100,
		);

		$products = wc_get_products( $args );

		$products_data = array();

		$fields = maharatri_get_compare_fields();

		$fields = array_filter( $fields, function(  $field ) {
			return 'pa_' === substr( $field, 0, 3 );
		}, ARRAY_FILTER_USE_KEY );

		$divider = '-';

		foreach ( $products as $product ) {
			$rating_count = $product->get_rating_count();
			$average = $product->get_average_rating();

			$products_data[ $product->get_id() ] = array(
				'basic' => array(
					'title' => $product->get_title() ? $product->get_title() : $divider,
					'image' => $product->get_image() ? $product->get_image() : $divider,
					'rating' => wc_get_rating_html( $average, $rating_count ),
					'price' => $product->get_price_html() ? $product->get_price_html() : $divider,
					'add_to_cart' => maharatri_compare_add_to_cart_html( $product ) ? maharatri_compare_add_to_cart_html( $product ) :$divider,
				),
				'id' => $product->get_id(),
				'image_id' => $product->get_image_id(),
				'permalink' => $product->get_permalink(),
				'dimensions' => wc_format_dimensions( $product->get_dimensions( false ) ),
				'description' => $product->get_short_description() ? $product->get_short_description() : $divider,
				'weight' => $product->get_weight() ? $product->get_weight() : $divider,
				'sku' => $product->get_sku() ? $product->get_sku() : $divider,
				'availability' => maharatri_compare_availability_html( $product ),
			);

			foreach ( $fields as $field_id => $field_name ) {
				if ( taxonomy_exists( $field_id ) ) {
					$products_data[ $product->get_id() ][ $field_id ] = array();
					$orderby = wc_attribute_orderby( $field_id ) ? wc_attribute_orderby( $field_id ) : 'name';
					$terms = wp_get_post_terms( $product->get_id(), $field_id, array(
							'orderby' => $orderby
					) );
					if ( ! empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$term = sanitize_term( $term, $field_id );
							$products_data[ $product->get_id() ][ $field_id ][] = $term->name;
						}
					} else {
						$products_data[ $product->get_id() ][ $field_id ][] = '-';
					}
					$products_data[ $product->get_id() ][ $field_id ] = implode( ', ', $products_data[ $product->get_id() ][ $field_id ] );
				}
			}
		}

		return $products_data;
	}
}

if ( ! function_exists( 'maharatri_compare_availability_html' ) ) {
	/**
	 * Get product availability html.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_availability_html( $product ) {
		$html         = '';
		$availability = $product->get_availability();

		if( empty( $availability['availability'] ) ) {
			$availability['availability'] = __( 'In stock', 'maharatri' );
		}

		if ( ! empty( $availability['availability'] ) ) {
			ob_start();

			wc_get_template( 'single-product/stock.php', array(
				'product'      => $product,
				'class'        => $availability['class'],
				'availability' => $availability['availability'],
			) );

			$html = ob_get_clean();
		}

		return apply_filters( 'woocommerce_get_stock_html', $html, $product );
	}
}


if ( ! function_exists( 'maharatri_compare_add_to_cart_html' ) ) {
	/**
	 * Get product add to cart html.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_add_to_cart_html( $product ) {
		if ( ! $product ) return;

		$defaults = array(
			'quantity'   => 1,
			'class'      => implode( ' ', array_filter( array(
				'button',
				'product_type_' . $product->get_type(),
				$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
				$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
			) ) ),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', $defaults, $product );

		if ( isset( $args['attributes']['aria-label'] ) ) {
			$args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
		}

		return apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a href="%s" data-quantity="%s" class="%s add-to-cart-loop" %s><span>%s</span></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				esc_html( $product->add_to_cart_text() )
			),
		$product, $args );
	}
}





if ( ! function_exists( 'maharatri_compare_available_fields' ) ) {
	/**
	 * All available fields for Theme Settings sorter option.
	 *
	 * @since 1.0.0
	 */
	function maharatri_compare_available_fields( $new = false) {
		$product_attributes = array();

		if( function_exists( 'wc_get_attribute_taxonomies' ) ) {
			$product_attributes = wc_get_attribute_taxonomies();
		}

		if ( $new ) {
			$options = array(
				'description' => array(
					'name'  => esc_html__( 'Description', 'maharatri' ),
					'value' => 'description',
				),
				'dimensions' => array(
					'name'  => esc_html__( 'Dimensions', 'maharatri' ),
					'value' => 'dimensions',
				),
				'weight' => array(
					'name'  => esc_html__( 'Weight', 'maharatri' ),
					'value' => 'weight',
				),
				'availability' => array(
					'name'  => esc_html__( 'Availability', 'maharatri' ),
					'value' => 'availability',
				),
				'sku' => array(
					'name'  => esc_html__( 'Sku', 'maharatri' ),
					'value' => 'sku',
				),

			);

			if ( count( $product_attributes ) > 0 ) {
				foreach ( $product_attributes as $attribute ) {
					$options[ 'pa_' . $attribute->attribute_name ] = array(
						'name'  => wc_attribute_label( $attribute->attribute_label ),
						'value' => 'pa_' . $attribute->attribute_name,
					);
				}
			}
			return $options;
		}

		$fields = array(
			'enabled'  => array(
				'description' => esc_html__( 'Description', 'maharatri' ),
				'sku' => esc_html__( 'Sku', 'maharatri' ),
				'availability' => esc_html__( 'Availability', 'maharatri' ),
			),
			'disabled' => array(
				'weight' => esc_html__( 'Weight', 'maharatri' ),
				'dimensions' => esc_html__( 'Dimensions', 'maharatri' ),
			)
		);

		if ( count( $product_attributes ) > 0 ) {
			foreach ( $product_attributes as $attribute ) {
				$fields['disabled'][ 'pa_' . $attribute->attribute_name ] = $attribute->attribute_label;
			}
		}

		return $fields;
	}
}

/**
* Get product compare data on adding into compare list
*
* @since 1.0.0
*/
function maharatri_product_compare_snackbar_data() {
  $id = $_POST['id'];
  $product = wc_get_product($id);
  echo '<div class="product-title">'.$product->get_name(). esc_html__(' added to compare list', 'maharatri').'</div>';
  die();
}
add_action( 'wp_ajax_nopriv_maharatri_product_compare_snackbar_data', 'maharatri_product_compare_snackbar_data' );
add_action( 'wp_ajax_maharatri_product_compare_snackbar_data', 'maharatri_product_compare_snackbar_data' );
