<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/labbio/resources/css/dashboard.css">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
    <title>REGISTRO DE SERVICIOS | DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
    <x-app-layout>
        <section>
            <div class="max-w-xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg" style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
            <h2 style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">Registro de Servicios</h2>
            <form method="post" action="{{ route('guardar-servicios') }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="status" :value="__('Estatus')" />
                        <div x-data="customSelect()">
                        <select id="status" name="status" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="status"  @change="selectOption($event)">
                            <option value="Estatus 1">Estatus 2</option>
                        </select>
                            <input type="hidden" name="status_selected" x-bind:value="selectedValue">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>
                    
                    <div>
                        <x-input-label for="services_type" :value="__('Tipo de servicio')" />
                        <div x-data="customSelect()">
                        <select id="services_type" name="services_type" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="services_type"  @change="selectOption($event)">
                            <option value="Servicio 1">Servicio 1</option>
                        </select>
                            <input type="hidden" name="services_type_selected" x-bind:value="selectedValue">
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


                        <!-- 
                        <div x-data="customSelect()">
                            <select id="active_name" name="active_name" class="mt-1 block w-full bg-gray-800 text-white" required autofocus autocomplete="active_name" @change="selectOption($event)">
                                <?php
                                // Obtener los nombres de los proveedores desde la base de datos o alguna otra fuente de datos
                                //$activos = DB::table('activos')->pluck('type');
                                
                                // Iterar sobre los nombres de los proveedores y crear las opciones
                                //foreach ($activos as $activo) {
                                  //  echo "<option value=\"$activo\">$activo</option>";
                                //}
                                ?>
                            </select>
                            <input type="hidden" name="active_name_selected" x-bind:value="selectedValue">
                        </div>
                         -->
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

                <script src="http://localhost/labbio/resources/js/services-creation.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                            
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
                        
                        const selectedValueFieldStatus = document.querySelector('input[name="status_selected"]');
                        selectedValueFieldStatus.value = customSelect().selectedValue;

                        const selectedValueFieldType = document.querySelector('input[name="services_type_selected"]');
                        selectedValueFieldType.value = customSelect().selectedValue;

                        //const selectedValueFieldSupplier = document.querySelector('input[name="supplier_name_selected"]');
                        //selectedValueFieldSupplier.value = customSelect().selectedValue;
                        //const supplierId = selectedSupplier.options[selectedSupplier.selectedIndex].getAttribute('data-id');
                        //document.querySelector('input[name="supplier_id"]').value = supplierId;                        
                        //const selectedValueFieldActives = document.querySelector('input[name="active_name_selected"]');
                        //selectedValueFieldActives.value = customSelect().selectedValue;
                        //const supplierId = selectedSupplier.options[selectedSupplier.selectedIndex].getAttribute('data-id');
                        //document.querySelector('input[name="supplier_id"]').value = supplierId; 
                    });
                </script>
            </form>
            </div>
        </section>
    </x-app-layout>
</body>
</html>
