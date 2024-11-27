<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Pesanan masuk</h2>

                    <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                        <form action="{{ route('admin-pesanan.index') }}" method="GET" class="mb-4">
                            <div>
                                <label for="duration"
                                    class="sr-only mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Waktu
                                </label>
                                <select id="duration" name="duration" onchange="this.form.submit()"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                    <option value="semua" {{ request('duration') == 'semua' ? 'selected' : '' }}>Semua
                                    </option>
                                    <option value="hari ini" {{ request('duration') == 'hari ini' ? 'selected' : '' }}>
                                        Hari ini</option>
                                    <option value="minggu ini"
                                        {{ request('duration') == 'minggu ini' ? 'selected' : '' }}>Minggu ini</option>
                                    <option value="bulan ini"
                                        {{ request('duration') == 'bulan ini' ? 'selected' : '' }}>Bulan ini</option>
                                    <option value="3 bulan terakhir"
                                        {{ request('duration') == '3 bulan terakhir' ? 'selected' : '' }}>3 Bulan
                                        terakhir</option>
                                    <option value="tahun ini"
                                        {{ request('duration') == 'tahun ini' ? 'selected' : '' }}>Tahun ini</option>

                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-6 flow-root sm:mt-8">
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($pesanan as $order)
                            <div class="flex flex-wrap items-center gap-y-4 py-6 border-b">
                                {{-- Order ID --}}
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Atas Nama:</dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                        <a href="#" class="hover:underline">{{ $order->name }}</a>
                                    </dd>
                                </dl>

                                {{-- Tanggal Pembuatan Pesanan --}}
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Tanggal:</dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $order->created_at->format('d.m.Y') }}
                                    </dd>
                                </dl>

                                {{-- Total Harga --}}
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Total Pesananan:
                                    </dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                        {{ number_format($order->totals, 0, ',', '.') }} IDR
                                    </dd>
                                </dl>

                                {{-- Status Pesanan --}}
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                    <dd
                                        class="mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300 {{ $order->status == 'belum dibayar' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : '' }}
         {{ $order->status == 'sudah dibayar' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 ' : '' }}
         {{ $order->status == 'dikirim' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300' : '' }}
        {{ $order->status == 'diterima' ? 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300' : '' }}">
                                        {{ ucfirst($order->status) }}
                                        {{-- {{ ucfirst($order->status) }} --}}
                                    </dd>
                                </dl>

                                {{-- Tombol ke halaman detail --}}
                                <div
                                    class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                                    <a href="{{ route('admin-pesanan.edit', $order->id) }}"
                                        class="w-full inline-flex justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">
                                        Detail pesanan
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class=" flex w-full justify-evenly m-4">{{ $pesanan->links() }}</div>
    </section>
</x-admin_layout>
