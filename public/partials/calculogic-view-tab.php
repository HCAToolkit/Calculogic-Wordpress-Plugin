<div class="wrap">
    <h1>View (Styling)</h1>
    <form id="calculogic-view-form" method="post" action="">
        <div id="calculogic-view-interface">
            <!-- Styling panel to control colors, fonts, spacing, icons, and general layout -->
            <label for="color">Color:</label>
            <input type="color" id="color" name="color"><br><br>

            <label for="font">Font:</label>
            <input type="text" id="font" name="font" placeholder="Font"><br><br>

            <label for="spacing">Spacing:</label>
            <input type="text" id="spacing" name="spacing" placeholder="Spacing"><br><br>

            <label for="icon">Icon:</label>
            <input type="text" id="icon" name="icon" placeholder="Icon"><br><br>
        </div>
        <input type="hidden" id="calculogic_view_data" name="calculogic_view_data" value="">
        <?php wp_nonce_field('calculogic_view_nonce_action', 'calculogic_view_nonce'); ?>
        <button type="submit" name="calculogic_view_submit" class="button button-primary">Save Styling</button>
    </form>
</div>