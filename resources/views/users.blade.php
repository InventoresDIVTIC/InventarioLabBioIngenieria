<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USUARIOS | CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/users.css">
</head>
@if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div>
                <div>
                    <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto" style="margin-bottom: 1rem;">
                        <div id="recipientes" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="users" class="stripe hover" style="width:100%; padding-top: 1rem; padding-bottom: 1em; margin-bottom: 1rem;">
                                <h2 style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-bottom: 10px;">Usuarios</h2>
                                <thead>
                                    <tr>
                                        <th id="icon-menu-id" data-priority="1">
                                            <div class="orden">
                                                <div>ID</div>
                                                <div id="icon-id" class="ordicon" title="Ordenar el ID de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-nombre" data-priority="2">
                                            <div class="orden">
                                                <div>NOMBRE</div>
                                                <div id="icon-nombre" class="ordicon" title="Ordenar el nombre de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-apellido" data-priority="3">
                                            <div class="orden">
                                                <div>APELLIDO</div>
                                                <div id="icon-apellido" class="ordicon" title="Ordenar los apellidos de manera descendente o ascendente">
                                                    <svg style="float: right" class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-email" data-priority="4">
                                            <div class="orden">
                                                <div>EMAIL</div>
                                                <div id="icon-email" class="ordicon" title="Ordenar el email de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-rol" data-priority="5">
                                            <div class="orden">
                                                <div>ROL</div>
                                                <div id="icon-rol" class="ordicon" title="Ordenar el rol de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-area" data-priority="6">
                                            <div class="orden">
                                                <div>AREA</div>
                                                <div id="icon-area" class="ordicon" title="Ordenar el area de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-area" data-priority="7">
                                            <div class="orden">
                                                <div>ESTADO</div>
                                                <div id="icon-area" class="ordicon" title="Ordenar el estado de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                        <th id="icon-menu-area" data-priority="8">
                                            <div class="orden">
                                                <div>VISTO ULTIMA VEZ</div>
                                                <div id="icon-area" class="ordicon" title="Ordenar el visto última vez de manera descendente o ascendente">
                                                    <svg class="w-3 h-3 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10"> <path fill-rule="evenodd" d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/></svg>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Obtén los datos de la tabla "servicios" y "activos_servicios" de la base de datos
                                    $users = \App\Models\User::all();

                                    foreach ($users as $users) { ?>
                                        <td> <div class="iduser"> <a href="{{ route('users-edit', ['id' => $users->id])}}"> <div title="Editar este Servicio" class="editicon"><svg style="float: left;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /> </svg>
                                        </div></a><div class="textid"><?php echo "{$users->id} </td>"; ?>
                                        </div></div>
                                        <?php
                                        echo "<td>{$users->name}</td>";
                                        echo "<td>{$users->lastname}</td>";
                                        echo "<td>{$users->email}</td>";
                                        echo "<td>{$users->rol}</td>";
                                        echo "<td>{$users->area}</td>";
                                        ?>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <span>
                                                    @if(Cache::has('user-is-online-' . $users->id))
                                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Online</span>
                                                    @else
                                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Offline</span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                {{ Carbon\Carbon::parse($users->last_seen)->diffForHumans() }}
                                            </td>
                                        <?php
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
    </x-app-layout>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!-- Archivo de idioma en español -->
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
    <script>
        $(document).ready(function() {
            var table = $('#users').DataTable({
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
            }).columns.adjust().responsive.recalc();
        });

        const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
        const thName = document.getElementById('icon-menu-nombre'); const nameIcon = document.getElementById('icon-nombre');
        const thLastName = document.getElementById('icon-menu-apellido'); const lastnameIcon = document.getElementById('icon-apellido');
        const thEmail = document.getElementById('icon-menu-email'); const emailIcon = document.getElementById('icon-email');
        const thRol = document.getElementById('icon-menu-rol'); const rolIcon = document.getElementById('icon-rol');
        const thArea = document.getElementById('icon-menu-area'); const areaIcon = document.getElementById('icon-area');

        thId.addEventListener('click', () => {
            idIcon.classList.toggle('clicked');
            nameIcon.classList.remove('clicked');
            lastnameIcon.classList.remove('clicked');
            emailIcon.classList.remove('clicked');
            rolIcon.classList.remove('clicked');
            areaIcon.classList.remove('clicked');
        });

        thName.addEventListener('click', () => {
            nameIcon.classList.toggle('clicked');
            idIcon.classList.remove('clicked');
            lastnameIcon.classList.remove('clicked');
            emailIcon.classList.remove('clicked');
            rolIcon.classList.remove('clicked');
            areaIcon.classList.remove('clicked');
        });

        thLastName.addEventListener('click', () => {
            lastnameIcon.classList.toggle('clicked');
            idIcon.classList.remove('clicked');
            nameIcon.classList.remove('clicked');
            emailIcon.classList.remove('clicked');
            rolIcon.classList.remove('clicked');
            areaIcon.classList.remove('clicked');
        });

        thEmail.addEventListener('click', () => {
            emailIcon.classList.toggle('clicked');
            idIcon.classList.remove('clicked');
            nameIcon.classList.remove('clicked');
            lastnameIcon.classList.remove('clicked');
            rolIcon.classList.remove('clicked');
            areaIcon.classList.remove('clicked');
        });

        thRol.addEventListener('click', () => {
            rolIcon.classList.toggle('clicked');
            idIcon.classList.remove('clicked');
            nameIcon.classList.remove('clicked');
            lastnameIcon.classList.remove('clicked');
            emailIcon.classList.remove('clicked');
            areaIcon.classList.remove('clicked');
        });

        thArea.addEventListener('click', () => {
            areaIcon.classList.toggle('clicked');
            idIcon.classList.remove('clicked');
            nameIcon.classList.remove('clicked');
            lastnameIcon.classList.remove('clicked');
            emailIcon.classList.remove('clicked');
            rolIcon.classList.remove('clicked');
        });
    </script>

    <style>
        {
            margin: 0;
            padding: 0;
            font-family: 'poppins',sans-serif;
        }

        section{
            display: flex;
            justify-content: center;
            /*align-items: center;*/
            min-height: 100vh;
            width: 100%;

            background-color:#F1F6F9;
            background-position: center;
            background-size: cover;
        }

        h2{
            font-size: 2em;
            color: #fff;
            text-align: center;
        }

        #users_filter{
            display: flex;
            align-items: center;
            justify-content: right;
            margin-left: 20rem;
        }

        #users_length{
            margin-left: 1rem;
            margin-bottom: -4rem;
        }

        #users_next{
            margin-left: 1rem;
        }

        #recipientes {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 2rem;
        }

        .forget{
            margin: -15px 0 15px ;
            font-size: .9em;
            color: #fff !important;
            display: flex;
            justify-content: space-between;
        }

        .forget label input{
            margin-right: 3px;

        }
        .forget label a{
            color: #fff;
            text-decoration: none;
        }


        .boton{
            width: 45%;
            height: 30px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: .9em;
            font-weight: 600;
            transition: .3s ease all;
            overflow: hidden;
            text-align: center;
            margin: 25px 0 10px;
            text-decoration-color: #fff;
        }

        .boton:hover {
            background-color: #526D82;
            color: white;
        }

        .boton:active {
            background-color: #526D82;
        }


        .container {
            display: flex;
            justify-content: center;
        }

        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #007bff;
            border-radius: 50%;
            color: #fff;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            z-index: 9999;
        }
        .floating-button:hover {
            background-color: #0056b3;
        }

        /* Estilos para la ventana flotante */
        .floating-message {
            position: fixed;
            bottom: 80px;
            right: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 9999;
        }
        .floating-button:hover + .floating-message {
            opacity: 1;
            visibility: visible;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: .65rem;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: .65rem;
        }

        .editicon {
            display: flex;
            align-items: center;
            gap: 20px;
            justify-content: center;
            margin-right: 1rem;
        }

        .iduser {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ordicon {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: .2rem;
        }

        .orden {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .textid {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Estilos para el gradiente */
        thead {
            background: linear-gradient(to bottom,#205397, #27374D);
            color: #fff;
            /* font-size: .8rem; */
            text-align: center;
        }

        .dataTables_wrapper select,
        .dataTables_wrapper input {
            color: #4a5568;
            padding-left: 1rem;
            /*padding-right: 1rem;*/
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
            margin-bottom: 1.4rem;
            justify-content: right;
            margin-left: 5px;
        }

        .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            /*padding-right: 1rem;*/
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
            margin-bottom: 1.4rem;
            justify-content: right;
            width: 60%;
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
            display: inline-block;
            width: 2%;
            text-align: center;
            margin-right: .5rem;
            margin-left: .5rem;
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
        }

        .paginate_button {
            margin: .4rem;
        }

        /* Estilos para los iconos de ordenamiento de las tablas*/
        #icon-id {
            transition: transform 0.1s;
        }

        #icon-id.clicked {
            transform: rotate(180deg);
        }

        #icon-nombre {
            transition: transform 0.1s;
        }

        #icon-nombre.clicked {
            transform: rotate(180deg);
        }

        #icon-apellido {
            transition: transform 0.1s;
        }

        #icon-apellido.clicked {
            transform: rotate(180deg);
        }

        #icon-email {
            transition: transform 0.1s;
        }

        #icon-email.clicked {
            transform: rotate(180deg);
        }

        #icon-rol {
            transition: transform 0.1s;
        }

        #icon-rol.clicked {
            transform: rotate(180deg);
        }

        #icon-area {
            transition: transform 0.1s;
        }

        #icon-area.clicked {
            transform: rotate(180deg);
        }

        .footer {
            background-color: #27374D;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer-pagina {
            font-size: 14px;
        }
    </style>

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
