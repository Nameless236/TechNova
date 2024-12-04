document.addEventListener('DOMContentLoaded', function () {
    const mainForm = document.querySelector('form#programForm');
    const contactForm = document.querySelector('form#contactForm');

    if (mainForm) {
        const changeImageCheckbox = document.getElementById('change-image');
        const fileInput = document.getElementById('image');

        if (changeImageCheckbox) {
            changeImageCheckbox.addEventListener('change', function () {
                fileInput.disabled = !this.checked;
            });
        }

        mainForm.addEventListener('input', function (event) {
            validateField(event.target);
        });

        mainForm.addEventListener('submit', function (event) {
            if (changeImageCheckbox == null) {
                event.preventDefault();
                if (validateFormProgram()) {
                    mainForm.submit();
                }
            } else {
                if (changeImageCheckbox.checked) {
                    event.preventDefault();
                    if (validateFormProgram()) {
                        mainForm.submit();
                    }
                }
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('input', function (event) {
            validateField(event.target);
        });

        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();
            if (validateFormContact()) {
                contactForm.submit();
            }
        });
    }
});

function validateField(field) {
    const errorMessages = {
        title: 'Title is required.',
        description: 'Description is required.',
        descriptionLength: 'Description must be at least 50 characters.',
        image: 'Image is required.',
        imageType: 'Only JPEG, JPG, PNG, and GIF files are allowed.',
        name: 'Name is required.',
        email: 'Email is required.',
        emailInvalid: 'Invalid email format.',
        message: 'Message is required.'
    };

    let isValid = true;
    let errorMessage = '';

    if (field.id === 'title' && field.value.trim() === '') {
        isValid = false;
        errorMessage = errorMessages.title;
    } else if (field.id === 'description') {
        if (field.value.trim() === '') {
            isValid = false;
            errorMessage = errorMessages.description;
        } else if (field.value.length < 50) {
            isValid = false;
            errorMessage = errorMessages.descriptionLength;
        }
    } else if (field.id === 'image') {
        if (field.files.length === 0) {
            isValid = false;
            errorMessage = errorMessages.image;
        } else {
            const fileType = field.files[0].type;
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validTypes.includes(fileType)) {
                isValid = false;
                errorMessage = errorMessages.imageType;
            }
        }
    } else if (field.id === 'name' && field.value.trim() === '') {
        isValid = false;
        errorMessage = errorMessages.name;
    } else if (field.id === 'email') {
        if (field.value.trim() === '') {
            isValid = false;
            errorMessage = errorMessages.email;
        } else if (!validateEmail(field.value)) {
            isValid = false;
            errorMessage = errorMessages.emailInvalid;
        }
    } else if (field.id === 'message' && field.value.trim() === '') {
        isValid = false;
        errorMessage = errorMessages.message;
    }

    if (!isValid) {
        showError(field, errorMessage);
    } else {
        clearError(field);
    }

    return isValid;
}

function validateFormProgram() {
    let isValid = true;

    document.querySelectorAll('.error-message').forEach(el => el.remove());

    const fields = ['title', 'description', 'image'];
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (!validateField(field)) {
            isValid = false;
        }
    });

    return isValid;
}

function validateFormContact() {
    let isValid = true;

    document.querySelectorAll('.error-message').forEach(el => el.remove());

    const fields = ['name', 'email', 'message'];
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (!validateField(field)) {
            isValid = false;
        }
    });

    return isValid;
}

function showError(input, message) {
    clearError(input);
    const error = document.createElement('div');
    error.className = 'error-message text-danger';
    error.innerText = message;
    input.parentElement.appendChild(error);
    input.classList.add('is-invalid');
}

function clearError(input) {
    const error = input.parentElement.querySelector('.error-message');
    if (error) {
        error.remove();
    }
    input.classList.remove('is-invalid');
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
