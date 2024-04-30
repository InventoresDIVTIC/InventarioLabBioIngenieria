<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/inventory.css">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/modal-table.css">
    <script src="https://bioingenieria.inventores.org/js/select-edit.js"></script>
    <title>EDITAR USUARIO | DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>

<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div class="max-w-9xl mx-auto p-6 sm:p-8 sm:rounded-lg shadow-lg"
                style="background: linear-gradient(to left, #205397, #27374D); margin: 1rem; margin-top: 3rem;">
                <h2
                    style="color: #d1d5db; font-size: 1.8rem; text-align: center; text-transform: uppercase; padding-bottom: 5px;">
                    Editar Usuario</h2>
                <p class="screen-title" style="color: #d1d5db;"></p>

                <?php
                $id = $_GET['id'];
                $users = DB::table('users')->select('users.*')->find($id);
                ?>

                <form id="form-inventario" action="{{ route('users.edit', ['id' => $users->id]) }}" method="POST"
                    class="space-y-6 w-full sm:w-96">
                    @csrf
                    @method('PATCH')
                    <!-- Pantalla 1: Datos Generales -->
                    <div>
                        <div>
                            <div class="grid grid-cols-2 gap-6">

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="code" :value="__('Codigo')" />
                                    <x-text-input id="code" name="code" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->code}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('code')" />
                                </div>

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="name" :value="__('Nombre')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->name}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="lastname" :value="__('Apellido')" />
                                    <x-text-input id="lastname" name="lastname" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->lastname}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                                </div>

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->email}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                                <select id="rol" name="rol" class="mt-1 block w-full bg-gray-800 text-white">
                                    <option value="Por definir" @selected($users->rol === 'Por definir')>Por definir</option>
                                    <option value="Admin" @selected($users->rol === 'Admin')>Admin</option>
                                    <option value="Usuario" @selected($users->rol === 'Usuario')>Usuario</option>
                                    <option value="Prestador de servicio" @selected($users->rol === 'Prestador de servicio')>Prestador de
                                        servicio</option>
                                    <option value="Web designer" @selected($users->rol === 'Web designer')>Web designer</option>
                                </select>

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="area" :value="__('Area')" />
                                    <x-text-input id="area" name="area" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->area}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('area')" />
                                </div>

                                <div title="Modifica el Tipo de Solicitud del usuario">
                                    <x-input-label for="phone" :value="__('Telefono')" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 w-full"
                                        value='<?php echo "{$users->phone}"; ?>' />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                            <!-- Botón para Guardar -->
                            <div>
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!-- Botón para Eliminar -->
            <div class="flex items-center gap-4 mt-4" style="justify-content: center;">
                <form method="POST" action="{{ route('users.destroy', ['id' => $users->id]) }}"
                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        {{ __('Eliminar') }}
                    </button>
                </form>
            </div>
            </div>
        </section>
    </x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://bioingenieria.inventores.org/js/tickets-creation.js"></script>
</body>

</html>
