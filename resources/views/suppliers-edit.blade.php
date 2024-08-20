<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <script src="https://bioingenieria.inventores.org/js/select-edit.js"></script>
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Editar Proveedor</h2>
                <p class="screen-title" style="color: #d1d5db;"></p>
                <?php
                $id = $_GET['id'];
                $proveedor = DB::table('proveedores')
                                ->select('proveedores.*')
                                ->find($id);

                 ?>
                    <form id="form-inventario" action="{{ route('suppliers.edit', ['id' => $proveedor->id]) }}" method="POST" class="space-y-6 w-full sm:w-96">
                        @csrf
                        @method('PATCH')
                    <!-- Pantalla 1: Datos Generales -->
                    <div>
                        <div>
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Nombre')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="name" value='<?php echo "{$proveedor->name}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <div>
                                    <x-input-label for="company_name" :value="__('Nombre de la compañia')" />
                                    <x-text-input id="company_name" name="company_name" type="text"
                                        class="mt-1 w-full" required autofocus autocomplete="company_name" value='<?php echo "{$proveedor->company_name}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
                                </div>
                                <div>
                                    <x-input-label for="city" :value="__('Ciudad')" />
                                    <x-text-input id="city" name="city" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="city" value='<?php echo "{$proveedor->city}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                                </div>
                                <div>
                                    <x-input-label for="state" :value="__('Estado')" />
                                    <x-text-input id="state" name="state" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="state" value='<?php echo "{$proveedor->state}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('state')" />
                                </div>
                                <div>
                                    <x-input-label for="country" :value="__('País')" />
                                    <x-text-input id="country" name="country" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="country" value='<?php echo "{$proveedor->country}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                                </div>
                                <div>
                                    <x-input-label for="phone" :value="__('Telefóno')" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 w-full"
                                        required autofocus autocomplete="phone" value='<?php echo "{$proveedor->phone}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                                <div>
                                    <x-input-label for="site_web" :value="__('sitio web')" />
                                    <x-text-input id="site_web" name="site_web" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="site_web" value='<?php echo "{$proveedor->site_web}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('site_web')" />
                                </div>
                                <div>
                                    <x-input-label for="business_email" :value="__('Correo comercial')" />
                                    <x-text-input id="business_email" name="business_email" type="email"
                                        class="mt-1 block w-full" required autofocus autocomplete="business_email" value='<?php echo "{$proveedor->business_email}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('business_email')" />
                                </div>
                                <div>
                                    <x-input-label for="support_email" :value="__('Correo de soporte')" />
                                    <x-text-input id="support_email" name="support_email" type="email"
                                        class="mt-1 block w-full" required autofocus autocomplete="support_email" value='<?php echo "{$proveedor->support_email}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('support_email')" />
                                </div>
                                <div>
                                    <x-input-label for="category" :value="__('Servicio')" />
                                    <select id="category" name="category"
                                        class="mt-1 block w-full bg-gray-800 text-white" required autofocus
                                        autocomplete="category">
                                        <option value="Por definir">Por definir</option>
                                        <option value="Calibración de equipo de medición">Calibración de equipo de medición</option>
                                        <option value="Comercialización/Representación de software">Comercialización/Representación de software</option>
                                        <option value="Consultoría/Asesoría">Consultoría/Asesoría</option>
                                        <option value="Despacho de diseño industrial enfocado a salud">Despacho de diseño industrial enfocado a salud</option>
                                        <option value="Despacho de diseño industrial no enfocado a salud">Despacho de diseño industrial no enfocado a salud</option>
                                        <option value="Fabricante de equipo médico">Fabricante de equipo médico</option>
                                        <option value="Fabricante de material de protección">Fabricante de material de protección</option>
                                        <option value="Manufactura aditiva e impresión 3D independiente">Manufactura aditiva e impresión 3D independiente</option>
                                        <option value="Renta de equipo médico">Renta de equipo médico</option>
                                        <option value="Servicio de mantenimiento para equipo médico">Servicio de mantenimiento para equipo médico</option>
                                        <option value="Servicios de desarrollo de software(No Subrrogado)">Servicios de desarrollo de software (No Subrrogado)</option>
                                        <option value="Servicio de construcción">Servicio de construcción</option>
                                        <option value="Venta de accesorios y refacciones para equipo médico">Venta de accesorios y refacciones para equipo médico</option>
                                        <option value="Venta de material de protección">Venta de material de protección</option>
                                        <option value="Venta de equipo médico">Venta de equipo médico</option>
                                        <option value="Venta de equipo de medición">Venta de equipo de medición</option>
                                        <option value="Venta de equipo de laboratorio">Venta de equipo de laboratorio</option>
                                        <option value="Venta de mobiliario médico">Venta de mobiliario médico</option>
                                        <option value="Venta de productos ortopédicos">Venta de productos ortopédicos</option>
                                        <option value="Venta de consumibles">Venta de consumibles</option>
                                        <option value="Venta de equipo industrial">Venta de equipo industrial</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('category')" />
                                </div>
                                <div>
                                    <x-input-label for="engineer" :value="__('Ingeniero')" />
                                    <x-text-input id="engineer" name="engineer" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="engineer" value='<?php echo "{$proveedor->engineer}"; ?>'/>
                                    <x-input-error class="mt-2" :messages="$errors->get('engineer')" />
                                </div>
                                <div>
                                    <div class="max-w-full">
                                        <x-input-label for="description" :value="__('Descripción')" />
                                        <textarea id="description" name="description"
                                            class="mt-1 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:ring focus:ring-opacity-50 textarea-wide"
                                            required autocomplete="description" rows="3"><?php echo "{$proveedor->description}"; ?></textarea>
                                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <div>
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Guardar') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </x-app-layout>
    <script>
        <?php
            $properties = ["category"];
            foreach ($properties as $property) {
                echo "selectData('{$proveedor->{$property}}', '$property');";
            }
        ?>
    </script>
</body>
@endif
@if(Auth::check() && Auth::user()->hasAnyRole(['Usuario', 'Prestador de servicio']))
<div>
    <style>
        .welcome-container {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .welcome-box {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 2s ease-in-out;
        }
        .welcome-title {
            color: #333333;
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
    <div class="welcome-container">
        <div class="welcome-box">
            <h2 class="welcome-title">Parece que no tienes permisos para acceder a este sitio por favor contacta a un administrador</h2>
        </div>
    </div>
</div>
@endif
</html>
