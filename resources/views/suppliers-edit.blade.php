<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <script src="/ruta/hacia/signature-pad.js"></script>
    <link rel="stylesheet" href="/ruta/hacia/signature-pad.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
        <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                    <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Editar Proveedor</h2>
                    <p class="screen-title" x-text="'Pantalla ' + pantallaTitulo" style="color: #d1d5db;"></p>
                    <form id="form-inventario" class="space-y-6 w-full sm:w-96">
                    <!-- Pantalla 1: Datos Generales -->
                    <div x-data="{ pantalla }">
                        <div x-show="pantalla === 1">
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Nombre del servicio')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div>
                                    <x-input-label for="company_name" :value="__('Nombre de la compañia')" />
                                    <x-text-input id="company_name" name="company_name" type="text" class="mt-1 w-full" required autofocus autocomplete="company_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                </div>
                                <div>
                                    <x-input-label for="city" :value="__('Ciudad')" />
                                    <x-text-input id="city" name="city" type="text" class="mt-1 w-full" required autofocus autocomplete="city" />
                                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                                </div>
                                <div>
                                    <x-input-label for="state" :value="__('Estado')" />
                                    <x-text-input id="state" name="state" type="text" class="mt-1 w-full" required autofocus autocomplete="state" />
                                    <x-input-error class="mt-2" :messages="$errors->get('state')" />
                                </div>
                                <div>
                                    <x-input-label for="country" :value="__('País')" />
                                    <x-text-input id="country" name="country" type="text" class="mt-1 w-full" required autofocus autocomplete="country" />
                                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                                </div>
                                <div>
                                    <x-input-label for="phone" :value="__('Telefóno')" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 w-full" required autofocus autocomplete="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                                <div>
                                    <x-input-label for="site_web" :value="__('sitio web')" />
                                    <x-text-input id="site_web" name="site_web" type="text" class="mt-1 block w-full" required autofocus autocomplete="site_web" />
                                    <x-input-error class="mt-2" :messages="$errors->get('site_web')" />
                                </div>
                                <div>
                                    <x-input-label for="business_email" :value="__('Correo comercial')" />
                                    <x-text-input id="business_email" name="business_email" type="email" class="mt-1 block w-full" required autofocus autocomplete="business_email" />
                                    <x-input-error class="mt-2" :messages="$errors->get('business_email')" />
                                </div>
                                <div>
                                    <x-input-label for="support_email" :value="__('Correo de soporte')" />
                                    <x-text-input id="support_email" name="support_email" type="email" class="mt-1 block w-full" required autofocus autocomplete="support_email" />
                                    <x-input-error class="mt-2" :messages="$errors->get('support_email')" />
                                </div>
                                <div class="flex justify-center">
                                    <div class="max-w-full">
                                        <x-input-label for="motive" :value="__('Descripción')" />
                                        <textarea id="motive" name="motive" class="mt-1 {{ $errors->has('motive') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide" required autocomplete="motive" rows="3">{{ old('motive') }}</textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('motive')" />
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="category" :value="__('Correo de soporte')" />
                                    <x-text-input id="category" name="category" type="email" class="mt-1 block w-full" required autofocus autocomplete="category" />
                                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
                                <button type="submit" x-show="pantalla > 0" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    </x-app-layout>
<script>
    let pantalla = 1;

    // Objeto para mapear los números de pantalla con sus títulos
    const titulosPantallas = {
        1: 'Datos Generales',
    };

    // Función para obtener el título de la pantalla actual
    function getPantallaTitulo() {
        return titulosPantallas[pantalla];
    }

    // Actualizar el indicador de pantalla
    function updateIndicator() {
        const indicatorDivs = document.querySelectorAll('.screen-indicator .indicator');
        indicatorDivs.forEach((div, index) => {
            if (pantalla === index + 1) {
                div.classList.add('active');
            } else {
                div.classList.remove('active');
            }
        });
    }

    // Función para activar el primer círculo al cargar el documento
    function activateFirstCircle() {
        const firstCircle = document.querySelector('.screen-indicator .indicator');
        if (firstCircle) {
            firstCircle.classList.add('active');
        }
    }

    // Asignar evento click a los botones Anterior y Siguiente
        // Asignar evento click a los botones Anterior y Siguiente
        const btnAnterior = document.querySelector('#btn-anterior');
        const btnSiguiente = document.querySelector('#btn-siguiente');
        const pantallaTitleElement = document.querySelector('.screen-title');

        btnAnterior.addEventListener('click', () => {
            if (pantalla > 1) {
                pantalla -= 1;
                updateIndicator();
                pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
            }
        });

        btnSiguiente.addEventListener('click', () => {
            if (pantalla < 1) {
                pantalla += 1;
                updateIndicator();
                pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
            }
        });

        // Activar el primer círculo al cargar el documento
        document.addEventListener('DOMContentLoaded', () => {
            activateFirstCircle();
            pantallaTitleElement.textContent = getPantallaTitulo(); // Actualiza el título de la pantalla
        });


    // Variable reactiva para almacenar el título de la pantalla actual
    let pantallaTitulo = getPantallaTitulo();
</script>
</body>
</html>
