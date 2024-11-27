<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>


    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-8">
        <div class="max-w-screen-xl px-4 mx-auto lg:px-4 w-full mb-4">
            <!-- Start coding here -->
            <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 mb-4">
                    {{-- <div class="w-full md:w-1/2">
                        <form class="flex items-center" action="/admin-artikel">
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
                    </div> --}}
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" action="/admin-artikel">
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
                    <div
                        class=" flex flex-row items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a href="{{ route('admin-artikel.create') }}">
                            <button type="button"
                                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Artikel
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid gap-8 lg:grid-cols-3">
                {{-- buat perulangan untuk menampilakan semua data artikel --}}
                @foreach ($artikels as $artikel)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="?kategori={{ $artikel->kategori }}">
                                <span
                                    class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $artikel->kategori }}
                                </span>
                            </a>
                            <span class="text-sm">{{ $artikel->created_at->diffForHumans() }}</span>
                        </div>


                        {{-- {{ asset('storage/produk_img/' . $item['gambar']) }}"
                        alt="gambar{{ $item['gambar'] }}"  --}}
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/artikel_img/' . $artikel->tumbnile) }}" alt="Thumbnail"
                                class="mb-4 rounded-lg object-cover w-80 h-48">
                        </div>
                        <h2
                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-primary-700 hover:underline">
                            <a
                                href="{{ route('admin-artikel.show', $artikel->slug) }}">{{ Str::limit($artikel->title, 50, '...') }}</a>
                        </h2>


                        <div class="flex justify-between items-center">
                            <a href="{{ route('admin-artikel.show', $artikel->slug) }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Selengkapnya
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="mt-4 flex items-center justify-end gap-4">
                            <form action="{{ route('admin-artikel.destroy', $artikel->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>

                            <a href="{{ route('admin-artikel.edit', $artikel->slug) }}"
                                class="inline-flex items-center bg-primary-700 px-5 py-2.5 text-sm font-medium text-white rounded-lg hover:bg-primary-800">
                                <svg class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14.304 4.844l2.852 2.852M7 7H4a1 1 0 00-1 1v10a1 1 0 001 1h11a1 1 0 001-1v-4.5m2.409-9.91a2.017 2.017 0 010 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 012.852 0z" />
                                </svg>
                                Ubah
                            </a>
                        </div>
                    </article>
                @endforeach


            </div>
        </div>
    </section>


</x-admin_layout>
