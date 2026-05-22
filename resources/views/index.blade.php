@extends('layout')

@section('contenido')
    <div class="sliderimagen">
        <button class="anterior" onclick="cambiarImagen(-1)">❮</button>

        <img class="slide active" src="{{ asset('img/a.png') }}" alt="Slide 1">
        <img class="slide" src="{{ asset('img/b.png') }}" alt="Slide 2">
        <img class="slide" src="{{ asset('img/c.png') }}" alt="Slide 3">

        <button class="siguiente" onclick="cambiarImagen(1)">❯</button>
    </div>


    <section class="seccion-categorias">
        <h2 class="titulo-seccion">CATEGORÍAS</h2>

        <div class="contenedor-mosaico">

            <a href="{{ url('/category/maquillaje') }}" class="item-categoria">
                <img src="{{ asset('img/maqui.jpg') }}" alt="Maquillaje">
                <div class="overlay-texto">MAQUILLAJE</div>
            </a>

            <a href="{{ url('/category/facial') }}" class="item-categoria">
                <img src="{{ asset('img/facial.png') }}" alt="Skincare">
                <div class="overlay-texto">SKINCARE</div>
            </a>

            <a href="{{ url('/category/cabello') }}" class="item-categoria">
                <img src="{{ asset('img/cabello.jpg') }}" alt="Cabello">
                <div class="overlay-texto">CABELLO</div>
            </a>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="{{ asset('slider.js') }}"></script>
@endpush
