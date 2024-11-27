<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Artikel</h2>
            <form action="{{ route('admin-Promosi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <form action="#"> --}}
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alternative Text</label>
                        <input type="text" name="alt" id="alt"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Manfaat temulawak" required="">
                    </div>
                    <div class="col-span-full mt-4">
                        <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Gambar
                            Promosi</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <img id="image-preview" class="mx-auto h-40 w-auto object-cover mb-4 hidden"
                                    alt="Preview Gambar" />
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                        <span>Upload gambar</span>
                                        <input id="file-upload" name="gambar" type="file" class="sr-only"
                                            accept="image/*" onchange="previewImage(event)">
                                        @error('gambar')
                                            <p class="text-red-600">{{ $message }}</p>
                                        @enderror
                                    </label>
                                    <p class="pl-1">Gambar 1:2.5</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG or JPG</p>
                            </div>
                        </div>
                    </div>

                </div>


                <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                    onclick="window.history.back();">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Tambah Artikel
                </button>

            </form>
        </div>
    </section>

    <script>
        // Fungsi untuk menampilkan preview gambar
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
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
            clipboard_handleImages: false
        });
    </script>


    {{-- <script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         CKEDITOR.replace('content');
    //     });
    // </script> --}}

</x-admin_layout>
