<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROVEEDORES | DEV LAB DE BIOINGENIERIA</title>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/resources/css/supplier.css">
</head>

<x-app-layout>
    <section>
        <div>
            <div>
                <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="margin-bottom: 1rem;">
                    <div id="recipientes" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                        <table id="proveedores" class="stripe hover"
                            style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                            <h2
                                style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-bottom: 10px;">
                                Proveedores</h2>
                            <thead>
                                <tr>
                                    <th id="icon-menu-id" data-priority="1">
                                        <div class="orden">
                                            <div>ID</div>
                                            <div id="icon-id" class="ordicon" title="Ordenar el ID de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-name" data-priority="2">
                                        <div class="orden">
                                            <div>NOMBRE</div>
                                            <div id="icon-name" class="ordicon" title="Ordenar el Nombre de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-razon" data-priority="3">
                                        <div class="orden">
                                            <div>RAZON SOCIAL</div>
                                            <div id="icon-razon" class="ordicon" title="Ordenar la Razon Social de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-city" data-priority="4">
                                        <div class="orden">
                                            <div>CIUDAD</div>
                                            <div id="icon-city" class="ordicon" title="Ordenar la Ciudad de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-state" data-priority="5">
                                        <div class="orden">
                                            <div>ESTADO</div>
                                            <div id="icon-state" class="ordicon" title="Ordenar el Estado de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-country" data-priority="6">
                                        <div class="orden">
                                            <div>PAIS</div>
                                            <div id="icon-country" class="ordicon" title="Ordenar el Estado de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-phone" data-priority="7">
                                        <div class="orden">
                                            <div>TELÉFONO</div>
                                            <div id="icon-phone" class="ordicon" title="Ordenar el Teléfono de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-web" data-priority="8">
                                        <div class="orden">
                                            <div>SITIO WEB</div>
                                            <div id="icon-web" class="ordicon" title="Ordenar el Sitio Web de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                    <th id="icon-menu-emailcomercial" data-priority="9">
                                        <div class="orden">
                                            <div>CORREO COMERCIAL</div>
                                            <div id="icon-emailcomercial" class="ordicon" title="Ordenar el Sitio Web de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-4 h-4 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Obtén los datos de la tabla "proveedores" de la base de datos
                                $proveedores = \App\Models\Proveedores::all();

                                foreach ($proveedores as $proveedores) { ?>
                                <td>
                                    <div class="idproveedor">
                                        <a href="{{ route('suppliers-edit') }}">
                                            <div title="Editar a este Proveedor" class="editicon">
                                                <svg style="float: left;" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </div>
                                        </a>
                                        <div class="textid"><?php echo "{$proveedores->id}"; ?>
                                        </div>
                                    </div>
                                </td>
                                <?php
                                echo "<td>{$proveedores->name}</td>";
                                    echo "<td>{$proveedores->company_name}</td>";
                                    echo "<td>{$proveedores->city}</td>";
                                    echo "<td>{$proveedores->state}</td>";
                                    echo "<td>{$proveedores->country}</td>";
                                    echo "<td>{$proveedores->phone}</td>";
                                    echo "<td>{$proveedores->site_web}</td>";
                                    echo "<td>{$proveedores->business_email}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div style="text-align: center;">
        <!-- Botón flotante para agregar proveedores -->
        <a href="{{ route('suppliers-creation') }}" class="floating-button">
            <h2>+</h2>
        </a>
    </div>

    <!-- Ventana flotante para mostrar el mensaje -->
    <div class="floating-message">
        Agregar proveedores
    </div>
</x-app-layout>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!-- Archivo de idioma en español -->
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
    <script src="https://bioingenieria.inventores.org/resources/js/suppliers.js"></script>

</body>
</html>
