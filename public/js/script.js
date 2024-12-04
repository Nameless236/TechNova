function validateForm() {
    let isValid = true;
    let errorMessage = '';

    const title = document.getElementById('title');
    if (title.value.trim() === '') {
        title.classList.add('is-invalid');
        errorMessage += 'Title is required.\n';
        isValid = false;
    } else {
        title.classList.remove('is-invalid');
    }

    const description = document.getElementById('description');
    if (description.value.trim() === '') {
        description.classList.add('is-invalid');
        errorMessage += 'Description is required.\n';
        isValid = false;
    } else if (description.value.length < 50) {
        description.classList.add('is-invalid');
        errorMessage += 'Description must be at least 50 characters.\n';
        isValid = false;
    } else {
        description.classList.remove('is-invalid');
    }

    const image = document.getElementById('image');
    if (image.files.length === 0) {
        image.classList.add('is-invalid');
        errorMessage += 'Image is required.\n';
        isValid = false;
    } else {
        const fileType = image.files[0].type;
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!validTypes.includes(fileType)) {
            image.classList.add('is-invalid');
            errorMessage += 'Only JPEG, JPG, PNG, and GIF files are allowed.\n';
            isValid = false;
        } else {
            image.classList.remove('is-invalid');
        }
    }

    if (!isValid) {
        alert(errorMessage);
    }
}

function confirmDelete(programId) {
    if (confirm('Are you sure you want to delete this program?')) {
        document.getElementById('deleteForm-' + programId).submit();
    }
}
