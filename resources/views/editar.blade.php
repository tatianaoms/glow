@extends('layout')

@section('contenido')
    <h2 class="titulo-seccion">EDITAR TU TIP</h2>

    <div class="container-formulario">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-glow">
            @csrf
            @method('PUT')

            <div class="campo">
                <label>TÍTULO DEL TIP:</label>
                <input type="text" name="title" class="input-glow" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="campo">
                <label>DESCRIPCIÓN:</label>
                <div class="editor-wrapper">
                    <textarea id="conte" name="content">{{ old('content', $post->content) }}</textarea>
                </div>
            </div>

            <div class="campo">
                <label>CATEGORÍA:</label>
                <select name="category" class="select-glow" required>
                    <option value="CUIDADO FACIAL" {{ $post->category == 'CUIDADO FACIAL' ? 'selected' : '' }}>CUIDADO
                        FACIAL</option>
                    <option value="MAQUILLAJE" {{ $post->category == 'MAQUILLAJE' ? 'selected' : '' }}>MAQUILLAJE</option>
                    <option value="CABELLO" {{ $post->category == 'CABELLO' ? 'selected' : '' }}>CABELLO</option>
                </select>
            </div>

            <button type="submit" class="btn-global">GUARDAR CAMBIOS</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('main.js') }}"></script>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            if (typeof tinymce !== 'undefined' && tinymce.get('conte')) {
                tinymce.get('conte').save();
            }
        });
    </script>
@endpush
