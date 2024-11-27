<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-8">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-4 w-full mb-4">
        <!-- Start coding here -->
        <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" action="{{ route('landingpageItem.index') }}" method="GET">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ $search ?? '' }}"
                                class="block w-full p-2 pl-10 text-sm border border-gray-300 rounded-lg"
                                placeholder="Cari barang" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($produks as $item)
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                        <a href="{{ route('admin-produk.show', $item->slug) }}">
                            {{-- {{ dd($item['gambar']) }} --}}
                            <img class="mx-auto h-full dark:hidden"
                                src="{{ asset('storage/produk_img/' . $item['gambar']) }}"
                                alt="gambar{{ $item['gambar'] }}" />
                        </a>
                    </div>
                    <div class="pt-6">
                        {{-- diskon --}}
                        {{-- <div class="mb-4 flex items-center justify-between gap-4">
                            <span
                                class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                Up to 35% off </span>
                        </div> --}}

                        {{-- disini menampilkan nama produk dari data base --}}
                        <a href="{{ route('admin-produk.show', $item->slug) }}"
                            class=" text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">{{ $item['nama'] }}</a>
                        <p class="py-4 text-l font-light leading-tight text-gray-900 dark:text-white"> Stok :
                            {{ $item['stok'] . ' ' . $item['ukuran'] }}
                        </p>



                        {{-- menampilkan harga produk dari database --}}
                        <p class="py-4 text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                            {{ number_format($item['harga'], 0, ',', '.') }}
                            <b>IDR</b>
                        </p>

                        <div class="flex justify-end ">
                            <a href="{{ route('admin-produk.show', $item->slug) }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Detail produk
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="mt-4 flex items-center gap-4 justify-end">
                            <form class="items-center" action="{{ route('keranjang.create') }}" method="GET">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $item['id'] }}">
                                <button type="submit"><svg
                                        class="text-orange-700 hover:text-yellow-400 w-6 h-6 text-gray-800 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg></button>
                            </form>
                            <form action="{{ route('beli.index') }}" method="GET">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $item['id'] }}">
                                <input type="hidden" name="nama_produk" value="{{ $item['nama'] }}">
                                <input type="hidden" name="harga_produk" value="{{ $item['harga'] }}">
                                <button type="submit"
                                    class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Beli
                                </button>
                            </form>

                            <div class="flex gap-2">
                                <!-- Share ke WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(route('landingpage.show', $item->slug)) }}"
                                    target="_blank" class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0C5.373 0 0 5.373 0 12c0 2.042.51 3.96 1.405 5.647L0 24l6.578-1.387A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm-.15 21.65c-1.742 0-3.426-.458-4.912-1.332l-.352-.208-3.901.821.833-3.797-.229-.38A9.71 9.71 0 0 1 2.29 12c0-5.357 4.356-9.71 9.71-9.71 5.357 0 9.71 4.356 9.71 9.71 0 5.357-4.353 9.71-9.71 9.71z" />
                                    </svg>
                                </a>

                                <!-- Share ke Twitter -->

                            </div>

                        </div>
                    </div>
                </div>

                {{-- <form id="delete-form" action="{{ route('produk.delete', $item->id) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form> --}}
            @endforeach
            <script>
                function confirmDeletion(event) {
                    event.preventDefault(); // Mencegah form langsung dikirim

                    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                        // Jika pengguna menekan OK, submit form
                        document.getElementById('delete-form').submit();
                    }
                }
            </script>




        </div>

    </div>
    <div class=" flex w-full justify-evenly m-4">{{ $produks->links() }}</div>


</section>
