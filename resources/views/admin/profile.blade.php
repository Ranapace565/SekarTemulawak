<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-4xl mx-auto my-8 bg-white p-8 shadow-md rounded-lg">
        <!-- Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Profil Toko Sekar Temulawak</h2>
            <p class="text-sm text-gray-600">Kelola informasi profil Toko untuk mengontrol, memperbarui, melindungi dan
                mengamankan akun toko</p>
        </div>

        <!-- Profile Form -->
        <form>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="md:col-span-2 space-y-4">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username Admin</label>
                        <input type="text" id="username" value="{{ $user->name }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-600 focus:ring-primary-600 sm:text-sm mb-4"
                            readonly>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Sekar
                            Temulawak</label>
                        <div class="flex items-center mt-1">
                            <input type="email" id="email" value="{{ $user->email }}"
                                class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary-600 focus:ring-primary-600 sm:text-sm"
                                readonly>
                        </div>
                        {{-- <x-gantiPass></x-gantiPass> --}}
                        {{-- <button type="submit"
                            class="mt-4 px-6 py-2 border border-red-600  text-red-600 rounded-md shadow-sm hover:bg-primary-700 hover:text-primary-50">
                            Ganti Password
                        </button> --}}
                        {{-- <button type="submit"
                            class="px-6 py-2 border border-primary-600  text-primary-600 rounded-md shadow-sm hover:bg-primary-700 hover:text-primary-50">
                            Tambah Admin
                        </button> --}}
                    </div>


                    {{-- <div class="mt-8 flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 border border-primary-600  text-primary-600 rounded-md shadow-sm hover:bg-primary-700 hover:text-primary-50">
                            Ubah Informasi Akun
                        </button>
                    </div> --}}

                    {{-- <h2 class="text-lg font-semibold text-gray-900 mb-4">Alamat Toko Sekar Temulawak</h2>

                    <div>
                        <input type="text" id="storeName" value=""
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-600 focus:ring-primary-600 sm:text-sm"
                            placeholder="Provinsi, Kota, Kecamatan, Kode Pos" readonly>
                    </div>
                    <div>
                        <input type="text" id="storeName" value=""
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-600 focus:ring-primary-600 sm:text-sm"
                            placeholder="Nama Jalan, Gedung, No. Rumah" readonly>
                    </div>
                    <div>
                        <input type="text" id="storeName" value=""
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-600 focus:ring-primary-600 sm:text-sm"
                            placeholder="Detail Lainnya (Cth: BLok / Unit No., Patokan)" readonly>
                    </div>


                    <div
                        class="w-full h-32 bg-gray-100 flex items-center justify-center border border-dashed rounded-md border-gray-300 mb-4">
                        <button type="button"
                            class="p-2 border border-gray-300 rounded-md bg-white text-gray-700 hover:bg-gray-50">
                            + Tambah Lokasi
                        </button>
                    </div>

                    <!-- Label as Section -->
                    <div class="mb-6">

                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 border border-primary-600  text-primary-600 rounded-md shadow-sm hover:bg-primary-700 hover:text-primary-50">
                                Ubah Ubah Alamat
                            </button>
                        </div>
                    </div> --}}

                </div>

                <!-- Right Column -->
                {{-- <div class="flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/Sekar_Temulawak_logo.png') }}" alt="Profile Image"
                            class="w-24 h-24 rounded-full bg-gray-200 mb-4">
                        <button type="submit"
                            class="px-6 py-2 border border-primary-600  text-primary-600 rounded-md shadow-sm hover:bg-primary-700 hover:text-primary-50">
                            Pilih Gambar
                        </button>
                        <p class="mt-2 text-xs text-gray-500">Ukuran gambar: maks. 1 MB</p>
                        <p class="text-xs text-gray-500">Format gambar: .JPEG, .PNG</p>
                    </div>
                </div> --}}
            </div>

            <!-- Save Button -->

        </form>
    </div>
    {{-- <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <!-- Modal -->
        <div class="bg-white rounded-lg w-full max-w-md p-6">
            <!-- Modal Header -->
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Alamat Baru</h2>

            <!-- Form -->
            <form>
                <!-- Full Name and Phone Number -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" placeholder="Nama Lengkap"
                        class="w-full p-2 border rounded-md border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                    <input type="text" placeholder="Nomor Telepon"
                        class="w-full p-2 border rounded-md border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                </div>

                <!-- Province, City, District, Zip Code -->
                <div class="mb-4">
                    <select
                        class="w-full p-2 border rounded-md border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                        <option>Provinsi, Kota, Kecamatan, Kode Pos</option>
                    </select>
                </div>

                <!-- Street, Building, House Number -->
                <div class="mb-4">
                    <input type="text" placeholder="Nama Jalan, Gedung, No. Rumah"
                        class="w-full p-2 border rounded-md border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                </div>

                <!-- Additional Details -->
                <div class="mb-4">
                    <input type="text" placeholder="Detail Lainnya (Cth: Blok / Unit No., Patokan)"
                        class="w-full p-2 border rounded-md border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                </div>

                <!-- Map Placeholder -->
                <div
                    class="w-full h-32 bg-gray-100 flex items-center justify-center border border-dashed rounded-md border-gray-300 mb-4">
                    <button type="button"
                        class="p-2 border border-gray-300 rounded-md bg-white text-gray-700 hover:bg-gray-50">
                        + Tambah Lokasi
                    </button>
                </div>

                <!-- Label as Section -->
                <div class="mb-6">
                    <label class="text-sm text-gray-700">Tandai Sebagai:</label>
                    <div class="flex space-x-4 mt-2">
                        <button type="button"
                            class="px-4 py-2 border rounded-md text-gray-500 border-gray-300 hover:bg-gray-50">Rumah</button>
                        <button type="button"
                            class="px-4 py-2 border rounded-md text-gray-500 border-gray-300 hover:bg-gray-50">Kantor</button>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <button type="button" class="text-gray-500 hover:underline">Nanti Saja</button>
                    <button type="submit" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        OK
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
</x-admin_layout>
