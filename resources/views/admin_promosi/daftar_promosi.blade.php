<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100 bg-white p-4 shadow">
            <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                <div class="mb-4">
                    <h1 class="text-primary-900 "><b>Gambar Promosi</b></h1>
                </div>

                <div class="">
                    @foreach ($Promosi as $promosi)
                        <div class="flex justify-between w-full">
                            <div class="mb-4">
                                <p class="text-primary-600">
                                    <b>
                                        {{ $promosi->alt }}
                                    </b>
                                </p>
                                <img src="{{ asset('storage/promosi_img/' . $promosi->gambar) }}"
                                    alt="{{ $promosi->alt }}">
                            </div>


                        </div>
                        <form action="{{ route('admin-Promosi.destroy', $promosi->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    @endforeach

                    <a href="{{ route('admin-Promosi.create') }}"
                        class="text-white inline-flex mt-4 items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><svg
                            class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Gambar</a>

                </div>

            </div>

        </dl>
    </div>

</x-admin_layout>
