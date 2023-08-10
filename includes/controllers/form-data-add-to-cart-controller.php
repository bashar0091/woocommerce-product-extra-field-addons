<?php
function process_estimated_contact() {
    if (isset($_POST['add-to-cart'])) {
        $product_id = $_POST['add-to-cart'];
        
        $wc_pefa_year = $_POST['wc_pefa_year'];
        $wc_pefa_type = $_POST['wc_pefa_type'];

        $wc_pefa_color_1 = $_POST['wc_pefa_color_1'];
        $wc_pefa_color_2 = $_POST['wc_pefa_color_2'];
        $wc_pefa_color_3 = $_POST['wc_pefa_color_3'];

        $cart_item_data = array(
            'wc_pefa_year' => $wc_pefa_year,
            'wc_pefa_type' => $wc_pefa_type,
            'wc_pefa_color_1' => $wc_pefa_type,
            'wc_pefa_color_2' => $wc_pefa_type,
            'wc_pefa_color_3' => $wc_pefa_type,
        );

        WC()->cart->add_to_cart($product_id, 1, 0, array(), $cart_item_data);
    }
}
add_action('template_redirect', 'process_estimated_contact');

// function to display custom field on cart
function display_custom_product_field_on_cart($cart_item_data, $cart_item) {
    if (isset($cart_item['wc_pefa_year'])) {
        $cart_item_data[] = array(
            'name' => 'AÑO',
            'value' => $cart_item['wc_pefa_year'],
        );
    }
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
    return $cart_item_data;
}
add_filter('woocommerce_get_item_data', 'display_custom_product_field_on_cart', 10, 2);

// function to update custom field on checkout
function display_custom_product_field_on_checkout($item, $cart_item_key, $values, $order) {
    if (isset($values['wc_pefa_year'])) {
        $item->add_meta_data('AÑO', $values['wc_pefa_year'], true);
    }
    if (isset($values['wc_pefa_type'])) {
        $item->add_meta_data('LAMINADO', $values['wc_pefa_type'], true);
    }
    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);