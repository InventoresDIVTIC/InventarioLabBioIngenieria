<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://localhost/labbio/resources/css/dashboard.css">
  <title>DEV LAB DE BIOINGENIERIA</title>
</head>
<body>
        <x-app-layout>
        <section>
            <div>
                <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __("Log in correcto") }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </x-app-layout>
</body>