<?php

namespace Calculogic\Includes;

class Calculogic_Builder {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_builder_menu'));
    }

    public function add_builder_menu() {
        add_menu_page(
            'Calculogic Builder',
            'Calculogic Builder',
            'manage_options',
            'calculogic-builder',
            array($this, 'display_builder_page'),
            'dashicons-welcome-widgets-menus',
            6
        );

        add_submenu_page(
            'calculogic-builder',
            'Build',
            'Build',
            'manage_options',
            'calculogic-build',
            array($this, 'display_build_tab')
        );

        add_submenu_page(
            'calculogic-builder',
            'Calculogic/Workflow',
            'Calculogic/Workflow',
            'manage_options',
            'calculogic-workflow',
            array($this, 'display_workflow_tab')
        );

        add_submenu_page(
            'calculogic-builder',
            'View',
            'View',
            'manage_options',
            'calculogic-view',
            array($this, 'display_view_tab')
        );

        add_submenu_page(
            'calculogic-builder',
            'Results/Knowledge',
            'Results/Knowledge',
            'manage_options',
            'calculogic-results',
            array($this, 'display_results_tab')
        );
    }

    public function display_builder_page() {
        echo '<h1>Calculogic Builder</h1>';
    }

    public function display_build_tab() {
        include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-build-tab.php';
    }

    public function display_workflow_tab() {
        include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-workflow-tab.php';
    }

    public function display_view_tab() {
        include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-view-tab.php';
    }

    public function display_results_tab() {
        include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-results-tab.php';
    }
}