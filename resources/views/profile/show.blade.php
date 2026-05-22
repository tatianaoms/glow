@extends('layout')

@section('contenido')
    <div class="container" style="padding: 40px;">
        <h2>Mi Perfil</h2>
        <div class="profile-card">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Miembro desde:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
@endsection
