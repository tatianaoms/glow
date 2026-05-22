<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {

        $users = \App\Models\User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }
    public function updateRole(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->syncRoles($request->role);

        return redirect()->back()->with('success', 'Rol actualizado con éxito');
    }
}
