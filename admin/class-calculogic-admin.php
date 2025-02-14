<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.hcatoolkit.com
 * @since      1.0.0
 *
 * @package    Calculogic
 * @subpackage Calculogic/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Calculogic
 * @subpackage Calculogic/admin
 * @author     H-CAT <yuri.bara.karmas.sin@gmail.com>
 */

namespace Calculogic\Admin;

class Calculogic_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Calculogic_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Calculogic_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/calculogic-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Calculogic_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Calculogic_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/calculogic-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the settings page.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {
		add_options_page(
			'Calculogic Settings',
			'Calculogic',
			'manage_options',
			'calculogic',
			array( $this, 'display_plugin_admin_page' )
		);
	}

	/**
	 * Render the settings page.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once 'partials/calculogic-admin-display.php';
	}

	/**
	 * Register settings.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
		register_setting(
			'calculogic_options',
			'calculogic_options',
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'calculogic_setting_section',
			'Settings',
			array( $this, 'print_section_info' ),
			'calculogic'
		);

		add_settings_field(
			'setting_example',
			'Example Setting',
			array( $this, 'setting_example_callback' ),
			'calculogic',
			'calculogic_setting_section'
		);
	}

	public function sanitize($input) {
		$new_input = array();
		if(isset($input['setting_example']))
			$new_input['setting_example'] = sanitize_text_field($input['setting_example']);

		return $new_input;
	}

	public function print_section_info() {
		print 'Enter your settings below:';
	}

	public function setting_example_callback() {
		printf(
			'<input type="text" id="setting_example" name="calculogic_options[setting_example]" value="%s" />',
			isset( $this->options['setting_example'] ) ? esc_attr( $this->options['setting_example']) : ''
		);
	}

}
