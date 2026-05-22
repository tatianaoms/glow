<!DOCTYPE html>
<html lang="es">

<head>
    <title>Prueba de Conexión</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Administración de Usuarios') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                    <h1 class="text-2xl font-bold mb-4">Usuarios Registrados</h1>

                    <table border="1" cellpadding="10"
                        class="w-full min-w-full divide-y divide-gray-200 border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left font-bold">Nombre</th>
                                <th class="text-left font-bold">Email</th>
                                <th class="text-left font-bold">Rol actual</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-2">{{ $user->name }}</td>
                                    <td class="py-2">{{ $user->email }}</td>
                                    <td class="py-2">
                                        <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST"
                                            class="flex items-center gap-2">
                                            @csrf
                                            <select name="role" onchange="this.form.submit()"
                                                class="text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-1 px-2">
                                                <option value="Admin" {{ $user->hasRole('Admin') ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="Editor" {{ $user->hasRole('Editor') ? 'selected' : '' }}>
                                                    Editor</option>
                                                <option value="Usuario"
                                                    {{ $user->hasRole('Usuario') ? 'selected' : '' }}>Usuario</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
