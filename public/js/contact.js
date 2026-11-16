// contact.js - client-side validation for the Contact page
// Runs after the page loads so the form elements exist.
document.addEventListener('DOMContentLoaded', function () {

    // 1. Grab the elements we need
    var form = document.getElementById('contactForm');
    var successBox = document.getElementById('successMessage');

    // 2. One rule per field: which input, where its error goes, and its messages
    var fields = [
        { id: 'name',    errorId: 'nameError',    empty: 'Please enter your name.' },
        { id: 'email',   errorId: 'emailError',   empty: 'Please enter your email address.',
          invalid: 'Please enter a valid email address.' },
        { id: 'subject', errorId: 'subjectError', empty: 'Please enter a subject.' },
        { id: 'message', errorId: 'messageError', empty: 'Please enter your message.' }
    ];

    // Email pattern: something@something.something (no spaces)
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // 3. Show / clear an error on one field
    function showError(field, text) {
        var input = document.getElementById(field.id);
        document.getElementById(field.errorId).textContent = text;
        input.classList.add('has-error');
        input.setAttribute('aria-invalid', 'true');
    }

    function clearError(field) {
        var input = document.getElementById(field.id);
        document.getElementById(field.errorId).textContent = '';
        input.classList.remove('has-error');
        input.removeAttribute('aria-invalid');
    }

    // 4. Check one field. Returns true if it is OK, false if not.
    function validateField(field) {
        var value = document.getElementById(field.id).value.trim(); // trim = ignore spaces-only input

        if (value === '') {                               // empty field
            showError(field, field.empty);
            return false;
        }
        if (field.invalid && !emailPattern.test(value)) { // wrong email format
            showError(field, field.invalid);
            return false;
        }
        clearError(field);
        return true;
    }

    // 5. Live feedback: check a field when the user leaves it,
    //    and remove its error as soon as they start fixing it.
    fields.forEach(function (field) {
        var input = document.getElementById(field.id);
        input.addEventListener('blur', function () { validateField(field); });
        input.addEventListener('input', function () {
            if (input.classList.contains('has-error')) { validateField(field); }
            successBox.hidden = true; // hide old success banner when typing again
        });
    });

    // 6. On submit: stop the page reload, check every field
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var allValid = true;
        var firstInvalid = null;

        fields.forEach(function (field) {
            if (!validateField(field)) {
                allValid = false;
                if (!firstInvalid) { firstInvalid = document.getElementById(field.id); }
            }
        });

        if (!allValid) {
            successBox.hidden = true;
            firstInvalid.focus();        // jump to the first problem
            return;
        }

        // All fields valid: show success and reset the form
        // (no server is involved - this is a front-end class project)
        successBox.hidden = false;
        form.reset();
        successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
});
