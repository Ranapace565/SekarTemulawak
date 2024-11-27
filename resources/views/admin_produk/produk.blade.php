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
                        alt="gambar{{ $produk['gambar'] }}" alt="" />
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
                            class="block mb-2 text-sm font-medium dark:text-white text-primary-600"><b>Stok Terdaftar
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


            <a href="{{ route('admin-produk.edit', $produk->slug) }}"
                class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                </svg>
                Ubah
            </a>


            <a href="{{ route('produk.delete', $produk->id) }}"
                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Hapus
            </a>

        </div>

    </section>
</x-admin_layout>
