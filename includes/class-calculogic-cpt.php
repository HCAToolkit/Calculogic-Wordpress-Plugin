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
            'show_in_menu' => true,
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
            'show_in_menu' => true,
            'supports' => array('title', 'editor'),
        ));
    }
}