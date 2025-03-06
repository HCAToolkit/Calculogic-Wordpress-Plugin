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

namespace Calculogic\Admin;

class Calculogic_Admin {

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        // Hook into the admin_menu action
        add_action('admin_menu', [$this, 'add_plugin_admin_menu']);
    }

    public function enqueue_styles() {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/calculogic-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'calculogic-builder', plugin_dir_url( __FILE__ ) . 'css/calculogic-builder.css', array(), $this->version, 'all' );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/calculogic-admin.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( 'calculogic-form-builder', plugin_dir_url( __FILE__ ) . 'js/calculogic-form-builder.js', array( 'jquery' ), $this->version, true );
        wp_enqueue_script( 'form-builder', 'https://cdnjs.cloudflare.com/ajax/libs/formBuilder/3.6.1/form-builder.min.js', array( 'jquery' ), '3.6.1', true );
    }

    public function add_plugin_admin_menu() {
        // Top-level menu
        add_menu_page(
            'Calculogic',
            'Calculogic',
            'manage_options',
            'calculogic',
            array( $this, 'display_plugin_admin_page' ),
            'dashicons-feedback',
            6
        );

        // Submenu for settings
        add_submenu_page(
            'calculogic',
            'Settings',
            'Settings',
            'manage_options',
            'calculogic-settings',
            array( $this, 'display_plugin_admin_page' )
        );
    }

    public function display_plugin_admin_page() {
        include_once 'partials/calculogic-admin-display.php';
    }

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
