<div class="wrap">
    <h1>Build Form/Quiz</h1>
    <form id="calculogic-build-form" method="post" action="">
        <div id="calculogic-build-interface">
            <!-- Drag-and-drop interface for adding and arranging fields/questions -->
            <div id="form-preview">
                <!-- Near-live preview of the form/quiz layout -->
            </div>
            <div id="form-elements">
                <!-- Basic field properties (labels, placeholders, etc.) -->
                <label for="field-label">Label:</label>
                <input type="text" id="field-label" name="field-label" placeholder="Field Label"><br><br>

                <label for="field-placeholder">Placeholder:</label>
                <input type="text" id="field-placeholder" name="field-placeholder" placeholder="Field Placeholder"><br><br>

                <button type="button" id="add-field">Add Field</button>
            </div>
        </div>
        <input type="hidden" id="calculogic_form_data" name="calculogic_form_data" value="">
        <?php wp_nonce_field('calculogic_form_nonce_action', 'calculogic_form_nonce'); ?>
        <button type="submit" name="calculogic_form_submit" class="button button-primary">Save Form</button>
    </form>
</div>