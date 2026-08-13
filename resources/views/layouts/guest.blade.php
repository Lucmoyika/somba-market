<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="min-h-screen sombra-surface text-slate-900 antialiased dark:bg-slate-950 dark:text-slate-100">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 sm:px-6 sombra-surface dark:bg-slate-950">
            <div class="w-full max-w-md px-4 py-6 sm:px-6">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
