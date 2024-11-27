<x-landingpage_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="{{ route('pemesanan.store') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto max-w-3xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Informasi Pemesanan</h2>

                <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Alamat Pengiriman</h4>

                    <dl>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="your_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nama Penerima
                                </label>

                                <input type="text" id="namaPenerima" name="namaPenerima"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Bonnie Green" required value="{{ old('namaPenerima') }}" />

                            </div>
                            <div>
                                <label for="Provinsi"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Provinsi
                                </label>

                                <input type="text" id="provinsi" name="provinsi"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Provinsi" required value="{{ old('provinsi') }}" />

                            </div>
                            <div>
                                <label for="kota"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Kota /
                                    Kabupaten
                                </label>

                                <input type="text" id="kota" name="kota"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Kota /Kabupaten" required value="{{ old('kota') }}" />

                            </div>
                            <div>
                                <label for="kecamatan"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Kecamatan
                                </label>

                                <input type="text" id="kecamatan" name="kecamatan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Kecamatan" required value="{{ old('kecamatan') }}" />
                            </div>
                            <div>
                                <label for="detail"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Alamat Detail
                                </label>

                                <input type="text" id="detail" name="detail"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Ds. Desa, Dsn. Dusun /Rumah warna biru" required
                                    value="{{ old('detail') }}" />

                            </div>
                            <div>
                                <label for="telp"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white ">
                                    Telp. Penerima
                                </label>

                                <input type="number" id="telp" name="telp"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 @error('telp')
                            is-invalid
                        @enderror"
                                    placeholder="0888 **** ****" required value="{{ old('telp') }}" />

                            </div>


                        </div>
                    </dl>

                </div>

                <div class="mt-6 sm:mt-8">
                    <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                        <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">

                                {{-- perulangan menampilkan produk --}}
                                @foreach ($pesanan as $item)
                                    <tr>
                                        <td class="p-4 text-base font-normal text-gray-900 dark:text-white">
                                            {{ $item['nama'] }}
                                        </td>

                                        <input type="hidden" name="nama_produk[{{ $item['id'] }}]"
                                            value="{{ $item['nama'] }}">

                                        <td class="p-4 text-base font-normal text-gray-900 dark:text-white">
                                            x{{ $item['jumlah'] }}
                                        </td>
                                        <input type="hidden" name="jumlah_produk[{{ $item['id'] }}]"
                                            value="{{ $item['jumlah'] }}">
                                        <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">
                                            {{ $item['harga'] }} IDR
                                        </td>


                                        {{-- <input type="hidden" name="harga_produk2[{{ $item['id'] }}]"
                                            value="{{ $item['harga'] }}"> --}}
                                        <input type="hidden" name="harga_produk[{{ $item['id'] }}]"
                                            value="{{ $item['harga'] }}">



                                        <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">
                                            {{ $item['total'] }} IDR
                                        </td>

                                        <input type="hidden" id="harga_total" name="harga_total[{{ $item['id'] }}]"
                                            value="{{ $item['total'] }}">
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">

                        <div class="space-y-4">
                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-lg font-bold text-gray-900 dark:text-white">Total seluruh</dt>
                                {{-- didapat dari setiap total produk --}}
                                <dd class="text-lg font-bold text-gray-900 dark:text-white">
                                    {{ array_sum(array_column($pesanan, 'total')) }} IDR
                                    <input name="totals" id="totals" type="hidden"
                                        value="{{ array_sum(array_column($pesanan, 'total')) }}">
                                </dd>
                            </dl>
                        </div>



                        <div class="gap-4 sm:flex sm:items-center">

                            <button type="submit"
                                class="mt-4 flex w-full items-center justify-center rounded-lg bg-primary-700  px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300  dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0">Buat
                                Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


</x-landingpage_layout>
