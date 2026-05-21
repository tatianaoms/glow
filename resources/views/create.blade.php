@extends('layout')

@section('contenido')
    <h2 class="titulo-seccion">AGREGA TU TIP</h2>

    <div class="container-formulario">
        <form action="{{ route('posts.store') }}" method="POST" class="form-glow">
            @csrf

            <div class="campo">
                <label for="input_titulo">TÍTULO DEL TIP:</label>
                <input type="text" name="title" id="input_titulo" class="input-glow" required>
            </div>

            <div class="campo">
                <label for="conte">Descripción:</label>
                <div class="editor-wrapper">
                    <textarea name="content" id="conte" rows="10"></textarea>
                </div>
            </div>

            <div class="campo">
                <label for="categoria">Categoría:</label>
                <select name="category" id="categoria" class="select-glow">
                    <option value="CUIDADO FACIAL">Facial</option>
                    <option value="MAQUILLAJE">Maquillaje</option>
                    <option value="CABELLO">Cabello</option>

                </select>
            </div>

            <button type="submit" class="btn-global">GUARDAR TIP</button>
        </form>
    </div>
@endsection

{{-- Usamos push para enviar los scripts al layout solo en esta página --}}
@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('main.js') }}"></script>
@endpush
