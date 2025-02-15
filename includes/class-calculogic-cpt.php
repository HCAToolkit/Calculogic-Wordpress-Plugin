<?php

namespace Calculogic\Includes;

class Calculogic_CPT {

    public static function register_post_types() {
        // Register Form post type
        register_post_type('calculogic_form', array(
            'labels' => array(
                'name' => __('Forms', 'calculogic'),
                'singular_name' => __('Form', 'calculogic'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => 'calculogic',
            'supports' => array('title', 'editor'),
        ));

        // Register Quiz post type
        register_post_type('calculogic_quiz', array(
            'labels' => array(
                'name' => __('Quizzes', 'calculogic'),
                'singular_name' => __('Quiz', 'calculogic'),
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => 'calculogic',
            'supports' => array('title', 'editor'),
        ));
    }

    public static function add_meta_boxes() {
        add_meta_box(
            'calculogic_form_meta_box',
            __('Form Details', 'calculogic'),
            array(__CLASS__, 'render_form_meta_box'),
            'calculogic_form',
            'normal',
            'high'
        );

        add_meta_box(
            'calculogic_quiz_meta_box',
            __('Quiz Details', 'calculogic'),
            array(__CLASS__, 'render_quiz_meta_box'),
            'calculogic_quiz',
            'normal',
            'high'
        );
    }

    public static function render_form_meta_box($post) {
        // Add nonce for security and authentication.
        wp_nonce_field('calculogic_form_nonce_action', 'calculogic_form_nonce');

        // Retrieve existing value from the database.
        $form_description = get_post_meta($post->ID, '_calculogic_form_description', true);

        // Display the form, using the current value.
        echo '<label for="calculogic_form_description">' . __('Description', 'calculogic') . '</label>';
        echo '<textarea id="calculogic_form_description" name="calculogic_form_description" rows="4" cols="50">' . esc_textarea($form_description) . '</textarea>';
    }

    public static function render_quiz_meta_box($post) {
        // Add nonce for security and authentication.
        wp_nonce_field('calculogic_quiz_nonce_action', 'calculogic_quiz_nonce');

        // Retrieve existing value from the database.
        $quiz_instructions = get_post_meta($post->ID, '_calculogic_quiz_instructions', true);

        // Display the form, using the current value.
        echo '<label for="calculogic_quiz_instructions">' . __('Instructions', 'calculogic') . '</label>';
        echo '<textarea id="calculogic_quiz_instructions" name="calculogic_quiz_instructions" rows="4" cols="50">' . esc_textarea($quiz_instructions) . '</textarea>';
    }

    public static function save_meta_boxes($post_id) {
        // Check if nonce is set.
        if (!isset($_POST['calculogic_form_nonce']) || !isset($_POST['calculogic_quiz_nonce'])) {
            return $post_id;
        }

        $nonce_form = $_POST['calculogic_form_nonce'];
        $nonce_quiz = $_POST['calculogic_quiz_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce_form, 'calculogic_form_nonce_action') || !wp_verify_nonce($nonce_quiz, 'calculogic_quiz_nonce_action')) {
            return $post_id;
        }

        // Check if the user has permissions to save data.
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // Check if not an autosave.
        if (wp_is_post_autosave($post_id)) {
            return $post_id;
        }

        // Check if not a revision.
        if (wp_is_post_revision($post_id)) {
            return $post_id;
        }

        // Sanitize user input.
        $form_description = sanitize_textarea_field($_POST['calculogic_form_description']);
        $quiz_instructions = sanitize_textarea_field($_POST['calculogic_quiz_instructions']);

        // Update the meta field in the database.
        update_post_meta($post_id, '_calculogic_form_description', $form_description);
        update_post_meta($post_id, '_calculogic_quiz_instructions', $quiz_instructions);
    }
}