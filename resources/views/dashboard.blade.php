<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bioingenieria.inventores.org/css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>DEV LAB DE BIOINGENIERIA</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
</head>

<body class="min-w-full inline-block min-w-min md:min-w-0 md:inline">
    <x-app-layout>
        <section>
            <div>
                <h2 style="color: #808080; font-size: 2.5rem; text-align: center; text-transform: uppercase; padding-top: 20px;">Dashboard</h2>
                <div class="px-6 py-8 mx-auto">
                    <div class="mt-8">
                        <div class="gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4" style="text-align: center;">
                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-right: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                    <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="7" y="9" width="14" height="10" rx="2" />  <circle cx="14" cy="14" r="2" />  <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Gastos Mensuales</p>
                                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">$5k</h4>
                                </div>
                            </div>
                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;margin-right: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg class="h-8 w-8 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <path d="M16 3.13a4 4 0 0 1 0 7.75" />  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Usuarios</p>
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">4</h4>
                                </div>
                            </div>
                            <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md" style="display: inline-block;width: 32.5%;margin-left: 4px;">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-purple-600 to-purple-400 text-white shadow-purple-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg class="h-8 w-8 text-slate-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />  <polyline points="13 2 13 9 20 9" /></svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total de Activos</p>
                                        <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">16</h4>
                                </div>
                            </div>
                            <!-- <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                                <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                                        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                                    </svg>
                                </div>
                                <div class="p-4 text-right">
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Datos de Activo</p>
                                    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">Cable adaptador</h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- Estadisticas-->
                <div class="ml-auto mb-2 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
                    <div class="px-6 2xl:container">
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                                    <div class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                                        <div>
                                            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900">Tabla de Proximos Mantenimientos Preventivos</h6>
                                        </div>
                                    </div>
                                    <div class="p-6 px-0 pt-0 pb-2">
                                        <table class="w-full min-w-[640px] table-auto">
                                            <thead>
                                                <tr>
                                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                        <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Activo</p>
                                                    </th>
                                                    <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                                        <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">Fecha</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Cable adaptor de alimentación</p>
                                                        </div>
                                                    </td>              

                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">2024-08-28</p>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Transductor para Ultrasonido Doppler</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">2024-02-21</p>
                                                    </td>
                                        
                                                </tr>  
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Ventilador para Cuidados Intensivos</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">2024-03-02</p>
                                                    </td>
                                            
                                                </tr>
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Cable ECG Monitor Desfibrilador Cardiaco</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">2024-06-06</p>
                                                    </td>
                                            
                                                </tr>
                                                <tr>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <div class="flex items-center gap-4">
                                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Monitor Desfibrilador Cardiaco</p>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-5 border-b border-blue-gray-50">
                                                        <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">2024-12-12</p>
                                                    </td>
                                            
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                                    <h5 class="text-xl text-gray-700">Comparación de Gastos con el mes anterior</h5>
                                    <div class="my-8">
                                        <h1 class="text-5xl font-bold text-gray-800">- 4,5%</h1>
                                        <span class="text-gray-500">Comparado con el mes pasado</span>
                                    </div>
                                    <svg class="w-full" viewBox="0 0 218 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 67.5C27.8998 67.5 24.6002 15 52.5 15C80.3998 15 77.1002 29 105 29C132.9 29 128.6 52 156.5 52C184.4 52 189.127 63.8158 217.027 63.8158" stroke="url(#paint0_linear_622:13664)" stroke-width="3" stroke-linecap="round"/>
                                        <path d="M0 67.5C27.2601 67.5 30.7399 31 58 31C85.2601 31 80.7399 2 108 2C135.26 2 134.74 43 162 43C189.26 43 190.74 63.665 218 63.665" stroke="url(#paint1_linear_622:13664)" stroke-width="3" stroke-linecap="round"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_622:13664" x1="217.027" y1="15" x2="7.91244" y2="15" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#4DFFDF"/>
                                        <stop offset="1" stop-color="#4DA1FF"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_622:13664" x1="218" y1="18.3748" x2="5.4362" y2="18.9795" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E323FF"/>
                                        <stop offset="1" stop-color="#7517F8"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                    <table class="mt-6 -mb-2 w-full text-gray-600">
                                        <tbody>
                                            <tr>
                                                <td class="py-2">Mes anterior</td>
                                                <td>
                                                    <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                        <path d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5" stroke="url(#paint0_linear_622:13631)" stroke-width="2" stroke-linejoin="round"/>
                                                        <defs>
                                                        <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#E323FF"/>
                                                        <stop offset="1" stop-color="#7517F8"/>
                                                        </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </td>   
                                            </tr>
                                            <tr>
                                                <td class="py-2">Mes actual</td>
                                                
                                                <td>
                                                    <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                        <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                        <path d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5" stroke="url(#paint0_linear_622:13640)" stroke-width="2" stroke-linejoin="round"/>
                                                        <defs>
                                                        <linearGradient id="paint0_linear_622:13640" x1="34" y1="5" x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#8AFF6C"/>
                                                        <stop offset="1" stop-color="#02C751"/>
                                                        </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </td>   
                                            </tr>
                                        </tbody>
                                    </table>   
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
        </section>
    </x-app-layout>
</body>

</html>
