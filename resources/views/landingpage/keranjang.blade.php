<x-landingpage_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="pt-6"></div>
    <x-admin_header>{{ $title }}</x-admin_header>
    <div class="border-b px-4 py-3 flex items-center space-x-3">


        <div class="flex-1">
            <form action="{{ route('pemesanan.index') }}" method="GET">
                @csrf
                @foreach ($produk as $item)
                    <div class="flex space-x-4 py-4 justify-center items-center ">
                        <input type="checkbox" name="produk_id[]" value="{{ $item['produk_id'] }}" class="mt-2">
                        <div class="w-16 h-16"><img src="{{ asset('storage/produk_img/' . $item['gambar']) }}"
                                alt="Product Image" class=" object-cover w-full h-full">
                        </div>
                        <div class="block lg:flex lg:items-center lg:justify-between gap-4 p-4 border flex-grow">
                            <!-- Nama Produk -->
                            <div class="lg:w-1/2">
                                <p class="truncate text-lg font-medium">{{ $item['nama'] }}</p>
                                <input type="hidden" name="nama_produk[{{ $item['produk_id'] }}]"
                                    value="{{ $item['nama'] }}">
                            </div>

                            <!-- Harga Produk -->
                            <div class="text-primary-600 lg:w-auto text-lg font-semibold">
                                {{ $item['harga'] }} IDR
                                <input type="hidden" name="harga_produk[{{ $item['produk_id'] }}]"
                                    value="{{ $item['harga'] }}">
                            </div>


                            <!-- Kontrol Jumlah -->
                            <div class="flex justify-between items-center space-x-2">
                                <div class="flex items-center space-x-2">
                                    {{-- <form class="items-center"
                                        action="{{ route('keranjang.edit', $item['produk_id']) }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $item['produk_id'] }}">

                                        <button type="submit">-</button>
                                    </form>
                                    <input type="text" value="{{ $item['jumlah'] }}"
                                        class="w-12 h-8 border text-center">
                                    <form class="items-center" action="{{ route('keranjang.create') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $item['produk_id'] }}">
                                        <button type="submit">+</button>
                                    </form> --}}
                                    <button type="button" onclick="kurangiJumlah({{ $item['produk_id'] }})">-</button>
                                    {{-- <input type="text" value="{{ $item['jumlah'] }}"
                                        class="w-12 h-8 border text-center"> --}}

                                    <input type="number" name="jumlah_produk[{{ $item['produk_id'] }}]"
                                        id="jumlah_{{ $item['produk_id'] }}" value="1" min="1"
                                        class="w-16 h-8 border text-center">
                                    <button type="button" onclick="tambahJumlah({{ $item['produk_id'] }})">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- kok bukan button ini yang menjadi submit form  --}}
                <button type="submit"
                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Buat
                    Pesanan</button>
                <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8 flex justify-end">

                </div>

            </form>

        </div>
    </div>

    <script>
        function kurangiJumlah(produkId) {
            let jumlahInput = document.getElementById('jumlah_' + produkId);
            let jumlah = parseInt(jumlahInput.value);
            if (jumlah > 1) {
                jumlahInput.value = jumlah - 1;
            }
        }

        function tambahJumlah(produkId) {
            let jumlahInput = document.getElementById('jumlah_' + produkId);
            let jumlah = parseInt(jumlahInput.value);
            jumlahInput.value = jumlah + 1;
        }
    </script>

</x-landingpage_layout>
