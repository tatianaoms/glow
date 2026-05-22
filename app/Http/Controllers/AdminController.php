<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <--- Importamos esto

class AdminController extends Controller
{
    public function index()
    {
        // Usamos Auth::user() para evitar el error de Intelephense
        if (Auth::user() && Auth::user()->role !== 'admin') {
            return redirect('/tips')->with('error', 'Acceso denegado.');
        }

        $usuarios = User::all();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function updateRole(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->role = $request->role;
        $usuario->save();

        return back()->with('success', 'Rol actualizado con éxito.');
    }

    public function storeUser(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Crear el usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Usuario creado con éxito.');
    }

    public function deleteUser($id)
    {
        $usuario = User::findOrFail($id);


        if ($usuario->id === auth()->id()) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta desde aquí.');
        }

        $usuario->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
