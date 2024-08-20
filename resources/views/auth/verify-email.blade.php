<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/verify.css">
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
            <div class="lbl">
            {{ __('Gracias por registrarte, Antes de empezar') }} <br> <br>
            {{ __('¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar?') }} <br> <br>
            {{ __('Si no lo has recibido, estaremos encantados de enviarte otro. ') }} <br> <br>
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="lbl2">
                    {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                </div>
            @endif
            <div class="button-container">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-primary-button class="send">
                            {{ __('Reenviar correo de verificación') }}
                        </x-primary-button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div>
                        <button type="submit" class="send2">
                            {{ __('Cerrar sesión') }}
                        </button>
                    </div>
                 </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p class="footer-pagina">&copy; 2023 Sistema de Gestión de Inventario</p>
    </footer>
</body>
