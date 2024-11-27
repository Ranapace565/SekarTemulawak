<x-admin_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Artikel</h2>
            <form action="{{ route('landing.update', $landing->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full my-4">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body
                        Artikel</label>
                    <textarea id="body" name="body" rows="4"
                        class="ckeditor block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Write product description here">{{ $landing->body }}</textarea>

                </div>

                <button type="button"
                    class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                    onclick="window.history.back();">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan Perubahan
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
        CKEDITOR.replace('body', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
            clipboard_handleImages: false
        });
    </script>
</x-admin_layout>
