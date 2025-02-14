<?php
/**
 * Form Template for Calculogic Plugin
 *
 * This template is used to render forms on the front end.
 */

// Check if the form data is set
if ( isset( $form_data ) && ! empty( $form_data ) ) {
    ?>
    <form id="calculogic-form" method="post" action="">
        <?php
        // Loop through each field in the form data and render it
        foreach ( $form_data['fields'] as $field ) {
            // Render each field based on its type
            switch ( $field['type'] ) {
                case 'text':
                    echo '<label for="' . esc_attr( $field['id'] ) . '">' . esc_html( $field['label'] ) . '</label>';
                    echo '<input type="text" id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '" />';
                    break;

                case 'textarea':
                    echo '<label for="' . esc_attr( $field['id'] ) . '">' . esc_html( $field['label'] ) . '</label>';
                    echo '<textarea id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '"></textarea>';
                    break;

                case 'select':
                    echo '<label for="' . esc_attr( $field['id'] ) . '">' . esc_html( $field['label'] ) . '</label>';
                    echo '<select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '">';
                    foreach ( $field['options'] as $option ) {
                        echo '<option value="' . esc_attr( $option['value'] ) . '">' . esc_html( $option['label'] ) . '</option>';
                    }
                    echo '</select>';
                    break;

                // Add more field types as needed
            }
        }
        ?>
        <input type="submit" value="Submit" />
    </form>
    <?php
} else {
    echo '<p>No form data available.</p>';
}
?>