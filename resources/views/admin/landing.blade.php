<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="text-gray-800 dark:text-gray-300 px-4">
        @foreach ($landing as $landing)
            <p class="mb-4">{!! $landing->body !!}</p>
            <div class="flex justify-end">
                <form action="{{ route('landing.edit', $landing->id) }}" method="GET" class="mr-4">
                    <button type="submit"
                        class="text-yellow-400 inline-flex items-center hover:text-white border border-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-700">
                        Ubah
                    </button>
                </form>

                <form action="{{ route('landing.destroy', $landing->id) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Hapus
                    </button>
                </form>
            </div>
        @endforeach
        <form action=""></form>
    </div>
    <form action="{{ route('landing.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full my-4">
            <label for="body" class="block mb-2 text-sm font-medium text-primary-700 dark:text-white">Tambah
                Deskripsi Landingpage</label>
            <textarea id="content" name="body" rows="4"
                class="ckeditor block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Write product description here"></textarea>
            {{-- <textarea name="content" id="ckeditor" cols="30" rows="10" class="ckeditor"></textarea> --}}
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Tambah Deskripsi
            </button>
        </div>
    </form>

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
</x-admin_layout>
