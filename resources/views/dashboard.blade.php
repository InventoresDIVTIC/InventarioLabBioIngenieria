<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>CUCEI LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>

<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
    <section style="align-items: center;">
        @if(Auth::check() && Auth::user()->hasAnyRole(['Web designer', 'Admin']))
        <style>
            .fade-in {
                animation: fadeIn 1s ease forwards;
                opacity: 0;
                transform: translateY(-20px);
                }

            @keyframes fadeIn {
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            .styled-heading {
                    color: #fff;
                    font-size: 2.5rem;
                    text-align: center;
                    text-transform: uppercase;
                    padding: 20px;
                    background: linear-gradient(90deg, #010328, #8288fd);
                    border-radius: 8px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    position: relative;
                    overflow: hidden;
                }

                .styled-heading::before {
                    content: '';
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 300%;
                    height: 300%;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 50%;
                    transform: translate(-50%, -50%) scale(0);
                    transition: transform 0.6s ease;
                    z-index: 0;
                }

                .styled-heading:hover {
                    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.3);
                }

                .styled-heading:hover::before {
                    transform: translate(-50%, -50%) scale(1);
                }

                .styled-heading span {
                    position: relative;
                    z-index: 1;
                }
                .floating-button {
                    display: inline-block;
                    padding: 15px 30px;
                    background-color: #4CAF50; /* Color verde */
                    color: white;
                    text-decoration: none;
                    font-size: 18px;
                    border-radius: 25px; /* Bordes redondeados */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
                    transition: background-color 0.3s, transform 0.3s; /* Transición suave */
                }

                .floating-button:hover {
                    background-color: #45a049; /* Color más oscuro al pasar el mouse */
                    transform: translateY(-2px); /* Efecto de elevación */
                }
        </style>
            <div>
                <h2 class="styled-heading fade-in"><span>Dashboard</span></h2>
                <div class="px-6 py-8 mx-auto">
                    <div class="mt-8">
                        <div class="gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4" style="text-align: center;">
                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-right: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                    <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="7" y="9" width="14" height="10" rx="2" />  <circle cx="14" cy="14" r="2" />  <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Gastos Mensuales</p>
                                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $totalGastosMensualesFormateado }}</h4>
                                </div>
                            </div>
                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;margin-right: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-700 to-blue-500 text-white shadow-blue-600/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                    <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Usuarios</p>
                                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $totalUsuarios }}</h4>
                                </div>
                            </div>

                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-purple-800 to-purple-500 text-white shadow-purple-700/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                    <svg class="h-8 w-8 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                                        <polyline points="13 2 13 9 20 9" />
                                    </svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Activos</p>
                                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ $totalActivos }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="px-6 py-3 mx-auto">
                            <div class="gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4" style="text-align: center;">
                                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-right: 4px;">
                                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-700 to-green-500 text-white shadow-green-600/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                        <svg class="h-8 w-8 text-slate-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <rect x="6" y="8" width="12" height="10" rx="2" />
                                            <circle cx="12" cy="13" r="2" />
                                            <path d="M6 8v-2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v2" />
                                          </svg>
                                    </div>
                                    <div class="p-4 text-right">
                                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total activos funcionales</p>
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ round($porcentajeFuncionales, 2)}}%</h4>
                                    </div>
                                </div>
                                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;margin-right: 4px;">
                                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-yellow-700 to-yellow-500 text-white shadow-yellow-600/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                        <svg class="h-8 w-8 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z"/>
                                          <path d="M12 9v2m0 4v.01" />
                                          <path d="M5.5 19h13l-6.5 -14z" />
                                        </svg>
                                      </div>
                                    <div class="p-4 text-right">
                                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total activos pendientes de revisión</p>
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ round($porcentajeMantenimiento, 2)}}%</h4>
                                    </div>
                                </div>

                                <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;">
                                    <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-red-800 to-red-500 text-white shadow-red-700/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center fade-in">
                                        <svg class="h-8 w-8 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <div class="p-4 text-right">
                                        <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total activos no funcionales o dados de baja</p>
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ round($porcentajeBaja, 2)}}%</h4>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center; position: relative; margin-top: 50px;">
                                <!-- Botón flotante para actualizar next_mprev -->
                                <a href="{{ route('actualizar.next.mprev') }}" class="floating-button">
                                    <h2 style="margin: 0; color: white;">Actualizar Mantenimientos Preventivos</h2>
                                </a>
                            </div>
                    </div>
                <!-- Estadisticas-->
                <div class="ml-auto mb-2 lg:w-[120%] xl:w-[130%] 2xl:w-[150%]">
                    <div class="px-6">
                        <div class="grid gap-6">
                            <div>
                                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                                    <div class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                                        <div>
                                            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900">Tabla de Próximos Mantenimientos Preventivos</h6>
                                        </div>
                                    </div>
                                    <div class="p-6 px-0 pt-0 pb-2">
                                        <table class="w-full min-w-[1280px] table-auto">
                                            <thead>
                                                <tr>
                                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                        <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">ID</p>
                                                    </th>
                                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                        <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Activo</p>
                                                    </th>
                                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                        <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Fecha</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mantenimientosProximos as $mantenimiento)
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">{{ $mantenimiento->id}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">{{ $mantenimiento->type }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">{{ $mantenimiento->next_mprev }}</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Tabla de Usuarios Activos -->
            <div class="container px-6 py-8 mx-auto">
                <div class="flex flex-col mt-4">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <?php
                                $users = DB::table('users')
                                ->select('id','name', 'lastname', 'email', 'rol', 'area', 'last_seen')
                                ->orderBy('last_seen', 'desc')
                                ->limit(10)
                                ->get();
                            ?>
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            NOMBRE</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            AREA</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            ROL</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            ESTADO</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            VISTO ULTIMA VEZ</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php
                                        foreach ($users as $user) { ?>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                        </div>

                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                                <?php echo "{$user->name} {$user->lastname}"; ?>
                                                            </div>
                                                            <div class="text-sm leading-5 text-gray-500">
                                                                <?php echo "{$user->email}"; ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900"><?php echo "{$user->area}"; ?></div>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    <?php echo "{$user->rol}"; ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span>
                                                        @if(Cache::has('user-is-online-' . $user->id))
                                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Online</span>
                                                        @else
                                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Offline</span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    <tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(Auth::check() && Auth::user()->hasAnyRole(['Usuario', 'Prestador de servicio']))
            <div>
                <style>
                    section {
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
                    .welcome-container {
                        font-family: Arial, sans-serif;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin: 0;
                        
                    }
                    .welcome-box {
                        text-align: center;
                        /*background-color: #ffffff; */
                        padding: 40px;
                        border-radius: 10px;
                        /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
                        animation: fadeIn 2s ease-in-out;

                        
                        /*width: 80rem; */
                        backdrop-filter: blur(15px);
                        border-radius: 10px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        animation: fadeIn 2s ease-in-out;

                    }
                    .welcome-title {
                        color: white;
                        font-size: 2rem;
                        text-transform: uppercase;
                        margin: 0;
                        animation: slideIn 2s ease-in-out;
                        
                    }
                    .welcome-title-lab{
                        color: white;
                        font-size: 3rem;
                        font-weight: bold;
                        text-transform: uppercase;
                        margin: 0;
                        animation: slideIn 2s ease-in-out;
                        margin-top: -0.5rem;
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
                        <h1 class="welcome-title-lab">LABORATORIO DE BIOINGENIERIA</h1>
                        <h2 class="welcome-title">¡Hola y bienvenido!</h2>
                    </div>
                </div>
            </div>
        @endif
        </section>
    </x-app-layout>
</body>

</html>
