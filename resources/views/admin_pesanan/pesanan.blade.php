<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 md:p-1">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden pt-4">
                <div class="flex pl-4">
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}
                    <a href="/admin-pesanan"
                        class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        &laquo; Kembali
                    </a>
                </div>
                @if (session()->has('success'))
                    <div class="pl-4 bg-primary-400" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="pl-4 bg-red-400" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="p-6 bg-white rounded-lg shadow-md ">
                    {{-- <h2 class="text-gray-500 font-semibold mb-4">Pesanan #ID {{ $pesanan->id }}</h2> --}}
                    <div class="flex space-x-4 mb-2">
                        {{-- Nama penerima --}}
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            {{ $pesanan->name }}
                        </div>
                        {{-- Tanggal pembuatan pesanan --}}
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            {{ $pesanan->created_at->format('d - m - Y') }}
                        </div>
                        {{-- Status pesanan --}}
                        <div class="px-4 py-2 border border-green-500 text-green-500 rounded">
                            {{ ucfirst($pesanan->status) }}
                        </div>
                        <form action="{{ route('admin-pesanan.update', [$pesanan->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" id="status" value="Approve">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5  text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Approve
                            </button>
                        </form>
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-700 font-semibold">Nama Penerima :</span>
                        <span class="ml-2">{{ $pesanan->name }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-700 font-semibold">Alamat Penerima :</span>
                        <span class="ml-2">{{ $pesanan->alamat }}</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-green-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Produk</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Jumlah</th>
                                <th scope="col" class="px-4 py-3">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan->itemPesanans as $item)
                                <tr class="border-b dark:border-gray-700">
                                    {{-- Nama produk --}}
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    {{-- Harga produk --}}
                                    <td class="px-4 py-3">{{ number_format($item->harga, 0, ',', '.') }} IDR</td>
                                    {{-- Jumlah --}}
                                    <td class="px-4 py-3">{{ $item->jumlah }}</td>
                                    {{-- Total --}}
                                    <td class="px-4 py-3">
                                        {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="space-y-4 bg-gray-50 p-6 dark:bg-gray-800">
        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
            {{-- Total semua pesanan --}}
            <dd class="text-lg font-bold text-gray-900 dark:text-white">
                {{-- {{ number_format($pesanan->itemPesanans->sum(fn($item) => $item->harga * $item->jumlah), 0, ',', '.') }} --}}
                {{ number_format($pesanan->totals, 0, ',', '.') }}
                IDR
            </dd>
        </dl>
    </div>

    <div class="p-4 flex justify-center items-center">
        <div class="p-4">
            <label class="block text-gray-600 font-semibold mb-2">Bukti Pembayaran :</label>
            {{-- <div class="w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($pesanan->bukti_pembayaran ?? 'img/Sekar_Temulawak_logo.png') }}"
                    alt="Bukti Pembayaran" class="w-full h-auto object-cover">
            </div> --}}
            <div class="flex justify-center">
                <img src="{{ asset('storage/pembayaran_img/' . $pesanan->bukti) }}" alt="Bukti Pembayaran"
                    class="w-96 h-auto object-cover">
            </div>
        </div>
    </div>
</x-admin_layout>
