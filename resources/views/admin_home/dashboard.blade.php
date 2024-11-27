<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex-grow p-6">
        {{-- <form method="GET" action="{{ route('admin-dashboard.index') }}" class="mb-4">
            <label for="duration">Pilih Periodess:</label>
            <select name="duration" id="duration" onchange="this.form.submit()">
                <option value="semua" {{ $filter == 'semua' ? 'selected' : '' }}>Semua</option>
                <option value="hari ini" {{ $filter == 'hari ini' ? 'selected' : '' }}>Hari Ini</option>
                <option value="minggu ini" {{ $filter == 'minggu ini' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="bulan ini" {{ $filter == 'bulan ini' ? 'selected' : '' }}>Bulan Ini</option>
                <option value="tahun ini" {{ $filter == 'tahun ini' ? 'selected' : '' }}>Tahun Ini</option>
            </select>
        </form> --}}
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 mb-6">
            <!-- Data Barang -->
            <div class="bg-white shadow-lg p-6 rounded-lg flex items-center space-x-4">
                <img src="{{ asset('storage/img/produk.png') }}" alt="Data Barang" class="w-16">
                <div>
                    <h3 class="text-lg font-semibold">Data Barang</h3>
                    <p class="text-2xl font-bold">{{ $jumlahProduk }}</p>
                </div>
            </div>

            <!-- Barang Beli -->
            <div class="bg-white shadow-lg p-6 rounded-lg flex items-center space-x-4">
                <img src="{{ asset('storage/img/blogging.png') }}" class="w-16">
                <div>
                    <h3 class="text-lg font-semibold">Artikel</h3>
                    <p class="text-2xl font-bold">{{ $jumlahArtikel }}</p>
                </div>
            </div>

            <!-- Barang Supplai -->
            <div class="bg-white shadow-lg p-6 rounded-lg flex items-center space-x-4">
                <img src="{{ asset('storage/img/programmer.png') }}" alt="Barang Supplai" class="w-16">
                <div>
                    <h3 class="text-lg font-semibold">Data User</h3>
                    <p class="text-2xl font-bold">{{ $jumlahUser }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-6">
            <!-- Sok Hampir Habis -->
            <div class="bg-white shadow-lg rounded-lg flex items-center space-x-4 mt-4">
                {{--  --}}

                <div class="container mx-auto">

                    <div class="p-2  bg-white rounded shadow">
                        {!! $data->container() !!}
                    </div>

                </div>

                <script src="{{ $data->cdn() }}"></script>

                {{ $data->script() }}
            </div>
            <div class="bg-white shadow-lg rounded-lg flex items-center space-x-4 mt-4">
                {{--  --}}

                <div class="container mx-auto">

                    <div class="p-2  bg-white rounded shadow">
                        {!! $pendapatan->container() !!}
                    </div>

                </div>

                <script src="{{ $pendapatan->cdn() }}"></script>

                {{ $pendapatan->script() }}
            </div>


        </div>


    </div>

    <!-- Footer -->
    <footer class="bg-primary-700 text-white text-center py-4">
        <p>{{ date('d/m/Y') }} - <span id="clock"></span></p>
    </footer>

</x-admin_layout>
