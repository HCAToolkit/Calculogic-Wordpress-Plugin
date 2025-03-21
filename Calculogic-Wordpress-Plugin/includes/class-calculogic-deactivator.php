<?php

namespace Calculogic\Includes;

class Calculogic_Deactivator {

    public static function deactivate() {
        // Clean up options or data when the plugin is deactivated
        // For example, you might want to remove options set during activation
        delete_option('calculogic_options');
    }
}