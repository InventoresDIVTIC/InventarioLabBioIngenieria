<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>REGISTRO DE SERVICIOS | DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
            <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Registro de Servicios</h2>
            <form method="post" action="{{ route('guardar-servicios') }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="status" :value="__('Estatus')" />
                        <div>
                        <select id="status" name="status" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="status">
                            <option value="Planeado">Planeado</option>
                        </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>

                    <div>
                        <x-input-label for="services_type" :value="__('Tipo de servicio')" />
                        <div>
                        <select id="services_type" name="services_type" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="services_type">
                            <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                        </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('services_type')" />
                    </div>

                    <div>
                        <x-input-label for="supplier_name" :value="__('Proveedor')" />

                        <x-text-input id="supplier_id" name="supplier_id" type="hidden" class="mt-1 block w-full" required
                        autofocus autocomplete="supplier_id"/>

                        <x-text-input id="supplier_name" name="supplier_name" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="supplier_name" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'show_table_prov')" readonly />
                        @include('layouts.modal-proveedores-table')

                        <!--
                        <input name="supplier_id">
                        <div>
                            <select id="supplier_name" name="supplier_name" class="mt-1 block w-full bg-gray-800 text-white custom-select2" required autofocus autocomplete="supplier_name">
                                <?php
                                // Obtener los proveedores desde la base de datos o alguna otra fuente de datos
                                $proveedores = DB::table('proveedores')->get();

                                // Iterar sobre los proveedores y crear las opciones con atributo data-id
                                foreach ($proveedores as $proveedor) {
                                    echo "<option value=\"$proveedor->name\" data-id=\"$proveedor->id\">$proveedor->name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        -->
                        <x-input-error class="mt-2" :messages="$errors->get('supplier_name')" />
                    </div>

                    <div>
                        <x-input-label for="type" :value="__('Activo')" />
                        <x-text-input id="active_id" name="active_id" type="hidden" class="mt-1 block w-full" required
                        autofocus autocomplete="active_id"/>
                        <x-text-input id="model" name="model" type="hidden" class="mt-1 block w-full" required
                        autofocus autocomplete="model"/>
                        <x-text-input id="sublocation" name="sublocation" type="hidden" class="mt-1 block w-full" required
                        autofocus autocomplete="sublocation"/>
                        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="type" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'show_table_activos_prov')" readonly />
                        @include('layouts.modal-activos-prov-table')
                        <x-input-error class="mt-2" :messages="$errors->get('active_id')" />
                    </div>

                    <div>
                        <x-input-label for="scheduled_date" :value="__('Fecha asignada')" />
                        <input type="date" id="scheduled_date" name="scheduled_date" class="mt-1 block w-full" required autofocus autocomplete="scheduled_date" />
                        <x-input-error class="mt-2" :messages="$errors->get('scheduled_date')" />
                    </div>


                    <div>
                        <x-input-label for="assigned_engineer" :value="__('Ingeniero asignado')" />
                        <x-text-input id="assigned_engineer" name="assigned_engineer" type="text" class="mt-1 block w-full" required autofocus autocomplete="assigned_engineer" />
                        <x-input-error class="mt-2" :messages="$errors->get('assigned_engineer')" />
                    </div>

                <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                    <div>
                        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                    </div>

                    <div style="color: #d1d5db; background-color: rgb(31 41 55 / var(--tw-bg-opacity)); padding: .44rem; border-radius: .375rem; border-color: #6b7180; border-width: 1px; font-weight: 600; font-size: .75rem; text-transform: uppercase;">
                        @if (Route::has('services'))
                            <a href="{{ route('services') }}" >
                                {{ __('Ir a Servicios') }}
                            </a>
                        @endif
                     </div>
                </div>

                <script>
                    $(document).ready(function() {
                        var table = $('#proveedores').DataTable({
                            responsive: true,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                            }
                        }).columns.adjust().responsive.recalc();
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        var table = $('#activos').DataTable({
                            responsive: true,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                            }
                        }).columns.adjust().responsive.recalc();
                    });
                </script>

                <script src="http://127.0.0.1:8000/js/services-creation.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
            </form>
            </div>
        </section>
    </x-app-layout>
</body>
</html>
