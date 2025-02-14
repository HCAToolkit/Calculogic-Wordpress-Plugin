<?php
/**
 * Calculogic Main Class
 *
 * This class handles the initialization, activation, and deactivation of the Calculogic plugin.
 * It also registers custom post types or tables for form data.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Calculogic {

    public function __construct() {
        // Hook into the activation and deactivation events
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        // Initialize the plugin
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public function activate() {
        // Code to run on plugin activation
        // For example, create custom database tables or options
    }

    public function deactivate() {
        // Code to run on plugin deactivation
        // For example, clean up options or data
    }

    public function init() {
        // Load necessary files and initialize components
        $this->load_dependencies();
    }

    private function load_dependencies() {
        // Include the form builder class
        require_once plugin_dir_path( __FILE__ ) . 'class-calculogic-form-builder.php';
    }
}

// Initialize the plugin
new Calculogic();