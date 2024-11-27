<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('img/Sekar_Temulawak_logo.png') }}" type="image/x-icon">

    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body class="h-full ">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <x-admin_navbar></x-admin_navbar>
        {{-- <x-admin_sidebar></x-admin_sidebar> --}}
        <x-admin_header>{{ $title }}</x-admin_header>


        <main>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
