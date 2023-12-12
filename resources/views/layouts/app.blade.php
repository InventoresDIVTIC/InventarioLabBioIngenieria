<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'InventoresLab') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/app-blade.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ isOpen: false }" class="font-sans antialiased">

    <div id="body" style="background-color: #27374d;" class="w-full fixed z-30 transition-all duration-200">
        <div class="w-full h-auto p-4 flex justify-between">

        <div id="menu-icon">
                <div class="icon-container" @click.prevent="isOpen = !isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
            </div>

            <script>
                const menuIcon = document.getElementById('menu-icon');
                const iconContainer = document.querySelector('#menu-icon .icon-container');

                iconContainer.addEventListener('click', () => {
                    menuIcon.classList.toggle('scale');
                    menuIcon.classList.toggle('clicked');
                });

                const sidebar = document.getElementById('animation');
                const content = document.getElementById('content');

                menuIcon.addEventListener('click', () => {
                    sidebar.classList.toggle('slide-in');
                    sidebar.classList.toggle('slide-out');

                    if (sidebar.classList.contains('slide-in')) {
                        // Desplazar hacia la derecha si el slidebar se activa
                        content.classList.toggle('slide-in-Content');
                    } else {
                        // Volver a la posición original si el slidebar se desactiva
                        content.classList.toggle('slide-out-Content');
                    }

                });
            </script>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center" style="background-color: #27374d;">

                <x-dropdown width="48" style="margin-right: 15px;">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <!-- Imagen Perfil -->
                            <div class="flex justify-center items-center space-x-3 cursor-pointer" style="margin-right: .8rem;">
                            <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-900" style="margin-top: -.3rem; margin-bottom: -.3rem;">
                            <img src="{{ Auth::user()->photo }}" alt="Foto de perfil" class="w-full h-full object-cover">
                            </div>
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

<div class="h-full w-full pt-16">
    <div class="flex" id="wrapper">
        <div id="animation">
             <aside id="sidebar"
             class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 pt-16 w-60 h-full duration-200 lg:flex transition-width lg:w-60"
             :class="isOpen ? 'w-60 slide-in' : 'slide-out'">
                <div class="w-full h-auto p-2 flex justify-center">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo
                                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                        </a>
                    </div>
                </div>
                @include('layouts.navigation')
            </aside>
        </div>


        <!-- Page Content -->
        <main id="content" class="h-full w-full" :class="isOpen ? 'slide-in-Content' : 'slide-out-Content'">
            {{ $slot }}

            <!-- Footer -->
            <footer class="footer">
                <p class="footer-pagina">&copy; 2023 Sistema de Gestión de Inventario</p>
            </footer>
        </main>
    </div>
</div>
</body>
</html>
