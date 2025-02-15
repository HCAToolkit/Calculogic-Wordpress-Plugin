<div class="wrap">
    <h1>Form Builder</h1>
    <form id="calculogic-form" method="post" action="">
        <div id="calculogic-form-builder"></div>
        <input type="hidden" id="calculogic_form_data" name="calculogic_form_data" value="">
        <?php wp_nonce_field('calculogic_form_nonce_action', 'calculogic_form_nonce'); ?>
        <button type="submit" name="calculogic_form_submit" class="button button-primary">Save Form</button>
    </form>
</div>