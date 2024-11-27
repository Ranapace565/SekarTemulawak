<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Team</h2>
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">


                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-4">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Team</label>
                        <input value="{{ old('name') }}" type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Reza Herlabang" required="">
                        @error('nama')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label for="posisi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                        <input value="{{ old('harga') }}" type="text" name="posisi" id="posisi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Manager" required="">
                        @error('harga')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="bahan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bahan</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" value="{{ old('deskripsi') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Orang yang ceria dan ramah"></textarea>

                    </div>

                </div>



                {{--  --}}

                <div class="col-span-full mt-4">
                    <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Foto Team</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <img id="image-preview" class="mx-auto h-40 w-auto object-cover mb-4 hidden"
                                alt="Preview Gambar" />
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                    <span>Upload gambar</span>
                                    <input id="file-upload" name="gambar" type="file" class="sr-only"
                                        accept="image/*" onchange="previewImage(event)">
                                    @error('gambar')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </label>
                                <p class="pl-1">atau seret dan jatuhkan</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG or JPG</p>
                        </div>
                    </div>
                </div>

                <script>
                    // Fungsi untuk menampilkan preview gambar
                    function previewImage(event) {
                        const input = event.target;
                        const file = input.files[0];

                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.getElementById('image-preview');
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                </script>

                {{--  --}}
                <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                    onclick="window.history.back();">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Tambah Produk
                </button>
            </form>
        </div>
    </section>
</x-admin_layout>
