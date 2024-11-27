<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="py-8 bg-white md:py-8 dark:bg-gray-900 antialiased px-2">
        <div class="flex pb-5 pl-8">
            <a href="{{ route('admin-produk.index') }}"
                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                &laquo; Kembali
            </a>
        </div>
        {{-- @foreach ($produk as $item)
            
        @endforeach --}}
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="{{ asset('storage/produk_img/' . $produk['gambar']) }}"
                        alt="gambar{{ $produk['gambar'] }}" />
                    {{-- <img class="w-full hidden dark:block"
                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" /> --}}
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $produk['nama'] }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            {{ $produk['harga'] }} <b>IDR</b>
                        </p>

                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-medium dark:text-white text-primary-600"><b>Stok Tersisa
                                :</b>
                        </label>
                        <p>{{ $produk['stok'] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-primary-600 dark:text-white"><b>Ukuran :</b>
                        </label>
                        <p>{{ $produk['ukuran'] }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-medium dark:text-white text-primary-600"><b>Komposisi
                                :</b>
                        </label>
                        <p>{{ $produk['bahan'] }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-primary-600 dark:text-white"><b>Manfaat :</b>
                        </label>
                        <p>{{ $produk['manfaat'] }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-primary-600 dark:text-white"><b>Deskripsi :</b>
                        </label>
                        <p>{!! $produk['deskripsi'] !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 flex flex-row-reverse items-center gap-4 mx-4">
            <div class="mt-4 flex items-center gap-4 justify-end">
                <form class="items-center" action="{{ route('keranjang.create') }}" method="GET">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk['id'] }}">
                    <button type="submit"><svg
                            class="text-orange-700 hover:text-yellow-400 w-6 h-6 text-gray-800 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg></button>
                </form>
                <form action="{{ route('beli.index') }}" method="GET">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk['id'] }}">
                    <input type="hidden" name="nama_produk" value="{{ $produk['nama'] }}">
                    <input type="hidden" name="harga_produk" value="{{ $produk['harga'] }}">
                    <button type="submit"
                        class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Beli
                    </button>
                </form>

            </div>

        </div>

    </section>
</x-admin_layout>
