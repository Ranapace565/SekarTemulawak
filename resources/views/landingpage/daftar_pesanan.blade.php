<x-landingpage_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mt-6"></div>
    <x-admin_header>{{ $title }}</x-admin_header>
    <section class="bg-white py-4 antialiased dark:bg-gray-900 md:py-4 mt-6">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <div class="mt-6 flow-root sm:mt-8">
                    <div class="divide-y divide-primary-700 dark:divide-gray-700">
                        @if (is_string($pesanan))
                            <div class="flex justify-center"><span
                                    class="text-gray-900 dark:text-white">{{ $pesanan }}</span></div>
                        @else
                            @foreach ($pesanan as $list)
                                <div class="flex flex-wrap items-center gap-y-4 py-6">
                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Date:</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $list->created_at->format('d.m.Y') }}</dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Price:</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            {{ number_format($list->totals, 0, ',', '.') }} IDR</dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                        <dd
                                            class="px-4 me-2 mt-1.5 inline-flex items-center rounded 
        {{ $list->status == 'belum dibayar' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : '' }}
         {{ $list->status == 'sudah dibayar' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 ' : '' }}
         {{ $list->status == 'dikirim' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300' : '' }}
        {{ $list->status == 'diterima' ? 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300' : '' }}">
                                            {{ ucfirst($list->status) }}
                                        </dd>
                                    </dl>

                                    <div
                                        class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                                        <a href="{{ route('pemesanan.edit', ['pemesanan' => $list->id]) }}"
                                            class="w-full inline-flex justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">
                                            Detail pesanan
                                        </a>
                                    </div>

                                </div>
                                <form action="{{ route('pemesanan.destroy', $list->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 mb-2">
                                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Hapus Pesanan
                                    </button>
                                </form>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
    </section>

</x-landingpage_layout>
