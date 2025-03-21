<?php

/**
 * Fired during plugin activation
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package Calculogic
 */

namespace Calculogic\Includes;

class Calculogic_Activator {

    /**
     * Activation method.
     */
    public static function activate() {
        self::create_forms_table();
        self::set_default_options();
    }

    /**
     * Create the forms table in the database.
     */
    private static function create_forms_table() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'calculogic_forms';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            title tinytext NOT NULL,
            content text NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    /**
     * Set default options for the plugin.
     */
    private static function set_default_options() {
        // Set default options if needed
        // For example: add_option('calculogic_default_option', 'value');
    }
}