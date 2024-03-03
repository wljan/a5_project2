<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ __('Home') }}
                </h2>
            </x-slot>


                <div class="mx-auto">
                    <div class="bg-white m-auto text-center shadow-xl rounded-md mt-8 mx-12 p-4">
<input type="search" class="rounded-md" placeholder="Filter bands.."/>
                    </div>

                    <div class="mx-auto">
                    <div class="bg-white m-auto min-h-40 text-center shadow-xl rounded-md mt-8 mx-12 p-4">
                        
                    </div>
                </div>

        </x-app-layout>
    </body>
</html>
