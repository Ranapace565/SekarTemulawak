<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <div class="flex">
                        <a href="/landingpage"
                            class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            &laquo; Kembali
                        </a>
                    </div>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $artikel->title }}
                    </h1>
                    <a href="?kategori={{ $artikel->kategori }}">
                        <span
                            class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            {{ $artikel->kategori }}
                        </span>
                    </a>
                </header>

                {{-- Gambar Artikel --}}
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('storage/artikel_img/' . $artikel->tumbnile) }}" alt="Thumbnail"
                        class="rounded-lg w-full h-full object-cover">
                </div>



                {{-- Isi Artikel --}}
                <div class="text-gray-800 dark:text-gray-300">
                    <p class="mb-4">{!! $artikel->body !!}</p>
                </div>
                {{-- <div class="mt-8 flex items-center justify-end gap-4">
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
                        <svg class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.304 4.844l2.852 2.852M7 7H4a1 1 0 00-1 1v10a1 1 0 001 1h11a1 1 0 001-1v-4.5m2.409-9.91a2.017 2.017 0 010 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 012.852 0z" />
                        </svg>
                        Ubah
                    </a>
                </div> --}}
            </article>
        </div>
    </main>
</x-admin_layout>
