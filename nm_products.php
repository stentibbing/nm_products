<?php
/**
 *
 * @link              https://www.taifuun.ee
 * @since             1.0.0
 * @package           Nordic_milk_products
 *
 * @wordpress-plugin
 * Plugin Name:       Nordic Milk Products
 * Plugin URI:        https://www.taifuun.ee
 * Description:       This plugin adds product post type with product type and package taxonomy
 * Version:           1.0.1
 * Author:            Taifuun OÜ
 * Author URI:        https://www.taifuun.ee
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nm_products
 * Domain Path:       /languages
 * GitHub Plugin URI: stentibbing/nm_products
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'NM_PRODUCTS_VERSION', '1.0.1' );

/**
 * Plugin Activation code
 */
function activate_nm_products() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nm_products-activator.php';
	NM_Products_Activator::activate();
}

/**
 * Plugin deactivation code
 */
function deactivate_nordic_milk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nm_products-deactivator.php';
	NM_Products_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nm_products' );
register_deactivation_hook( __FILE__, 'deactivate_nm_products' );

/**
 * Core for setting up i18n, hooks etc.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nm_products.php';

/**
 * Instantiate the plugin
 */
function run_nm_products() {

	$plugin = new NM_Products();
	$plugin->run();

}

run_nm_products();
