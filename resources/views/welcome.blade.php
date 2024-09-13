<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/wellcome.css">
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
    </head>
    <body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
     <section>
        <div class="Pincipal">
            @if (Route::has('login'))
                <div class="Layouts">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="Inicio">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="Button-Inicio">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="Button register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </section>
    <footer class="footer">
            <p class="footer-pagina">&copy; 2024 Sistema de Gestión de Inventario</p>
    </footer>
    </body>
</html>
