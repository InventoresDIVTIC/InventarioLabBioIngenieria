<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/forgot.css">
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <!-- Session Status -->
                <x-auth-session-status class="lbl" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <h2>¿Olvidaste tu contraseña?</h2> <br>
                        <h2>No te preocupes, introduce el correo electrónico de tu cuenta y cámbiala</h2>
                    </div>
                    <!-- Email Address -->
                    <div class="inputbox">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="lbl" />
                    </div>

                    <div class="container">
                            <x-primary-button class="send">
                                {{ __('Cambia tu contraseña') }}
                            </x-primary-button>
                    </div>
                    <div class="return">
                                <a href="{{ route('login') }}" class="forget-label-b" >
                                        {{ __('Regresar') }}
                                </a>
                    </div>
        </form>
    </div>
</div>
    </section>
    <footer class="footer">
            <p class="footer-pagina">&copy; 2024 Sistema de Gestión de Inventario</p>
    </footer>
</body>
