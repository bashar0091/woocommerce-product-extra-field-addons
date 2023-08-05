<?php

/**
 * 
 * Breadcrumbs
 * 
 */
function custom_wc_breadcrumb() {
    if (function_exists('woocommerce_breadcrumb')) {
        woocommerce_breadcrumb(array(
            'delimiter'   => ' / ',
            'wrap_before' => '<nav class="wc_pefa_bradcrumb woocommerce-breadcrumb" itemprop="breadcrumb"><div class="container"><div class="row"><div class="col">',
            'wrap_after'  => '</div></div></div></nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x('Home', 'breadcrumb', 'woocommerce'),
        ));
    }
}
add_action('woocommerce_before_add_to_cart_form', 'custom_wc_breadcrumb', 1);