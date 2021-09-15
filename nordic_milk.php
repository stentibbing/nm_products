<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.taifuun.ee
 * @since             1.0.0
 * @package           Nordic_milk
 *
 * @wordpress-plugin
 * Plugin Name:       Nordic Milk
 * Plugin URI:        https://www.taifuun.ee
 * Description:       This plugin adds extra functionality for Nordic Milk theme
 * Version:           1.0.0
 * Author:            Taifuun OÜ
 * Author URI:        https://www.taifuun.ee
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nordic_milk
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NORDIC_MILK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nordic_milk-activator.php
 */
function activate_nordic_milk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nordic_milk-activator.php';
	Nordic_milk_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nordic_milk-deactivator.php
 */
function deactivate_nordic_milk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nordic_milk-deactivator.php';
	Nordic_milk_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nordic_milk' );
register_deactivation_hook( __FILE__, 'deactivate_nordic_milk' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nordic_milk.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nordic_milk() {

	$plugin = new Nordic_milk();
	$plugin->run();

}
run_nordic_milk();
