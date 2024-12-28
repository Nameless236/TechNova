<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', User::class);

        return view('admin.user-management');
    }

    public function getUsers(Request $request)
    {
        Gate::authorize('viewAny', User::class);

        $query = User::query();

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->role) {
            $query->where('role', $request->role);
        }

        return $query->get();
    }


    public function updateUser(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
        ]);

        $user->update($validated);

        return response()->json(['message' => 'User updated successfully']);
    }
}
