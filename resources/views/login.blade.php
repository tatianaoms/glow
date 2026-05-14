@extends('layout')

@section('contenido')
    <div class="container-formulario login-especifico">
        <h2 class="titulo-login">INICIAR SESIÓN</h2>

        @if($errors->any())
            <p class="error-msg">
                {{ $errors->first() }}
            </p>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="form-glow">
            @csrf
            <div class="campo">
                <input type="text" name="email" class="input-glow" placeholder="CORREO ELECTRÓNICO" required>
            </div>
            <div class="campo">
                <input type="password" name="password" class="input-glow" placeholder="CONTRASEÑA" required>
            </div>

            <button type="submit" class="btn-global">ENTRAR</button>
        </form>
    </div>
@endsection