<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <form action="{{ route('produk.update', $produk->slug) }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Produk</label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $produk->nama }}" value="{{ old('nama', $produk->nama) }}" required="">
                    </div>

                    <div class="w-full">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="number" name="harga" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $produk->harga }}" value="{{ old('harga', $produk->harga) }}"
                            required="">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bahan</label>
                        <input type="text" name="bahan" id="bahan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $produk->bahan }}" value="{{ old('bahan', $produk->bahan) }} "
                            required="">
                    </div>
                    <div class="w-full">
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manfaat</label>
                        <input type="text" name="manfaat" id="manfaat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $produk->manfaat }}" value="{{ old('manfaat', $produk->manfaat) }}"
                            required="">
                    </div>


                    <div>
                        <label for="item-weight"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                        </label>
                        <input type="number" name="stok" id="stok"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="{{ $produk->stok }}" value="{{ old('stok', $produk->stok) }}" required="">
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ukuran</label>
                        <select id="ukuran" name="ukuran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Kardus" {{ $produk->ukuran == 'Kardus' ? 'selected' : '' }}>Kardus
                            </option>
                            <option value="Botol" {{ $produk->ukuran == 'Botol' ? 'selected' : '' }}>Botol</option>
                            <option value="Cup" {{ $produk->ukuran == 'Cup' ? 'selected' : '' }}>Cup</option>
                            <option value="Sachet" {{ $produk->ukuran == 'Sachet' ? 'selected' : '' }}>Sachet
                            </option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                            Produk</label>
                        <main>
                            <style>
                                trix-toolbar .trix-button-group--file-tools {
                                    display: none !important;
                                }
                            </style>

                            <trix-toolbar id="my_toolbar"></trix-toolbar>
                            <div class="more-stuff-inbetween"></div>

                            <!-- Trix Editor -->
                            <trix-editor name="deskripsi" toolbar="my_toolbar" input="my_input"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 
                                               focus:ring-primary-500 focus:border-primary-500 
                                               dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </trix-editor>

                            <!-- Input Hidden -->
                            <input id="my_input" type="hidden" name="deskripsi"
                                value="{{ old('stok', $produk->deskripsi) }}">
                        </main>
                    </div>
                </div>

                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                    Saat
                    ini</label>
                <div class="my-4 w-full bg-gray-50 border border-gray-300  p-2 ">
                    <img src="{{ asset('storage/produk_img/' . $produk->gambar) }}" alt="">
                </div>
                <input type="hidden" name="oldImg" value="{{ $produk['gambar'] }}">


                {{--  --}}


                <div class="col-span-full mt-4">
                    <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Gambar
                        Artikel</label>
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
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
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


                <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                    onclick="window.history.back();">
                    Batal
                </button>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan
                </button>
                {{-- <label for="">{{ $produk->slug }}</label> --}}
            </form>
        </div>
    </section>
</x-admin_layout>
