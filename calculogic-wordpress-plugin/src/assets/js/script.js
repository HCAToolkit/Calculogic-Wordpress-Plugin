// filepath: /calculogic-wordpress-plugin/calculogic-wordpress-plugin/src/assets/js/script.js
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the drag-and-drop interface
    const formBuilder = document.getElementById('calculogic-form-builder');
    if (formBuilder) {
        // Add event listeners for drag-and-drop functionality
        formBuilder.addEventListener('dragover', function(event) {
            event.preventDefault();
        });

        formBuilder.addEventListener('drop', function(event) {
            event.preventDefault();
            const data = event.dataTransfer.getData('text/plain');
            const newElement = document.createElement('div');
            newElement.className = 'form-field';
            newElement.textContent = data; // Placeholder for the field type
            formBuilder.appendChild(newElement);
        });
    }

    // Function to handle form submission
    const form = document.getElementById('calculogic-form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Perform validation and submission logic here
            alert('Form submitted!');
        });
    }
});