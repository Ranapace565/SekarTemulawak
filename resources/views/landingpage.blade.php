<x-landingpage_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mx-auto max-w-screen-xl px-4 py-8 bg-primary-600 mb-6">
        <div class="flex text-4xl  mx-auto max-w-screen-xl justify-center mb-4">
            <h1 class="text-primary-50 border-b-4 mb-2 text ">Produk</h1>
        </div>
        <div class="flex space-x-4 overflow-x-auto scrollbar-hide sm:grid-cols-1">

            @foreach ($produk as $item)
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-64 h-64 overflow-hidden rounded-lg bg-gray-100">
                        <a href="{{ route('admin-produk.show', $item->slug) }}">
                            {{-- {{ dd($item['gambar']) }} --}}
                            <img class="mx-auto h-full dark:hidden"
                                src="{{ asset('storage/produk_img/' . $item['gambar']) }}"
                                alt="gambar{{ $item['gambar'] }}" />
                        </a>
                    </div>

                    <div class="pt-6">

                        <a href="{{ route('admin-produk.show', $item->slug) }}"
                            class=" text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">{{ $item['nama'] }}</a>
                        {{-- <p class="py-4 text-l font-light leading-tight text-gray-900 dark:text-white"> Stok :
                            {{ $item['stok'] . ' ' . $item['ukuran'] }}
                        </p> --}}



                        {{-- menampilkan harga produk dari database --}}
                        <p class="py-4 text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                            {{ $item['harga'] }} <b>IDR</b>
                        </p>

                        <div class="flex justify-start ">
                            <a href="{{ route('admin-produk.show', $item->slug) }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Detail produk
                                <svg class="w-6 h-6 text-primary-700 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12.013 6.175 7.006 9.369l5.007 3.194-5.007 3.193L2 12.545l5.006-3.193L2 6.175l5.006-3.194 5.007 3.194ZM6.981 17.806l5.006-3.193 5.006 3.193L11.987 21l-5.006-3.194Z" />
                                    <path
                                        d="m12.013 12.545 5.006-3.194-5.006-3.176 4.98-3.194L22 6.175l-5.007 3.194L22 12.562l-5.007 3.194-4.98-3.211Z" />
                                </svg>



                            </a>
                        </div>
                        <div class="mt-4 flex items-center gap-4 justify-end">
                            <a href="#" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"
                                class="">
                                <svg class="text-orange-700 hover:text-yellow-400 w-6 h-6 text-gray-800 dark:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">

                                Beli
                            </a>

                        </div>
                    </div>
                </div>

                {{-- <form id="delete-form" action="{{ route('produk.delete', $item->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form> --}}
            @endforeach
        </div>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 py-8 bg-primary-600 mb-6">
        <div class="flex text-4xl  mx-auto max-w-screen-xl justify-center mb-4">
            <h1 class="text-primary-50 border-b-4 mb-2 text ">Artikel</h1>
        </div>
        <div class="flex space-x-4 overflow-x-auto scrollbar-hide sm:grid-cols-1">
            {{--  --}}
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">


                <div class="pt-6">
                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">
                        {{-- {{ $post['judul'] }} --}}
                        ini bagian judul ygy
                    </a>
                    <p class="py-4 text-sm font-light leading-tight text-gray-900 dark:text-white">
                        Tanggal
                        {{-- Diposting: {{ $post['created_at']->diffForHumans() }} --}}
                    </p>
                    <p class="py-2 font-light text-gray-500 dark:text-gray-400 w-80">
                        {{-- {{ Str::limit($post['konten'], 100) }} --}}
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse omnis vel sapiente corporis?
                        Fugit ab nostrum eveniet nisi nulla et, nihil delectus, illum impedit dolore qui consequuntur
                        accusantium illo sit.
                    </p>

                    <div class="flex justify-end">
                        <a href="#"
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

                    <div class="mt-4 flex items-center justify-between gap-4">



                    </div>
                </div>
            </div>
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">


                <div class="pt-6">
                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">
                        {{-- {{ $post['judul'] }} --}}
                        ini bagian judul ygy
                    </a>
                    <p class="py-4 text-sm font-light leading-tight text-gray-900 dark:text-white">
                        Tanggal
                        {{-- Diposting: {{ $post['created_at']->diffForHumans() }} --}}
                    </p>
                    <p class="py-2 font-light text-gray-500 dark:text-gray-400 w-80">
                        {{-- {{ Str::limit($post['konten'], 100) }} --}}
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse omnis vel sapiente corporis?
                        Fugit ab nostrum eveniet nisi nulla et, nihil delectus, illum impedit dolore qui consequuntur
                        accusantium illo sit.
                    </p>

                    <div class="flex justify-end">
                        <a href="#"
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

                    <div class="mt-4 flex items-center justify-between gap-4">



                    </div>
                </div>
            </div>
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">


                <div class="pt-6">
                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">
                        {{-- {{ $post['judul'] }} --}}
                        ini bagian judul ygy
                    </a>
                    <p class="py-4 text-sm font-light leading-tight text-gray-900 dark:text-white">
                        Tanggal
                        {{-- Diposting: {{ $post['created_at']->diffForHumans() }} --}}
                    </p>
                    <p class="py-2 font-light text-gray-500 dark:text-gray-400 w-80">
                        {{-- {{ Str::limit($post['konten'], 100) }} --}}
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse omnis vel sapiente corporis?
                        Fugit ab nostrum eveniet nisi nulla et, nihil delectus, illum impedit dolore qui consequuntur
                        accusantium illo sit.
                    </p>

                    <div class="flex justify-end">
                        <a href="#"
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

                    <div class="mt-4 flex items-center justify-between gap-4">



                    </div>
                </div>
            </div>
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">


                <div class="pt-6">
                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">
                        {{-- {{ $post['judul'] }} --}}
                        ini bagian judul ygy
                    </a>
                    <p class="py-4 text-sm font-light leading-tight text-gray-900 dark:text-white">
                        Tanggal
                        {{-- Diposting: {{ $post['created_at']->diffForHumans() }} --}}
                    </p>
                    <p class="py-2 font-light text-gray-500 dark:text-gray-400 w-80">
                        {{-- {{ Str::limit($post['konten'], 100) }} --}}
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse omnis vel sapiente corporis?
                        Fugit ab nostrum eveniet nisi nulla et, nihil delectus, illum impedit dolore qui consequuntur
                        accusantium illo sit.
                    </p>

                    <div class="flex justify-end">
                        <a href="#"
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

                    <div class="mt-4 flex items-center justify-between gap-4">



                    </div>
                </div>
            </div>
            <div
                class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">


                <div class="pt-6">
                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">
                        {{-- {{ $post['judul'] }} --}}
                        ini bagian judul ygy
                    </a>
                    <p class="py-4 text-sm font-light leading-tight text-gray-900 dark:text-white">
                        Tanggal
                        {{-- Diposting: {{ $post['created_at']->diffForHumans() }} --}}
                    </p>
                    <p class="py-2 font-light text-gray-500 dark:text-gray-400 w-80">
                        {{-- {{ Str::limit($post['konten'], 100) }} --}}
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse omnis vel sapiente corporis?
                        Fugit ab nostrum eveniet nisi nulla et, nihil delectus, illum impedit dolore qui consequuntur
                        accusantium illo sit.
                    </p>

                    <div class="flex justify-end">
                        <a href="#"
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

                    <div class="mt-4 flex items-center justify-between gap-4">



                    </div>
                </div>
            </div>

        </div>
    </div>
</x-landingpage_layout>
