<?php
/**
 * Plugin Name: Woocommerce Product Extra Field Addons
 * Plugin URI: 
 * Description: Woocommerce Product Extra Field Addons
 * Version: 1.0.0
 * Author: Dev Awal Bashar
 * Author URI: 
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wc-pefa
 */


// Prevent direct access to the plugin file
defined( 'ABSPATH' ) || exit;


/**
 * 
 * Require All Css Files Here
 * 
 */
function wc_pefa_style() {
    wp_enqueue_style( 'wc-pefa-custom', plugin_dir_url( __FILE__ ) . 'includes/assets/css/extra-addons-custom.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'wc_pefa_style' );

/**
 * 
 * Require All Js Files Here
 * 
 */
function wc_pefa_scripts() {
    wp_enqueue_script( 'wc-pefa-custom-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/custom-addons.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wc_pefa_scripts' );

/**
 * 
 * Require All Includes Files Here
 * 
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/product-single-addons/product-single-addons.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controllers/form-data-add-to-cart-controller.php';