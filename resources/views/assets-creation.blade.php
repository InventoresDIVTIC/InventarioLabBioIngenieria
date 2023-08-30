<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/dashboard.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
            <div class="max-w-xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
            <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Registro de Activo</h2>
            <form method="post" action="{{ route('guardarActivo') }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="category" :value="__('Categoría')"/>
                        <div x-data="customSelect()">
                        <select id="category" name="category" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="category"  @change="selectOption($event)">
                            <option value="Equipo Médico">Equipo Médico</option>
                            <option value="Equipo de medición / Simulacion">Equipo de medición / Simulacion</option>
                            <option value="Equipo de imagenologia">Equipo de imagenologia</option>
                            <option value="Equipo de laboratorio">Equipo de laboratorio</option>
                            <option value="Equipo de esterilizacion">Equipo de esterilizacion</option>
                            <option value="Mobiliario médico">Mobiliario médico</option>
                            <option value="Equipo de traslado">Equipo de traslado</option>
                            <option value="Equipo de computo/TI">Equipo de computo/TI</option>
                            <option value="Equipo de rehabilitacion">Equipo de rehabilitacion</option>
                            <option value="Equipo de minima invasión">Equipo de minima invasión</option>
                            <option value="Equipo industrial">Equipo industrial</option>
                            <option value="Refacciones / Accesorios">Refacciones / Accesorios</option>
                            <option value="Material de proteccion">Material de proteccion</option>
                            <option value="Herramienta">Herramienta</option>
                            <option value="Instrumental medico">Instrumental medico</option>
                            <option value="Otro">Otro</option>
                        </select>
                            <input type="hidden" name="category_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('category')" />
                    </div>

                    <div>
                        <x-input-label for="type" :value="__('Tipo')" />
                        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" required autofocus autocomplete="type" />
                        <x-input-error class="mt-2" :messages="$errors->get('type')" />
                    </div>

                    <div>
                        <x-input-label for="brand" :value="__('Marca')" />
                        <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" required autofocus autocomplete="brand" />
                        <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                    </div>

                    <div>
                        <x-input-label for="model" :value="__('Modelo')" />
                        <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" required autofocus autocomplete="model" />
                        <x-input-error class="mt-2" :messages="$errors->get('model')" />
                    </div>

                    <div>
                        <x-input-label for="serial" :value="__('No. de serie')" />
                        <x-text-input id="serial" name="serial" type="text" class="mt-1 block w-full" required autofocus autocomplete="serial" />
                        <x-input-error class="mt-2" :messages="$errors->get('serial')" />
                    </div>

                    <div>
                        <x-input-label for="location" :value="__('Ubicación')" />
                        <div x-data="customSelect()">
                        <select id="location" name="location" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="location"  @change="selectOption($event)">
                            <option value="Ubicación 1">Ubicación 1</option>
                            <option value="Ubicación 2">Ubicación 2</option>
                            <option value="Ubicación 3">Ubicación 3</option>
                        </select>
                        <input type="hidden" name="location_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('location')" />
                    </div>

                    <div>
                        <x-input-label for="sublocation" :value="__('Ubicación')" />
                        <div x-data="customSelect()">
                        <select id="sublocation" name="sublocation" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="sublocation"  @change="selectOption($event)">
                            <option value="Sub Ubicación 1">Sub Ubicación 1</option>
                            <option value="Sub Ubicación 2">Sub Ubicación 2</option>
                            <option value="Sub Ubicación 3">Sub Ubicación 3</option>
                        </select>
                        <input type="hidden" name="sublocation_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('sublocation')" />
                    </div>

                    <div>
                        <x-input-label for="status" :value="__('Estado')" />
                        <div x-data="customSelect()">
                        <select id="status" name="status" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="status"  @change="selectOption($event)">
                            <option value="Funcional">Funcional</option>
                            <option value="No funcional">No funcional</option>
                            <option value="En mantenimiento">En mantenimiento</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En revision">En revision</option>
                            <option value="En stock">En stock</option>
                            <option value="Baja">Baja</option>
                        </select>
                        <input type="hidden" name="status_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>

                    <div>
                        <x-input-label for="hierarchy" :value="__('Jerarquia')" />
                        <div x-data="customSelect()">
                        <select id="hierarchy" name="hierarchy" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="hierarchy"  @change="selectOption($event)">
                            <option value="Individual">Individual</option>
                            <option value="Principal">Principal</option>
                            <option value="Secundario">Secundario</option>
                        </select>
                        <input type="hidden" name="hierarchy_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('hierarchy')" />
                    </div>

                    <div>
                        <x-input-label for="belonging" :value="__('Pertenencia')" />
                        <div x-data="customSelect()">
                        <select id="belonging" name="belonging" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="belonging"  @change="selectOption($event)">
                            <option value="Propio">Propio</option>
                            <option value="Renta">Renta</option>
                            <option value="Comodato">Comodato</option>
                            <option value="Préstamo">Préstamo</option>
                            <option value="Demo">Demo</option>
                            <option value="P. Salud">P. Salud</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="hidden" name="belonging_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('belonging')" />
                    </div>


                    <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                    <div>
                        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                    </div>

                    <div style="color: #d1d5db; background-color: rgb(31 41 55 / var(--tw-bg-opacity)); padding: .44rem; border-radius: .375rem; border-color: #6b7180; border-width: 1px; font-weight: 600; font-size: .75rem; text-transform: uppercase;">
                        @if (Route::has('inventory'))
                            <a href="{{ route('inventory') }}" >
                                {{ __('Ir al Inventario') }}
                            </a>
                        @endif
                     </div>
                </div>

                <script>
                    function customSelect() {
                        return {
                            selectedValue: '',
                            selectOption(event) {
                                this.selectedValue = event.target.value;
                            },
                        };
                    }

                    // Agrega una escucha al evento submit del formulario para enviar el valor seleccionado
                    document.querySelector('form').addEventListener('submit', function() {
                        const selectedValueField = document.querySelector('input[name="category_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                        const selectedValueField = document.querySelector('input[name="location_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                        const selectedValueField = document.querySelector('input[name="sublocation_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                        const selectedValueField = document.querySelector('input[name="status_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                        const selectedValueField = document.querySelector('input[name="hierarchy_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                        const selectedValueField = document.querySelector('input[name="belonging_selected"]');
                        selectedValueField.value = customSelect().selectedValue;
                    });
                </script>
            </form>
            </div>
        </section>
    </x-app-layout>
</body>
</html>
