@extends('layout')

@section('contenido')
    <div class="admin-container">
        <h2>Gestión de Usuarios y Permisos</h2>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-form">
            <h3>Agregar nuevo usuario</h3>
            <form action="{{ route('admin.storeUser') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <select name="role">
                    <option value="user">Usuario</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit">Crear Usuario</button>
            </form>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol y Permisos</th>
                    <th>Cambiar Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <strong>{{ ucfirst($user->role) }}</strong>
                            <br>
                            <small>
                                @if ($user->role == 'admin')
                                    Acceso total: ver, editar y eliminar.
                                @else
                                    Acceso limitado: solo puede ver.
                                @endif
                            </small>
                        </td>
                        <td>
                            <form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" onchange="this.form.submit()">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás segura de eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
