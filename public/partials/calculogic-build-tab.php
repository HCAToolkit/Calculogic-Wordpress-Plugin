<div class="wrap">
    <h1>Build Form/Quiz</h1>
    <form id="calculogic-build-form" method="post" action="">
        <div class="calculogic-builder-wrapper">
            <div class="calculogic-builder-header">
                <h2>Form Builder</h2>
            </div>

            <div class="calculogic-builder-body">
                <!-- Left sidebar with draggable fields -->
                <aside class="calculogic-builder-sidebar">
                    <h3>Available Fields</h3>
                    <ul class="calculogic-fields-list">
                        <li draggable="true" data-field-type="text">Text Field</li>
                        <li draggable="true" data-field-type="number">Number Field</li>
                        <li draggable="true" data-field-type="checkbox">Checkbox</li>
                    </ul>
                </aside>

                <!-- Main content area (drop zone) -->
                <main class="calculogic-builder-main">
                    <h3>Drag Fields Here</h3>
                    <div class="calculogic-dropzone">
                        <!-- When a field is dropped, create a new field block here. -->
                    </div>
                </main>

                <!-- Right panel for field settings (optional) -->
                <section class="calculogic-builder-settings">
                    <h3>Field Settings</h3>
                    <div class="settings-panel">
                        <p>Select a field to configure its properties</p>
                    </div>
                </section>
            </div>
        </div>
        <input type="hidden" id="calculogic_form_data" name="calculogic_form_data" value="">
        <?php wp_nonce_field('calculogic_form_nonce_action', 'calculogic_form_nonce'); ?>
        <button type="submit" name="calculogic_form_submit" class="button button-primary">Save Form</button>
    </form>
</div>