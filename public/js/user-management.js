$(document).ready(function() {
    loadUsers();

    // Search and filter functionality
    let searchTimer;
    $('#searchInput').on('keyup', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(loadUsers, 500);
    });

    $('#roleFilter').on('change', function() {
        loadUsers();
    });

    function loadUsers() {
        const searchTerm = $('#searchInput').val();
        const roleFilter = $('#roleFilter').val();

        $.ajax({
            url: '/user-management/users',
            method: 'GET',
            data: {
                search: searchTerm,
                role: roleFilter
            },
            success: function(users) {
                let tableBody = '';
                users.forEach(function(user) {
                    tableBody += `
                        <tr data-id="${user.id}">
                            <td>${user.id}</td>
                            <td class="editable" data-field="name">${user.name}</td>
                            <td class="editable" data-field="email">${user.email}</td>
                            <td>
                                <select class="form-select editable" data-field="role">
                                    <option value="user" ${user.role === 'user' ? 'selected' : ''}>User</option>
                                    <option value="admin" ${user.role === 'admin' ? 'selected' : ''}>Admin</option>
                                </select>
                            </td>
                            <td>${new Date(user.created_at).toLocaleString()}</td>
                            <td>${new Date(user.updated_at).toLocaleString()}</td>
                        </tr>
                    `;
                });
                $('#usersTable tbody').html(tableBody);
            }
        });
    }

    $(document).on('click', '.editable', function() {
        if (!$(this).is('select') && !$(this).find('input').length) {
            const value = $(this).text();
            $(this).html(`<input type="text" class="form-control" value="${value}">`);
            $(this).find('input').focus();
        }
    });

    $(document).on('blur', '.editable input', function() {
        updateUser($(this).closest('tr'));
    });

    $(document).on('change', 'select.editable', function() {
        updateUser($(this).closest('tr'));
    });

    function updateUser(row) {
        const userId = row.data('id');
        const data = {
            name: row.find('[data-field="name"]').find('input').val() || row.find('[data-field="name"]').text(),
            email: row.find('[data-field="email"]').find('input').val() || row.find('[data-field="email"]').text(),
            role: row.find('[data-field="role"]').val()
        };

        $.ajax({
            url: `/user-management/users/${userId}`,
            method: 'PUT',
            data: JSON.stringify(data),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                loadUsers();
            },
            error: function(xhr) {
                console.error('Error updating user:', xhr);
                loadUsers(); // Reload on error to reset the view
            }
        });
    }
});
