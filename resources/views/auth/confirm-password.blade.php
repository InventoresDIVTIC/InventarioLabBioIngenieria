<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/confirm.css">
    <title>DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <div class="lbl">
                    {{ __('Porfavor confirma tu contraseña antes de continuar') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="inputbox">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="error-message" />
                    </div>

                    <div class="container">
                        <x-primary-button class="send">
                            {{ __('Confirm') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>
</div>
    </section>
    <footer class="footer">
            <p class="footer-pagina">&copy; 2023 Sistema de Gestión de Inventario</p>
    </footer>
</body>

