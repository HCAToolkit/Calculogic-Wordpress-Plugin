<?php

namespace Calculogic\Includes;

class Calculogic_Shortcodes {

    public static function register_shortcodes() {
        add_shortcode('calculogic_form_builder', array(__CLASS__, 'render_form_builder_shortcode'));
    }

    public static function render_form_builder_shortcode($atts) {
        // Enqueue necessary scripts and styles
        wp_enqueue_style('calculogic-builder', plugin_dir_url(__FILE__) . '../admin/css/calculogic-builder.css', array(), '1.0.0', 'all');
        wp_enqueue_script('calculogic-form-builder', plugin_dir_url(__FILE__) . '../admin/js/calculogic-form-builder.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('form-builder', 'https://cdnjs.cloudflare.com/ajax/libs/formBuilder/3.6.1/form-builder.min.js', array('jquery'), '3.6.1', true);

        // Render the form builder
        ob_start();
        ?>
        <div class="calculogic-form-builder">
            <div id="calculogic-form-builder"></div>
        </div>
        <?php
        return ob_get_clean();
    }
}