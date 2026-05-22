<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="{{ request()->cookie('tema_preferido') == 'dark' ? 'dark-mode' : '' }}">

    <div class="top-bar">
        ¡NUEVOS TIPS DE BELLEZA CADA SEMANA! EXPLORA TU PROPIO GLOW
    </div>

    <header class="main-header">
        <div class="container-header">
            <nav class="nav-left">
                <a href="{{ url('/') }}">INICIO</a>
                <a href="{{ url('/tips') }}">RECIENTES</a>

                <div class="dropdown">
                    <a href="#">CATEGORÍAS ▾</a>
                    <div class="dropdown-content">
                        <a href="{{ url('/category/maquillaje') }}">MAQUILLAJE</a>
                        <a href="{{ url('/category/facial') }}">SKINCARE</a>
                        <a href="{{ url('/category/cabello') }}">CABELLO</a>
                    </div>
                </div>

                @auth
                    <a href="{{ route('posts.create') }}" class="btn-publicar">PUBLICAR TIP</a>

                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.usuarios') }} ">ROLES Y PERMISOS</a>
                    @endif
                @endauth
            </nav>

            <div class="logo-central">
                <a href="{{ url('/') }}">
                    <h1 id="nuevo">GLOW</h1>
                </a>
            </div>

            <div class="nav-right" style="display: flex; align-items: center; gap: 15px;">
                @if (request()->cookie('tema_preferido') == 'dark')
                    <a href="{{ route('tema.set', 'light') }}" class="btn-tema-toggle" title="Cambiar a Modo Claro">
                        <i class="fas fa-sun"></i>
                    </a>
                @else
                    <a href="{{ route('tema.set', 'dark') }}" class="btn-tema-toggle" title="Cambiar a Modo Oscuro">
                        <i class="fas fa-moon"></i>
                    </a>
                @endif

                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout"
                            style="background:none; border:none; cursor:pointer;">SALIR</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="icon-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer class="main-footer">
        <div class="footer-banner">
            <div class="marquee">
                <span>TU BELLEZA FLORECE AQUÍ</span>
            </div>
        </div>

        <div class="footer-container">
            <div class="footer-col">
                <h3>LÍNEAS DE ATENCIÓN</h3>
                <div class="atencion-item">
                    <i class="fab fa-whatsapp"></i>
                    <p><strong>Línea Detal</strong><br>315 377 0946</p>
                </div>
                <div class="atencion-item">
                    <i class="fab fa-whatsapp"></i>
                    <p><strong>Línea Novedades</strong><br>315 377 0946</p>
                </div>
                <div class="atencion-item">
                    <i class="far fa-envelope"></i>
                    <p><strong>Correo</strong><br>glow@gmail.com</p>
                </div>
            </div>

            <div class="footer-col">
                <h3 class="mt-20">SÍGUENOS EN</h3>
                <div class="redes-bloomshell">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>POLÍTICAS</h3>
                <ul>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>MI CUENTA</h3>
                <ul>
                    @guest
                        <li><a href="{{ route('login') }}">Acceder</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    @endguest
                    @auth
                        <li><a href="{{ route('profile.show') }}">Mi Perfil</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        <p>© 2026 GLOW - Todos los derechos reservados</p>
    </div>

    @stack('scripts')
</body>

</html>
