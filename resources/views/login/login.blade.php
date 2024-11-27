<!DOCTYPE html>
<html lang="en">

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

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-100">


    </div>
    <!-- Modal Background -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <!-- Modal Card -->
        <div class="bg-gray-900 text-white p-8 rounded-lg w-full max-w-sm shadow-lg relative">
            <!-- Close Button -->
            {{-- <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                &times;
            </button> --}}
            <a href="{{ route('landingpage.index') }}"
                class="absolute top-3 right-3 text-primary-600 hover:text-primary-700">&times;</a>

            <!-- Logo (Optional) -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/Sekar_Temulawak_logo.png') }}" alt="Sekar Temulawak" class="w-40 ">
                {{-- <svg class="w-10 h-10 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 3c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zM12 12c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z">
                    </path>
                    <path
                        d="M5 12c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zM2 18c0-2.2 3.6-3.5 6-3.5s6 1.3 6 3.5v1H2v-1zM20 12c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zM17 18c0-2.2-3.6-3.5-6-3.5s-6 1.3-6 3.5v1h12v-1z">
                    </path>
                </svg> --}}
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-6">Masuk dengan akun anda</h2>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- Form -->
            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                <!-- Email Input -->
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 rounded-lg bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none "
                        required autofocus value="{{ old('email') }}">

                    {{-- @error('email')
                            is-invalid
                        @enderror
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" id="password" type="password" name="password"
                        class="w-full p-3 rounded-lg bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none"
                        required>
                </div>


                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-500 text-white font-semibold p-3 rounded-lg transition">
                    Sign in
                </button>
            </form>

            <!-- Footer Links -->
            <p class="text-center text-sm text-gray-400 mt-6">
                Belum Punya Akun ? <a class="text-primary-600 hover:underline"
                    href="{{ route('registrasi.index') }}">Daftar</a>
            </p>
        </div>
    </div>

</body>

</html>
