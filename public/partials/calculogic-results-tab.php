<div class="wrap">
    <h1>Results/Knowledge</h1>
    <form id="calculogic-results-form" method="post" action="">
        <div id="calculogic-results-interface">
            <!-- Repository for outcome data, reference materials, or “knowledge” used in quizzes/forms -->
            <label for="outcome">Outcome:</label>
            <input type="text" id="outcome" name="outcome" placeholder="Outcome"><br><br>

            <label for="reference">Reference:</label>
            <textarea id="reference" name="reference" placeholder="Reference"></textarea><br><br>
        </div>
        <input type="hidden" id="calculogic_results_data" name="calculogic_results_data" value="">
        <?php wp_nonce_field('calculogic_results_nonce_action', 'calculogic_results_nonce'); ?>
        <button type="submit" name="calculogic_results_submit" class="button button-primary">Save Results</button>
    </form>
</div>