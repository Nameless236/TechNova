@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">User Management</h2>

        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by name or email...">
            </div>
            <div class="col-md-3">
                <select id="roleFilter" class="form-select">
                    <option value="">All Roles</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover" id="usersTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('additional_scripts')
    <script src="{{ asset('js/user-management.js') }}"></script>
@endsection
