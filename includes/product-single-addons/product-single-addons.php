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

    // show field data

    $data = get_option( 'APF_Tabs', array() );

    echo '<form class="wc_pefa_cart" action="" method="post" enctype="multipart/form-data">';
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

    require_once('partials/wc_pefa_option_bottom_1.php');
    require_once('partials/wc_pefa_option_bottom_2.php');

        echo '
        <p>'.$data["settings_content"]["section_3_bottom_des"].'</p>

        <div class="wc_pefa_total_price">
            <div class="total_price_text">
                Total Price
            </div>
            <div class="total_price_num">'.$product_price.'</div>
        </div>
        
        <div></div>


        <div class="mkdf-quantity-buttons quantity">
            <label class="screen-reader-text" for="quantity_64cec24637363">Kit Gráfico Honda Nevula quantity</label>
            <span class="mkdf-quantity-minus arrow_carrot-down"></span>
            <input type="text" id="quantity_64cec24637363" class="mkdf-quantity-input input-text qty text" data-step="1"
                data-min="1" data-max="" name="quantity" value="01" title="Qty" size="4" placeholder="" inputmode="numeric">
            <span class="mkdf-quantity-plus arrow_carrot-up"></span>
        </div>

        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

        <button type="submit" name="custom_cart" value="'.$product_id.'" class="single_add_to_cart_button button  alt mkdf-visible">
            <span class="mkdf-btn-predefined-line-holder">
                <span class="mkdf-btn-line-hidden"></span>
                <span class="mkdf-btn-text">Add To Cart </span><span class="mkdf-btn-line"></span><i
                    class="mkdf-icon-ion-icon ion-ios-play "></i>
            </span>
        </button>
    </form>';
}
add_action('woocommerce_before_add_to_cart_form', 'add_hello_world_text_before_add_to_cart_form',2);

// Disable default add to cart action