<?php

/**
 * 
 * Singles Addons Master File 
 * 
 */

// helper function 
require_once('wc_pefa_helper.php');

// breadcrumb 
require_once('partials/wc_pefa_breacrumb.php');

function add_hello_world_text_before_add_to_cart_form() {

    // product id
    $product_id = get_product_id_on_single_page();
    $product = wc_get_product($product_id);

    require_once('partials/wc_pefa_product_title.php');
    require_once('partials/wc_pefa_product_price.php');
    require_once('partials/wc_pefa_product_short_des.php');
    require_once('partials/wc_pefa_option_1.php');
    require_once('partials/wc_pefa_top_des.php');

    echo '<div class="option_section">';
        require_once('partials/wc_pefa_option_section_1.php');
        require_once('partials/wc_pefa_option_section_2.php');
        require_once('partials/wc_pefa_option_section_3.php');
    echo '</div>';

    ?>
    

    <?php
}
add_action('woocommerce_before_add_to_cart_form', 'add_hello_world_text_before_add_to_cart_form',2);
