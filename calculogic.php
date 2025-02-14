<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.hcatoolkit.com
 * @since             1.0.0
 * @package           Calculogic
 *
 * @wordpress-plugin
 * Plugin Name:       Calculogic: Form and Quiz Suite
 * Plugin URI:        https://www.hcatoolkit.com
 * Description:       Advanced Form and Quiz Suite
 * Version:           1.0.0
 * Author:            H-CAT
 * Author URI:        https://www.hcatoolkit.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       calculogic
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Include the Composer autoloader
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CALCULOGIC_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-calculogic-activator.php
 */
function activate_calculogic() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-calculogic-activator.php';
    \Calculogic\Includes\Calculogic_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-calculogic-deactivator.php
 */
function deactivate_calculogic() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-calculogic-deactivator.php';
    \Calculogic\Includes\Calculogic_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_calculogic' );
register_deactivation_hook( __FILE__, 'deactivate_calculogic' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-calculogic.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-calculogic-cpt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_calculogic() {

    $plugin = new \Calculogic\Includes\Calculogic();
    $plugin->run();

    // Register custom post types
    add_action('init', array('\Calculogic\Includes\Calculogic_CPT', 'register_post_types'));

}
run_calculogic();