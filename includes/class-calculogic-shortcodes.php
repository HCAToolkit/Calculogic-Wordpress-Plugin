<?php

namespace Calculogic\Includes;

class Calculogic_Shortcodes {

    public static function register_shortcodes() {
        add_shortcode('calculogic_form_builder', array(__CLASS__, 'render_form_builder_shortcode'));
    }

    public static function render_form_builder_shortcode($atts) {
        // Render the form builder
        ob_start();
        ?>
        <div class="calculogic-form-builder">
            <form id="calculogic-form" method="post" action="">
                <div id="calculogic-form-builder">
                    <!-- Add form elements here -->
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea><br><br>
                </div>
                <input type="hidden" id="calculogic_form_data" name="calculogic_form_data" value="">
                <?php wp_nonce_field('calculogic_form_nonce_action', 'calculogic_form_nonce'); ?>
                <button type="submit" name="calculogic_form_submit" class="button button-primary">Save Form</button>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
}