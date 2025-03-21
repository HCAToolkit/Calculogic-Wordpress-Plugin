<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.hcatoolkit.com
 * @since      1.0.0
 *
 * @package    Calculogic
 * @subpackage Calculogic/public/partials
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

<div class="calculogic-dashboard">
    <h2><?php _e('Manage Your Forms', 'calculogic'); ?></h2>
    <div id="calculogic-form-builder"></div>
    <button id="save-form" class="button button-primary"><?php _e('Save Form', 'calculogic'); ?></button>
    <button id="delete-form" class="button button-secondary"><?php _e('Delete Form', 'calculogic'); ?></button>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        if (typeof $.fn.formBuilder !== 'undefined') {
            var formBuilder = $('#calculogic-form-builder').formBuilder();

            $('#save-form').on('click', function() {
                var formData = formBuilder.actions.getData('json');
                console.log('Form saved:', formData);
                alert('<?php _e('Form saved successfully!', 'calculogic'); ?>');
            });

            $('#delete-form').on('click', function() {
                if (confirm('<?php _e('Are you sure you want to delete this form?', 'calculogic'); ?>')) {
                    formBuilder.actions.clearFields();
                    alert('<?php _e('Form deleted successfully!', 'calculogic'); ?>');
                }
            });
        } else {
            console.error('formBuilder is not loaded');
        }
    });
</script>