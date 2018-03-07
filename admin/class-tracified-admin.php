<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Tracified-Ecommerce
 * @since      1.0.0
 *
 * @package    Tracified
 * @subpackage Tracified/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tracified
 * @subpackage Tracified/admin
 * @author     Tracified-Ecommerce <ecommerceplugin@gmail.com>
 */
class Tracified_Admin {


	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tracified-admin.css', array(), $this->version, 'all' );

	}


	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tracified-admin.js', array( 'jquery' ), $this->version, false );

	}


	function tracified_plugin_setup_menu(){
		add_menu_page( 'Tracified', 'Tracified', 'manage_options', $this->plugin_name,array($this, 'display_plugin_setup_page'),'',7.5 );
		add_submenu_page($this->plugin_name, 'Orders', 'Orders', 'manage_options', '' );
		add_submenu_page($this->plugin_name, 'Reports', 'Reports', 'manage_options', '' );
		add_submenu_page($this->plugin_name, 'Reports', 'Status', 'manage_options', '' );
	}

	public function display_plugin_setup_page() {
		include_once( 'partials/tracified-admin-display.php' );
		echo "<h3>Tracified</h3>";
	}



}
