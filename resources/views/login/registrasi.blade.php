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
    <title>Registrasi</title>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-100">

    <!-- Modal Background -->
    <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
        <!-- Modal Card -->
        <div class="bg-gray-900 text-white p-8 rounded-lg w-full max-w-sm shadow-lg relative">
            <!-- Close Button -->
            <a href="/" class="absolute  top-3 right-3 text-primary-600 hover:text-primary-700">&times;</a>
            {{-- <button id="closeModalBtnRegister" class="absolute top-3 right-3 text-gray-400 hover:text-white">
                &times;
            </button> --}}

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-6">Buat akun baru</h2>

            <!-- Form -->
            <form action="{{ route('registrasi.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Input -->
                <div>
                    <label for="registerEmail" class="block text-sm font-medium mb-1">Nama </label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 rounded-lg bg-gray-800 
                        focus:ring-2 focus:ring-primary-500 outline-none"
                        value="{{ old('name') }}" required>

                    @error('name')
                        is-invalid
                    @enderror
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="registerEmail" class="block text-sm font-medium mb-1">Username </label>
                    <input type="text" id="username" name="username"
                        class="w-full p-3 rounded-lg bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none "
                        value="{{ old('username') }}" required>

                    @error('username')
                        is-invalid
                    @enderror
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="registerEmail" class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 rounded-lg bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none"
                        value="{{ old('email') }}" required>

                    @error('email')
                        is-invalid
                    @enderror
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="registerEmail" class="block text-sm font-medium mb-1">Password </label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 rounded-lg bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none "
                        value="{{ old('password') }}" required>

                    @error('password')
                        is-invalid
                    @enderror
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-500 text-white font-semibold p-3 rounded-lg transition">
                    Register
                </button>
            </form>

            <!-- Footer Links -->
            <p class="text-center text-sm text-gray-400 mt-6">
                Sudah Punya Akun? <a href="/login" class="text-primary-400 hover:underline">Masuk </a>
            </p>
        </div>
    </div>

    <!-- JavaScript -->
    {{-- <script>
        const openModalBtnRegister = document.getElementById('openModalBtnRegister');
        const closeModalBtnRegister = document.getElementById('closeModalBtnRegister');
        const registerModal = document.getElementById('registerModal');

        // Open modal when the Register button is clicked
        openModalBtnRegister.addEventListener('click', (e) => {
            e.preventDefault();
            registerModal.classList.remove('hidden');
        });

        // Close modal when the Close button is clicked
        closeModalBtnRegister.addEventListener('click', () => {
            registerModal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content
        window.addEventListener('click', (e) => {
            if (e.target === registerModal) {
                registerModal.classList.add('hidden');
            }
        });
    </script> --}}

</body>

</html>
