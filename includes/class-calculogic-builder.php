<?php

namespace Calculogic\Includes;

class Calculogic_Builder {

    public function __construct() {
        // Hook the submenu creation into admin_menu
        add_action('admin_menu', array($this, 'add_builder_menu'));
    }

    /**
     * Add a submenu page under the "Calculogic" top-level menu
     */
    public function add_builder_menu() {
        add_submenu_page(
            'calculogic',           // Parent slug (matches top-level menu slug)
            'Calculogic Builder',   // Page title
            'Builder',              // Submenu title
            'manage_options',       // Capability
            'calculogic-builder',   // Submenu slug
            array($this, 'display_builder_page') // Callback
        );
    }

    /**
     * The callback for our "Builder" submenu
     */
    public function display_builder_page() {
        ?>
        <div class="wrap">
            <h1>Calculogic Builder</h1>
            <h2 class="nav-tab-wrapper">
                <a href="?page=calculogic-builder&tab=build"
                   class="nav-tab <?php echo $this->get_active_tab() === 'build' ? 'nav-tab-active' : ''; ?>">
                   Build
                </a>
                <a href="?page=calculogic-builder&tab=workflow"
                   class="nav-tab <?php echo $this->get_active_tab() === 'workflow' ? 'nav-tab-active' : ''; ?>">
                   Calculogic/Workflow
                </a>
                <a href="?page=calculogic-builder&tab=view"
                   class="nav-tab <?php echo $this->get_active_tab() === 'view' ? 'nav-tab-active' : ''; ?>">
                   View
                </a>
                <a href="?page=calculogic-builder&tab=results"
                   class="nav-tab <?php echo $this->get_active_tab() === 'results' ? 'nav-tab-active' : ''; ?>">
                   Results/Knowledge
                </a>
            </h2>

            <div class="tab-content">
                <?php $this->display_tab_content(); ?>
            </div>
        </div>
        <?php
    }

    private function get_active_tab() {
        return isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'build';
    }

    private function display_tab_content() {
        $tab = $this->get_active_tab();

        switch ($tab) {
            case 'workflow':
                include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-workflow-tab.php';
                break;
            case 'view':
                include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-view-tab.php';
                break;
            case 'results':
                include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-results-tab.php';
                break;
            case 'build':
            default:
                include_once plugin_dir_path(__FILE__) . '../admin/partials/calculogic-build-tab.php';
                break;
        }
    }
}