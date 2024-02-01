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

<body>
    <x-app-layout>
        <section>
            <div>
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
            </div>
            </div>
            </div>
        </section>
    </x-app-layout>
</body>

</html>
