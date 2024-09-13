<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/login.css">
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Iniciar sesión</h2>
                        <div class="inputbox">
                            <x-input-label class="input-label" for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="error-message"/>
                        </div>
                        <!-- Password -->
                        <div class="inputbox">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="error-message"/>
                        </div>
                        <!-- Remember Me -->
                        <div class="rememberme">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember">
                                <span> {{ __('Recuerdame') }}</span>
                            </label>
                        </div>
                        <div class="forget">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                        </div>
                        <div class="RegisterButton">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" >
                                        {{ __('Registrate') }}
                                    </a>
                                @endif
                        </div>
                        <div>
                            <x-primary-button class="boton">
                                    {{ __('Ingresar') }}
                            </x-primary-button>
                        </div>
                    </form>
        </div>
        </div>
    </section>
    <footer class="footer">
            <p class="footer-pagina">&copy; 2024 Sistema de Gestión de Inventario</p>
    </footer>
</body>
</html>
