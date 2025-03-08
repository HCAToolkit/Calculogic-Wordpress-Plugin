<?php

namespace Calculogic\Includes;

class Calculogic_Shortcodes {

    public static function register_shortcodes() {
        add_shortcode('calculogic_form_builder', array(__CLASS__, 'render_form_builder_shortcode'));
    }

    public static function render_form_builder_shortcode($atts) {
        // Enqueue necessary scripts and styles for the public version
        wp_enqueue_style('calculogic-builder-public', plugin_dir_url(__FILE__) . '../public/css/calculogic-frontend-builder.css', array(), '1.0.0', 'all');
        wp_enqueue_script('form-builder', 'https://cdnjs.cloudflare.com/ajax/libs/formBuilder/3.6.1/form-builder.min.js', array('jquery'), '3.6.1', true);
        wp_enqueue_script('calculogic-form-builder-public', plugin_dir_url(__FILE__) . '../public/js/calculogic-form-builder-public.js', array('jquery', 'form-builder'), '1.0.0', true);

        // Render the form builder
        ob_start();
        ?>
        <div class="wrap">
            <h1>Calculogic Builder</h1>
            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_url( add_query_arg('tab', 'build') ); ?>"
                   class="nav-tab <?php echo self::get_active_tab() === 'build' ? 'nav-tab-active' : ''; ?>">
                   Build
                </a>
                <a href="<?php echo esc_url( add_query_arg('tab', 'workflow') ); ?>"
                   class="nav-tab <?php echo self::get_active_tab() === 'workflow' ? 'nav-tab-active' : ''; ?>">
                   Calculogic/Workflow
                </a>
                <a href="<?php echo esc_url( add_query_arg('tab', 'view') ); ?>"
                   class="nav-tab <?php echo self::get_active_tab() === 'view' ? 'nav-tab-active' : ''; ?>">
                   View
                </a>
                <a href="<?php echo esc_url( add_query_arg('tab', 'results') ); ?>"
                   class="nav-tab <?php echo self::get_active_tab() === 'results' ? 'nav-tab-active' : ''; ?>">
                   Results/Knowledge
                </a>
            </h2>

            <div class="tab-content">
                <?php self::display_tab_content(); ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    private static function get_active_tab() {
        return isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'build';
    }

    private static function display_tab_content() {
        $tab = self::get_active_tab();

        switch ($tab) {
            case 'workflow':
                include_once plugin_dir_path(__FILE__) . '../public/partials/calculogic-workflow-tab.php';
                break;
            case 'view':
                include_once plugin_dir_path(__FILE__) . '../public/partials/calculogic-view-tab.php';
                break;
            case 'results':
                include_once plugin_dir_path(__FILE__) . '../public/partials/calculogic-results-tab.php';
                break;
            case 'build':
            default:
                include_once plugin_dir_path(__FILE__) . '../public/partials/calculogic-build-tab.php';
                break;
        }
    }
}