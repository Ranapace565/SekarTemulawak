<nav class="z-50 bg-gray-100 fixed top-0 left-0 w-full  shadow" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-12 w-20" src="{{ asset('img/Sekar_Temulawak_logo.png') }}" alt="Your Company">

                </div>
                {{-- @auth
                    <a href=""
                        class="text-green-600 hover:text-green-700 ">{{ \Illuminate\Support\Str::limit(auth()->user()->name, 20) }}</a>
                @endauth --}}

            </div>

            <div class="hidden md:block">

                <div class="ml-4 flex items-center md:ml-6">
                    <div class="hidden px-5 md:block">
                        <div class="ml-10 flex items-baseline space-x-4">

                            <x-admin_navlink href="{{ route('landingpage.index') }}#board"
                                :active="request()->routeIs('landingpage.index')">Dashboard</x-admin_navlink>

                            <x-admin_navlink href="{{ route('landingpage.index') }}#produks"
                                :active="request()->routeIs('landingpage.index#produks')">Produk</x-admin_navlink>
                            <x-admin_navlink href="{{ route('landingpage.index') }}#blog"
                                :active="request()->routeIs('landingpage.index#blog')">Blog</x-admin_navlink>
                            <x-admin_navlink href="{{ url('/keranjang') }}"
                                :active="request()->is('keranjang')">Keranjang</x-admin_navlink>
                            {{-- <x-admin_navlink href="/pesanan" :active="request()->is('pesanan')">Pesanan</x-admin_navlink> --}}
                            @auth
                                <x-admin_navlink href="{{ route('pemesanan.show', ['pemesanan' => auth()->id()]) }}"
                                    :active="request()->is('pemesanan.show') || request()->is('admin-landingpage')">
                                    Pesanan
                                </x-admin_navlink>
                            @endauth
                            @auth


                            </div>
                        </div>
                        <!-- Profile dropdown -->
                        <div class="relative ml-3 ">
                            <div>
                                <button type="button" @click="isOpen = !isOpen"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-600"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ asset('storage/img/teamwork.png') }}"
                                        alt="">
                                </button>
                            </div>

                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-primary-600 ring-opacity-5 focus:outline-none "
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                {{-- <a href="/admin-profile"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white hover:border-l-white hover:border-l-8 hover:border-r-white hover:border-r-8 "
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a> --}}
                                <form action="/logout" method="POST" class="block">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-500 hover:text-white 
                                                       hover:border-l-white hover:border-l-8 hover:border-r-white hover:border-r-8"
                                        role="menuitem" tabindex="-1">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a
                            href="/login"class=" bg-green-600 text-white hover:bg-green-600 hover:text-white block rounded-md px-3 py-2 text-sm font-medium transition w-full max-w-xs">Login</a>
                    </div>
                </div>

            @endauth

        </div>

    </div>

    <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button @click="isOpen = !isOpen" type="button"
            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-green-500 hover:bg-green-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 focus:ring-offset-white"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }"class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }"class="hidden h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    </div>
    </div>
    <div class="border-b border-green-500 pt-1">

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->

    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <x-admin_navlink_mobile href="{{ route('landingpage.index') }}#board"
                :active="request()->is('landingpage.index')">Dashboard</x-admin_navlink_mobile>
            <x-admin_navlink_mobile href="{{ route('landingpage.index') }}#produks"
                :active="request()->is('landingpage.index#produks')">Produk</x-admin_navlink_mobile>
            <x-admin_navlink_mobile href="{{ route('landingpage.index') }}#blog"
                :active="request()->is('admin-konten') ||
                    request()->is('ubah-artikel') ||
                    request()->is('tambah-artikel')">Blog</x-admin_navlink_mobile>

            <x-admin_navlink_mobile href="{{ url('/keranjang') }}" :active="request()->is('/keranjang')">Keranjang</x-admin_navlink_mobile>

            {{-- <x-admin_navlink_mobile href="/pesanan" :active="request()->is('pesanan')">Pesanan</x-admin_navlink_mobile> --}}
            @auth
                <x-admin_navlink_mobile href="{{ route('pemesanan.show', ['pemesanan' => auth()->id()]) }}"
                    :active="request()->is('pemesanan.show') || request()->is('admin-landingpage')">
                    Pesanan
                </x-admin_navlink_mobile>
            @endauth

            @auth
            </div>
            <div class="border-t border-green-500 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('storage/img/teamwork.png') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-black">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ auth()->user()->email }}</div>
                    </div>

                </div>
                <div class="mt-3 space-y-1 px-2">
                    {{-- <a href="/admin-profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-green-500 hover:text-white">Profile</a> --}}

                    <form action="/logout" method="POST" class="block">
                        @csrf
                        <button type="submit"
                            class=" text-base w-full text-left px-3 py-2  text-gray-700 font-medium hover:bg-green-500 hover:text-white 
                                               hover:border-l-white hover:border-l-8 hover:border-r-white hover:border-r-8"
                            role="menuitem" tabindex="-1">
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a
                href="/login"class="block rounded-md px-3 py-2 text-white font-medium text-gray-500 bg-green-500 hover:bg-primary-700">Login</a>
        </div>
    @endauth




    <div class="border-t border-green-500 pb-3 pt-4">

    </div>
    </div>

</nav>