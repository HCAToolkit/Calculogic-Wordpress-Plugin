<?php

namespace Calculogic\Includes;

class Calculogic {

    public function __construct() {
        add_action('init', [$this, 'register_widgets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
    }

    public function register_widgets() {
        require_once plugin_dir_path(__FILE__) . 'widgets/class-calculogic-form-widget.php';
        register_widget('Calculogic_Form_Widget');
    }

    public function enqueue_admin_scripts() {
        wp_enqueue_style('calculogic-widget-styles', plugin_dir_url(__FILE__) . '../assets/css/widget-styles.css');
        wp_enqueue_script('calculogic-widget-scripts', plugin_dir_url(__FILE__) . '../assets/js/widget-scripts.js', ['jquery'], null, true);
    }

    // Additional methods for managing forms can be added here
}