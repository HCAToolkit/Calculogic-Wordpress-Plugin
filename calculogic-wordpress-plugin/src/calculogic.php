<?php
/**
 * Plugin Name: Calculogic
 * Description: Advanced Drag-and-Drop Form Builder Plugin for WordPress.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL2
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'CALCULOGIC_VERSION', '1.0.0' );
define( 'CALCULOGIC_DIR', plugin_dir_path( __FILE__ ) );
define( 'CALCULOGIC_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files
require_once CALCULOGIC_DIR . 'includes/class-calculogic.php';
require_once CALCULOGIC_DIR . 'includes/class-calculogic-form-builder.php';

// Initialize the plugin
function calculogic_init() {
    $calculogic = new Calculogic();
    $calculogic->run();
}
add_action( 'plugins_loaded', 'calculogic_init' );