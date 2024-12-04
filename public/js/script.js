document.addEventListener('DOMContentLoaded', function () {
    const mainForm = document.querySelector('form#programForm');
    const contactForm = document.querySelector('form#contactForm');

    if (mainForm) {
        mainForm.addEventListener('submit', function (event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            if (!validateFormContact()) {
                event.preventDefault();
            }
        });
    }
});

function validateForm() {
    let isValid = true;

    document.querySelectorAll('.error-message').forEach(el => el.remove());

    const title = document.getElementById('title');
    if (title.value.trim() === '') {
        title.classList.add('is-invalid');
        showError(title, 'Title is required.');
        isValid = false;
    } else {
        title.classList.remove('is-invalid');
    }

    const description = document.getElementById('description');
    if (description.value.trim() === '') {
        description.classList.add('is-invalid');
        showError(description, 'Description is required.');
        isValid = false;
    } else if (description.value.length < 50) {
        description.classList.add('is-invalid');
        showError(description, 'Description must be at least 50 characters.');
        isValid = false;
    } else {
        description.classList.remove('is-invalid');
    }

    const image = document.getElementById('image');
    if (image.files.length === 0) {
        image.classList.add('is-invalid');
        showError(image, 'Image is required.');
        isValid = false;
    } else {
        const fileType = image.files[0].type;
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!validTypes.includes(fileType)) {
            image.classList.add('is-invalid');
            showError(image, 'Only JPEG, JPG, PNG, and GIF files are allowed.');
            isValid = false;
        } else {
            image.classList.remove('is-invalid');
        }
    }

    return isValid;
}

function confirmDelete(programId) {
    if (confirm('Are you sure you want to delete this program?')) {
        document.getElementById('deleteForm-' + programId).submit();
    }
}

function validateFormContact() {
    let isValid = true;
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const message = document.getElementById('message');

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(el => el.remove());

    // Name validation
    if (name.value.trim() === '') {
        isValid = false;
        showError(name, 'Name is required.');
    }

    // Email validation
    if (email.value.trim() === '') {
        isValid = false;
        showError(email, 'Email is required.');
    } else if (!validateEmail(email.value)) {
        isValid = false;
        showError(email, 'Invalid email format.');
    }

    // Message validation
    if (message.value.trim() === '') {
        isValid = false;
        showError(message, 'Message is required.');
    }

    return isValid;
}

function showError(input, message) {
    const error = document.createElement('div');
    error.className = 'error-message text-danger';
    error.innerText = message;
    input.parentElement.appendChild(error);
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
