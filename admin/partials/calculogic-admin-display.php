<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.hcatoolkit.com
 * @since      1.0.0
 *
 * @package    Calculogic
 * @subpackage Calculogic/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1>Calculogic Settings</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields('calculogic_options');
            do_settings_sections('calculogic');
            submit_button();
        ?>
    </form>
</div>
