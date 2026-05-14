@extends('layout')

    <div class="nuevos-tips">
        @forelse($posts as $post)
            <div class="tip">
                <p class="categoria-texto">Categoría: <strong>{{ $post->category }}</strong></p>
                <h3 class="titulo-tip">{{ $post->title }}</h3>

                <div class="contenido-detalle">
                    @php
                        $content = $post->content;
                        preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $match);
                    @endphp

                    @if(!empty($match))
                        @php
                            $img_tag = $match[0];
                            $text_only = str_replace($img_tag, '', $content);
                        @endphp
                        <div class="texto-tip">{!! $text_only !!}</div>
                        <div class="imagen-tip">{!! $img_tag !!}</div>
                    @else
                        <div class="texto-tip">{!! $content !!}</div>
                    @endif
                </div>

                <small class="fecha-post">Publicado el: {{ $post->created_at->format('d/m/Y H:i') }}</small>

                @auth
                    <div class="acciones">
                        <a href="{{ route('posts.edit', $post->id) }}" class="boton-editar">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro que desea eliminar este Tip?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="boton-eliminar">Eliminar</button>
                        </form>
                    </div>
                @endauth
            </div>
            <hr class="linea-separadora">
        @empty
            <p class="mensaje-vacio">Todavía no hay tips de maquillaje publicados. <br> ¡Muy pronto!</p>
        @endforelse
    </div>
@endsection