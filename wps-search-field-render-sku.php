<?php
/**
 * Plugin Name: WPS Search Field Render SKU 
 * Plugin URI: https://github.com/geotsiokos/wps-search-field-render-sku
 * Description: Show the product SKU in the results dropdown when using the WooCommerce Product Search: Product Search Field
 * Author: gtsiokos
 * Author URI: https://netpad.gr/
 * License: GPLv3
 * Version: 1.0.0
 *
 * @author George Tsiokos
 * @package wps-search-field-render-sku
 * @since wps-search-field-render-sku 1.0.0
 *
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
add_filter( 'woocommerce_product_search_field_product_title', 'example_function_woocommerce_product_search_field_product_title', 10, 2 );
function example_function_woocommerce_product_search_field_product_title( $title, $post_id ) {
	$product = wc_get_product( $post_id );
	if ( $product ) {
		$product_sku = $product->get_sku();
		$esc_title = esc_html( $title );
		$esc_title .= '<br /><span>' . $product_sku . '</span>';
	}
	return $esc_title;
}