<?php

namespace Calculogic\Includes;

use Calculogic\Admin\Calculogic_Admin;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.hcatoolkit.com
 * @since      1.0.0
 *
 * @package    Calculogic
 * @subpackage Calculogic/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Calculogic
 * @subpackage Calculogic/includes
 * @author     H-CAT <yuri.bara.karmas.sin@gmail.com>
 */
class Calculogic {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if ( defined( 'CALCULOGIC_VERSION' ) ) {
            $this->version = CALCULOGIC_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'calculogic';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-i18n.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-calculogic-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-calculogic-public.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-cpt.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-shortcodes.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-form-handler.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-workflow.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-enneagram.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-calculogic-builder.php';

        $this->loader = new \Calculogic\Includes\Calculogic_Loader();
    }

    private function set_locale() {
        $plugin_i18n = new \Calculogic\Includes\Calculogic_i18n();
        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
    }

    private function define_admin_hooks() {
        $plugin_admin = new Calculogic_Admin( $this->get_plugin_name(), $this->get_version() );
        $plugin_builder = new \Calculogic\Includes\Calculogic_Builder();

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
        $this->loader->add_action( 'admin_menu', $plugin_builder, 'add_builder_menu' );
        $this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );

        // Add meta boxes
        $this->loader->add_action( 'add_meta_boxes', '\Calculogic\Includes\Calculogic_CPT', 'add_meta_boxes' );
        $this->loader->add_action( 'save_post', '\Calculogic\Includes\Calculogic_CPT', 'save_meta_boxes' );
    }

    private function define_public_hooks() {
        $plugin_public = new \Calculogic\Public\Calculogic_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

        // Register shortcodes
        $this->loader->add_action( 'init', '\Calculogic\Includes\Calculogic_Shortcodes', 'register_shortcodes' );

        // Handle form submissions
        $this->loader->add_action( 'init', '\Calculogic\Includes\Calculogic_Form_Handler', 'handle_form_submission' );

        // Enqueue public scripts
        $this->loader->add_action( 'wp_enqueue_scripts', $this, 'enqueue_public_scripts' );
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }

    public function enqueue_public_scripts() {
        wp_enqueue_style('calculogic-builder-public', plugin_dir_url(__FILE__) . '../public/css/calculogic-frontend-builder.css', array(), '1.0.0', 'all');
        wp_enqueue_script('form-builder', 'https://cdnjs.cloudflare.com/ajax/libs/formBuilder/3.6.1/form-builder.min.js', array('jquery'), '3.6.1', true);
        wp_enqueue_script('calculogic-form-builder-public', plugin_dir_url(__FILE__) . '../public/js/calculogic-form-builder-public.js', array('jquery', 'form-builder'), '1.0.0', true);
    }
}
