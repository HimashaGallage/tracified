<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Tracified-Ecommerce
 * @since             1.0.0
 * @package           Tracified
 *
 * @wordpress-plugin
 * Plugin Name:       tracified
 * Plugin URI:        https://github.com/Tracified-Ecommerce/shopify-express-application
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tracified-Ecommerce
 * Author URI:        https://github.com/Tracified-Ecommerce
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tracified
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'PLUGIN_NAME_VERSION', '1.0.0' );


function activate_tracified() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tracified-activator.php';
	Tracified_Activator::activate();
}


function deactivate_tracified() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tracified-deactivator.php';
	Tracified_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tracified' );
register_deactivation_hook( __FILE__, 'deactivate_tracified' );


require plugin_dir_path( __FILE__ ) . 'includes/class-tracified.php';


function run_tracified() {

	$plugin = new Tracified();
	$plugin->run();

}

	require_once plugin_dir_path( __FILE__ ) . 'GitHubPluginUpdater.php';
	if ( is_admin() ) {
		new GitHubPluginUpdater( __FILE__, 'Himasha-Gallage', 'tracified' );
	}
run_tracified();
