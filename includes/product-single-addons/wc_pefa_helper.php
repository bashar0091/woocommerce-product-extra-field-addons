<?php

/**
 * 
 * Helper Function
 * 
 */

function get_product_id_on_single_page() {
    global $product;
    if ( is_product() && isset( $product ) && is_a( $product, 'WC_Product' ) ) {
        return $product->get_id();
    }
    return 0;
}