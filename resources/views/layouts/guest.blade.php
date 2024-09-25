<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="h-screen flex flex-col  items-center bg-gray-100 dark:bg-gray-900 px-10">
    <div class="max-w-full w-full flex justify-end py-3">
        <livewire:welcome.navigation/>
    </div>

    <div class="w-full sm:max-w-md my-auto">
        <div class="flex justify-center">
            <a href="/" wire:navigate>
                <x-application-logo class="w-48 fill-current text-gray-500"/>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
