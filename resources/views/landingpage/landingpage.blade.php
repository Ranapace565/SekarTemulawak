<x-landingpage_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="mt-20 relative overflow-hidden">
        <div class="swiper-container w-full aspect-[244/100]">
            <div class="swiper-wrapper flex justify-around" id="board">

                @foreach ($promosi as $promosi)
                    <div class="swiper-slide relative w-full px-2">
                        <img src="{{ asset('storage/promosi_img/' . $promosi->gambar) }}" alt="{{ $promosi->alt }}"
                            class="absolute inset-0 w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach

            </div>

            <!-- Navigasi Slider -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <style>
            .swiper-button-next,
            .swiper-button-prev {
                color: #22c55e;
            }

            /* Hover efek */
            .swiper-button-next:hover,
            .swiper-button-prev:hover {
                color: #16a34a;
            }
        </style>

    </section>
    <!-- Hero Section -->
    <section class="bg-white py-8">
        <div class="container mx-auto flex flex-col md:flex-row items-center p-4 px-16">
            @foreach ($landing as $landing)
                <p class="mb-8">{!! $landing->body !!}</p>
            @endforeach
            {{-- <img src="{{ asset('storage/artikel_img/landingpage2.jpg') }}" alt="Sari Temulawak"
                class="w-full md:w-1/2 rounded-md lg:rounded-full transition-all duration-300 ease-in-out bg-primary-700 ">
            <div class="md:ml-8 mt-8 md:mt-0">
                <h1 class="text-4xl font-bold text-green-600">Apa Itu Sari Temulawak?</h1>
                <p class="mt-4 text-gray-700 ext-indent-8" style="text-indent: 3rem;">
                    Jamu temulawak adalah minuman herbal tradisional asal Indonesia, terbuat dari rimpang temulawak
                    (curcuma xanthorrhiza).
                </p>
                <p class="mt-4 text-gray-700 ext-indent-8" style="text-indent: 3rem;">
                    Temulawak merupakan tanaman yang termasuk dalam keluarga jahe-jahean dan dikenal karena berbagai
                    manfaat kesehatan. Jamu ini telah digunakan selama berabad-abad dalam pengobatan tradisional
                    indonesia sebagai suplemen alami untuk meningkatkan kesehatan tubuh. Temulawak tumbuh subur didaerah
                    tropis, termasuk indonesia.
                </p>
                <p class="mt-4 text-gray-700 ext-indent-8" style="text-indent: 3rem;">
                    Rimpangnya berwarna kuning hingga orange terang, mirip dengan kunyit, tetapi ukurannya lebih besar.
                    Tanaman ini dipercaya memiliki khasiat yang tidak hanya dapat menyembuhkan berbagai penyakit, tetapi
                    juga menjaga keseimbangan tubuh secara keseluruhan. Di masa lalu, jamu temulawak sering diolah oleh
                    tabib atau dukun tradisional dan diberikan kepada masyarakat sebagai obat alami untuk menjaga
                    kesehatan atau menyembuhkan penyakit ringan.
                </p>
            </div> --}}
        </div>
    </section>

    <div id="produks" class="mx-auto max-w-screen-xl px-4 py-8 bg-primary-800 mt-4">
        <div class="flex text-4xl  mx-auto max-w-screen-xl justify-center mb-4">
            <h2 class="text-3xl font-bold text-white mb-8">Produk Kami</h2>
        </div>

        <div class="flex space-x-4 overflow-x-auto scrollbar-hide sm:grid-cols-1 p-4">

            @foreach ($produk as $item)
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-64 h-64 overflow-hidden rounded-lg bg-gray-100">
                        <a href="{{ route('landingpage.show', $item->slug) }}">
                            {{-- {{ dd($item['gambar']) }} --}}
                            <img class="mx-auto h-full dark:hidden"
                                src="{{ asset('storage/produk_img/' . $item['gambar']) }}"
                                alt="gambar{{ $item['gambar'] }}" />
                        </a>
                    </div>

                    <div class="pt-6">

                        <a href="{{ route('landingpage.show', $item->slug) }}"
                            class=" text-lg font-semibold leading-tight text-gray-900 hover:underline hover:text-primary-600 dark:text-white">{{ $item['nama'] }}</a>
                        <p class="py-4 text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                            {{ number_format($item['harga'], 0, ',', '.') }} <b>IDR</b>
                        </p>

                        <div class="flex justify-start ">
                            <a href="{{ route('landingpage.show', $item->slug) }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Detail produk
                                &raquo;



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
            @endforeach

        </div>
        <div class="m-4 flex justify-end">
            <a href="{{ route('landingpageItem.index') }}" class="text-primary-50">Produk Lain &raquo;</a>
        </div>
        <div class=" flex w-full justify-evenly m-4">{{ $produk->links() }}</div>

    </div>
    <div id="blog" class="mx-auto max-w-screen-xl px-4 py-8 bg-white mt-4 ">
        <div class="flex text-4xl  mx-auto max-w-screen-xl justify-center mb-4">
            <h2 class="text-3xl font-bold text-green-600 mb-8">Artikel Edukasi</h2>
        </div>
        <div class="flex space-x-4 overflow-x-auto scrollbar-hidden sm:grid-cols-1 p-4">
            {{--  --}}
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
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-primary-700 hover:underline w-80">
                        {{-- <a href="{{ route('admin-artikel.show', $artikel->slug) }}">{{ $artikel->title }}</a> --}}
                        <a href="{{ route('landingpage.edit', $artikel->slug) }}">{{ Str::limit($artikel->title, 50, '...') }}
                        </a>
                    </h2>


                    <div class="flex justify-between items-center">
                        <a href="{{ route('landingpage.edit', $artikel->slug) }}"
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
                    <div class="flex gap-2">
                        <!-- Share ke WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(route('landingpage.edit', $artikel->slug)) }}"
                            target="_blank" class="text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12c0 2.042.51 3.96 1.405 5.647L0 24l6.578-1.387A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm-.15 21.65c-1.742 0-3.426-.458-4.912-1.332l-.352-.208-3.901.821.833-3.797-.229-.38A9.71 9.71 0 0 1 2.29 12c0-5.357 4.356-9.71 9.71-9.71 5.357 0 9.71 4.356 9.71 9.71 0 5.357-4.353 9.71-9.71 9.71z" />
                            </svg>
                        </a>

                    </div>

                </article>
            @endforeach

        </div>
        <div class=" flex w-full justify-evenly m-4">{{ $artikels->links() }}</div>
    </div>
    <x-team_section :teams="$teams"></x-team_section>
    <section class="bg-primary-800 text-white py-16 md:px-11">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Tentang Kami</h2>
            <div class="flex flex-row md:flex-row items-center justify-center mb-4">
                <div class=" w-full  flex justify-center bg-primary-800 shadow-2xl py-4 px-10 rounded-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.034606779509!2d112.528502!3d-7.8785638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d3b3dee883%3A0x664a2b36b37b7748!2sJl.%20Kh.%20Agus%20Salim%20Gg.%202%20No.9%2C%20Sisir%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur%2065314!5e0!3m2!1sid!2sid!4v1698403237062!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>

                </div>

            </div>
            {{-- <div
                class="w-full  text-white text-center md:text-left flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 justify-center"> --}}
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <div class="flex justify-center">
                    {{-- <p class="flex flex-col">
                        <span class="font-semibold ">Alamat:</span>
                        <a href="">Dasboard</a>
                        <a href="">Dasboard</a>
                        <a href="">Dasboard</a>
                        <a href="">Dasboard</a>
                        <a href="">Dasboard</a>
                    </p> --}}
                </div>
                <div class="flex justify-center">
                    @foreach ($alamat as $alamat)
                        <p class="flex flex-col">
                            <span class="font-semibold ">{{ $alamat->Tempat }}:</span>
                            <a href="{{ $alamat->url }}"
                                class="hover:underline hover:text-primary-400">{{ $alamat->alamat }}</a>
                        </p>
                    @endforeach

                </div>

                <div class="flex flex-col ">
                    @foreach ($sosmed as $media)
                        <div class="flex mb-4 ">
                            <p class="flex flex-col">
                                <span class="font-semibold">{{ $media->name }} :</span>
                                <a href="{{ $media->url }}"
                                    class="hover:text-primary-200 hover:underline">{{ $media->username }}
                                </a>
                            </p>
                        </div>

                        {{-- <span for="">
                            {{ $media->name }}
                        </span>
                        <a href="{{ $media->url }}">
                            {{ $media->username }}
                        </a> --}}
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; Copyright Sekar Temulawak. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true, // Looping slide
            autoplay: {
                delay: 3000, // Slide otomatis setiap 3 detik
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</x-landingpage_layout>
