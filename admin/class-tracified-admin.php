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

	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	public function validate($input) {

		$valid = array();

		$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
		$valid['comments_css_cleanup'] = (isset($input['comments_css_cleanup']) && !empty($input['comments_css_cleanup'])) ? 1: 0;
		$valid['gallery_css_cleanup'] = (isset($input['gallery_css_cleanup']) && !empty($input['gallery_css_cleanup'])) ? 1 : 0;
		$valid['body_class_slug'] = (isset($input['body_class_slug']) && !empty($input['body_class_slug'])) ? 1 : 0;
		$valid['jquery_cdn'] = (isset($input['jquery_cdn']) && !empty($input['jquery_cdn'])) ? 1 : 0;
		$valid['cdn_provider'] = esc_url($input['cdn_provider']);

		return $valid;
	}


}
