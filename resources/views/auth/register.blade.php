<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/Registro.css">
  <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <section>
    <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="inputbox">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <!-- Lastname -->
                <div class="inputbox">
                    <x-input-label for="lastname" :value="__('Apellido')" />
                    <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                    <x-input-error :messages="$errors->get('lastname')" class="error-message" />
                </div>

                <!-- Code -->
                <div class="inputbox">
                    <x-input-label for="code" :value="__('Código')" />
                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
                    <x-input-error :messages="$errors->get('code')" class="error-message" />
                </div>

                <!-- Acount
                <div class="inputbox">
                    <x-input-label for="account" :value="__('Cuenta')" />
                    <x-text-input id="account" class="block mt-1 w-full" type="text" name="account" :value="old('account')" required autofocus autocomplete="account" />
                    <x-input-error :messages="$errors->get('account')" class="error-message" />
                </div> -->

                <!-- Email Address -->
                <div class="inputbox">
                    <x-input-label for="email" :value="__('Email (Institucional UDG)')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="inputbox">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="inputbox">
                    <x-input-label for="password_confirmation" :value="__('Confirmar password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>
                <div class="container">
                <x-primary-button class="boton">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
                <br>
                <div>
                    <a href="{{ route('login') }}" class="forget-label-b">
                        {{ __('¿Ya tienes una cuenta? Inicia Sesión') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
<footer class="footer">
            <p class="footer-pagina">&copy; 2023 Sistema de Gestión de Inventario</p>
</footer>
</body>
