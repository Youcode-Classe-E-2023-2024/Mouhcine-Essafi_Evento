<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $users = User::all();
        $roles = Role::all();
        return view('dashboard.users', compact('users', 'roles'));
    }

    public function assign(Request $request)
    {
    $user = User::findOrFail($request->user_id);
    $role = Role::findById($request->role_id);

    if (!$role) {
        return back()->withErrors(['role' => 'Role does not exist.']);
    }

    $user->syncRoles($role);

    return back()->with('success', 'Role assigned successfully!');
    }
}
