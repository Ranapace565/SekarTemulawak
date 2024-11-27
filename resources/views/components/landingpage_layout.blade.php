<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/Sekar_Temulawak_logo.png') }}" type="image/x-icon">

    {{-- @vite('resources/css/app.css') --}}
    <style></style>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('build/assets/app-Cwo8Gwrx.css') }}">
    <script src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>

</head>

<body class="h-full ">
    <div class="min-h-full">
        <x-landingpage_navbar></x-landingpage_navbar>


        <main>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
