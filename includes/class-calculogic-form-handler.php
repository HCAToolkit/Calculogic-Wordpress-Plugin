<?php

namespace Calculogic\Includes;

class Calculogic_Form_Handler {

    public static function handle_form_submission() {
        if (isset($_POST['calculogic_form_submit'])) {
            // Verify nonce
            if (!isset($_POST['calculogic_form_nonce']) || !wp_verify_nonce($_POST['calculogic_form_nonce'], 'calculogic_form_nonce_action')) {
                return;
            }

            // Sanitize and process form data
            $form_data = array_map('sanitize_text_field', $_POST['calculogic_form_data']);

            // Save form data to the database or perform other actions
            // ...

            // Redirect or display a success message
            wp_redirect(add_query_arg('form_submitted', 'true', wp_get_referer()));
            exit;
        }
    }
}