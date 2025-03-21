// This file contains JavaScript code for the Calculogic dashboard widget.
// It handles user interactions for creating, saving, editing, and deleting forms.

document.addEventListener('DOMContentLoaded', function() {
    const formContainer = document.getElementById('calculogic-form-container');
    const formList = document.getElementById('calculogic-form-list');
    const formTitleInput = document.getElementById('form-title');
    const formIdInput = document.getElementById('form-id');
    const saveButton = document.getElementById('save-form');
    const deleteButton = document.getElementById('delete-form');

    let forms = [];

    function renderForms() {
        formList.innerHTML = '';
        forms.forEach(form => {
            const listItem = document.createElement('li');
            listItem.textContent = form.title;
            listItem.dataset.id = form.id;
            listItem.addEventListener('click', () => loadForm(form.id));
            formList.appendChild(listItem);
        });
    }

    function loadForm(id) {
        const form = forms.find(f => f.id === id);
        if (form) {
            formTitleInput.value = form.title;
            formIdInput.value = form.id;
        }
    }

    saveButton.addEventListener('click', () => {
        const title = formTitleInput.value;
        const id = formIdInput.value;

        if (id) {
            const formIndex = forms.findIndex(f => f.id === id);
            if (formIndex > -1) {
                forms[formIndex].title = title;
            }
        } else {
            const newForm = {
                id: Date.now().toString(),
                title: title
            };
            forms.push(newForm);
        }

        formTitleInput.value = '';
        formIdInput.value = '';
        renderForms();
    });

    deleteButton.addEventListener('click', () => {
        const id = formIdInput.value;
        forms = forms.filter(form => form.id !== id);
        formTitleInput.value = '';
        formIdInput.value = '';
        renderForms();
    });
});