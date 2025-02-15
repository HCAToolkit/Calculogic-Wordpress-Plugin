(function( $ ) {
    'use strict';

    $(document).ready(function() {
        // Initialize the form builder
        var formBuilder = $('#calculogic-form-builder').formBuilder();

        // Save form data
        $('#save-form').on('click', function() {
            var formData = formBuilder.actions.getData('json');
            $('#calculogic_form_data').val(formData);
            $('#calculogic-form').submit();
        });
    });

})( jQuery );