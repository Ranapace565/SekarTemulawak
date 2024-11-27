<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/Sekar_Temulawak_logo.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="h-full ">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <x-admin_header>{{ $title }}</x-admin_header>


        <main>
            <div class="mx-auto max-w-7xl px-4  sm:px-6 lg:px-8">
                <div class="max-w-5xl mx-auto px-4 py-6">
                    <!-- Informasi Pelanggan -->
                    <div class="flex ">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <a href="/pesanan"
                            class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            &laquo; Kembali
                        </a>
                    </div>
                    <div class="mt-6 bg-white p-6 rounded-lg shadow">

                        {{-- <a href="{{ route('admin-produk.index') }}"
                            class="mb-5 inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            &laquo; Kembali
                        </a> --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p><span class="font-semibold">Nama Penerima:</span> {{ $pesanan->name }}</p>
                                <p><span class="font-semibold">Alamat Penerima:</span> {{ $pesanan->alamat }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold">Tanggal Pemesanan:</span>
                                    {{ $pesanan->created_at->format('d - m - Y') }}</p>
                            </div>
                            <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status:</dt>
                                <dd
                                    class="px-4 me-2 mt-1.5 inline-flex items-center rounded 
{{ $pesanan->status == 'belum dibayar' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : '' }}
 {{ $pesanan->status == 'sudah dibayar' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 ' : '' }}
 {{ $pesanan->status == 'dikirim' ? 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300' : '' }}
{{ $pesanan->status == 'diterima' ? 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-300' : '' }}">
                                    {{ ucfirst($pesanan->status) }}
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Tabel Produk -->
                    <div class="mt-6 bg-white p-6 rounded-lg shadow overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b bg-green-100">
                                    <th class="py-3 px-4">Produk</th>
                                    <th class="py-3 px-4">Harga Satuan</th>
                                    <th class="py-3 px-4">Jumlah</th>
                                    <th class="py-3 px-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan->itemPesanans as $item)
                                    <tr class="border-b">
                                        <td class="py-4 px-4">
                                            <p class="font-semibold">{{ $item->name }}</p>
                                        </td>
                                        <td class="py-4 px-4">{{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td class="py-4 px-4">{{ $item->jumlah }}</td>
                                        <td class="py-4 px-4">{{ number_format($item->total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Harga -->
                        <div class="mt-4 flex justify-end">
                            <p class="text-lg font-semibold">
                                Sub Total Harus Dibayar:
                                <span
                                    class="text-green-600">Rp{{ number_format($pesanan->totals, 0, ',', '.') }}</span>

                            </p>

                        </div>
                        <div class=" mt-4 block justify-sta">
                            <p class="text-lg font-light">
                                *lakuka transfer ke bank dibawah ini:
                            </p>
                            @foreach ($rekening as $rek)
                                <div class="">
                                    <p class="text-lg font-semibold">
                                        {{ $rek->bank }}
                                        <span class="text-green-600">{{ $rek->rekening }}</span>
                                        <span class="text-black">({{ $rek->atasnama }})</span>
                                        <button id="copyRekening"
                                            class="ml-2 p-1 hover:bg-blue-600 hover:text-blue-50 text-blue-400 rounded"
                                            onclick="copyToClipboard()">
                                            <svg class="w-6 h-6 text-blue-500
                                             hover:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z" />
                                            </svg>

                                        </button>
                                    </p>

                                </div>
                            @endforeach

                            <p class="text-lg font-light mt-4">
                                *dan upload bukti pembayaran pada form dibawah
                            </p>
                        </div>
                    </div>

                    <!-- Bukti Pembayaran -->
                    <div class="mt-6 bg-white p-6 rounded-lg shadow">
                        <h2 class="text-lg font-semibold mb-4">Bukti Pembayaran:</h2>
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/pembayaran_img/' . $pesanan->bukti) }}" alt="Bukti Pembayaran"
                                class="w-96 h-auto object-cover">
                        </div>
                    </div>

                    <!-- Form Upload Bukti Pembayaran -->
                    <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-span-full mt-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-900">
                                Upload Bukti Pembayaran:
                            </label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <img id="image-preview" class="mx-auto h-40 w-auto object-cover mb-4 hidden"
                                        alt="Preview Gambar" />
                                    <div class="mt-4 flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-green-500 focus:ring-2 focus:ring-primary-500">
                                            <span>Upload gambar</span>
                                            <input id="file-upload" name="gambar" type="file" class="sr-only"
                                                accept="image/*" onchange="previewImage(event)">
                                            @error('gambar')
                                                <p class="text-red-600">{{ $message }}</p>
                                            @enderror
                                        </label>
                                        <p class="pl-1">atau seret dan jatuhkan</p>
                                    </div>
                                    <p class="text-xs text-gray-600">Upload bukti pembayaran .</p>
                                </div>
                            </div>
                        </div>

                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                const file = input.files[0];

                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const preview = document.getElementById('image-preview');
                                        preview.src = e.target.result;
                                        preview.classList.remove('hidden');
                                    };
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>

                        <script>
                            function copyToClipboard() {
                                const text = document.getElementById('rekeningInfo').innerText;

                                navigator.clipboard.writeText(text)
                                    .then(() => {
                                        alert('Rekening berhasil disalin ke clipboard!');
                                    })
                                    .catch(err => {
                                        console.error('Gagal menyalin teks:', err);
                                    });
                            }
                        </script>

                        <button type="submit"
                            class="mt-4 sm:mt-6 px-5 py-2.5 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">
                            Kirimkan
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>



</body>

</html>
