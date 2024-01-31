<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/reset.css">
  <title>DEV LAB DE BIOINGENIERIA</title>
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body>
    <section>
    <div class="form-box">
            <div class="form-value">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="inputbox">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="error-message " />
                    </div>

                    <!-- Password -->
                    <div class="inputbox">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="error-message " />
                    </div>

                    <!-- Confirm Password -->
                    <div class="inputbox">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="error-message " />
                    </div>

                    <div class="container">
                        <x-primary-button class="send">
                            {{ __('Reset Password') }}
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
