<?php

function process_estimated_contact() {
    if (isset($_POST['custom_cart'])) {
        $product_id = $_POST['custom_cart'];

        // Get the product name
        $product_name = get_the_title($product_id);
        
        $wc_pefa_type = isset($_POST['wc_pefa_type']) ? $_POST['wc_pefa_type'] : null;

        $wc_pefa_color_1 = isset($_POST['wc_pefa_color_1']) ? $_POST['wc_pefa_color_1'] : null;
        $wc_pefa_color_2 = isset($_POST['wc_pefa_color_2']) ? $_POST['wc_pefa_color_2'] : null;
        $wc_pefa_color_3 = isset($_POST['wc_pefa_color_3']) ? $_POST['wc_pefa_color_3'] : null;

        $file_1_text = isset($_POST['file_1_text']) ? $_POST['file_1_text'] : null;
        $file_1 = isset($_POST['file_1']) ? $_POST['file_1'] : null;

        $quantity = $_POST['quantity'];

        $cart_item_data = array(
            'wc_pefa_type' => $wc_pefa_type,
            'wc_pefa_color_1' => $wc_pefa_color_1,
            'wc_pefa_color_2' => $wc_pefa_color_2,
            'wc_pefa_color_3' => $wc_pefa_color_3,

            'file_1_text' => $file_1_text,
            'file_1' => $file_1,
        );

        WC()->cart->add_to_cart($product_id, $quantity, 0, array(), $cart_item_data);

        // Create the "View Cart" button HTML markup
        $view_cart_button = sprintf('<a href="%s" class="button">%s</a>', wc_get_cart_url(), __('View Cart', 'woocommerce'));

        // Add WooCommerce success notice with product name and "View Cart" button
        wc_add_notice(sprintf(__('"%s" added to cart successfully. %s', 'woocommerce'), $product_name, $view_cart_button), 'success');
    }
}
add_action('template_redirect', 'process_estimated_contact');


// function to display custom field on cart
function display_custom_product_field_on_cart($cart_item_data, $cart_item) {
    if (isset($cart_item['wc_pefa_type'])) {
        $cart_item_data[] = array(
            'name' => 'LAMINADO',
            'value' => $cart_item['wc_pefa_type'],
        );
    }
    if (isset($cart_item['wc_pefa_color_1'])) {
        $cart_item_data[] = array(
            'name' => 'Color 1',
            'value' => $cart_item['wc_pefa_color_1'],
        );
    }
    if (isset($cart_item['wc_pefa_color_1'])) {
        $cart_item_data[] = array(
            'name' => 'Color 2',
            'value' => $cart_item['wc_pefa_color_1'],
        );
    }
    if (isset($cart_item['wc_pefa_color_1'])) {
        $cart_item_data[] = array(
            'name' => 'Color 3',
            'value' => $cart_item['wc_pefa_color_1'],
        );
    }
    if (isset($cart_item['file_1_text'])) {
        $cart_item_data[] = array(
            'name' => 'File 1 Text',
            'value' => $cart_item['file_1_text'],
        );
    }
    if (isset($cart_item['file_1'])) {
        $cart_item_data[] = array(
            'name' => 'File 1 Image',
            'value' => $cart_item['file_1'],
        );
    }
    return $cart_item_data;
}
add_filter('woocommerce_get_item_data', 'display_custom_product_field_on_cart', 10, 2);

// function to update custom field on checkout
function display_custom_product_field_on_checkout($item, $cart_item_key, $values, $order) {
    if (isset($values['wc_pefa_type'])) {
        $item->add_meta_data('LAMINADO', $values['wc_pefa_type'], true);
    }
    if (isset($values['file_1_text'])) {
        $item->add_meta_data('File 1 Text', $values['file_1_text'], true);
    }
    if (isset($values['file_1'])) {
        $item->add_meta_data('File 1 Image', $values['file_1'], true);
    }
    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);