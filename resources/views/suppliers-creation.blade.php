<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin', 'Prestador de servicio']))
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Registro de Proveedores</h2>
                <form method="post" action="{{ route('guardarProveedor') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="company_name" :value="__('Razón social')" />
                        <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="company_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                    </div>

                    <div>
                        <x-input-label for="city" :value="__('Ciudad')" />
                        <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="city" />
                        <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>

                    <div>
                        <x-input-label for="state" :value="__('Estado')" />
                        <x-text-input id="state" name="state" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="state" />
                        <x-input-error class="mt-2" :messages="$errors->get('state')" />
                    </div>

                    <div>
                        <x-input-label for="country" :value="__('País')" />
                        <x-text-input id="country" name="country" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="country" />
                        <x-input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>

                    <div>
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="phone" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <div>
                        <x-input-label for="site_web" :value="__('sitio web')" />
                        <x-text-input id="site_web" name="site_web" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="site_web" />
                        <x-input-error class="mt-2" :messages="$errors->get('site_web')" />
                    </div>

                    <div>
                        <x-input-label for="business_email" :value="__('Correo comercial')" />
                        <x-text-input id="business_email" name="business_email" type="email" class="mt-1 block w-full" required
                            autofocus autocomplete="business_email" />
                        <x-input-error class="mt-2" :messages="$errors->get('business_email')" />
                    </div>

                    <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                        <div>
                            <x-primary-button>{{ __('guardar') }}</x-primary-button>
                        </div>

                        <div
                            style="color: #d1d5db; background-color: rgb(31 41 55 / var(--tw-bg-opacity)); padding: .44rem; border-radius: .375rem; border-color: #6b7180; border-width: 1px; font-weight: 600; font-size: .75rem; text-transform: uppercase;">
                            @if (Route::has('suppliers'))
                                <a href="{{ route('suppliers') }}">
                                    {{ __('Ir a Proveedores') }}
                                </a>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </x-app-layout>
</body>
@endif
@if(Auth::check() && Auth::user()->hasAnyRole(['Usuario']))
<div>
    <style>
        .welcome-container {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: url("https://bioingenieria.inventores.org/img/ImagenBackground.jpg") no-repeat;
            background-position: center;
            background-size: cover;
        }
        .welcome-box {
            text-align: center;
            padding: 40px;
            width: 80rem;
            backdrop-filter: blur(15px);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }
        .welcome-title {
            color: white;
            font-size: 2.5rem;
            text-transform: uppercase;
            margin: 0;
            animation: slideIn 2s ease-in-out;
        }
        .welcome-message {
            color: #808080;
            font-size: 1.25rem;
            margin-top: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
    <section class="welcome-container">
        <div class="welcome-box">
            <h2 class="welcome-title">Parece que no tienes permisos para acceder a este sitio por favor contacta a un administrador</h2>
        </div>
    </section>
</div>
@endif
</html>
