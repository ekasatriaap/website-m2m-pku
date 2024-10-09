<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.setting_ppdb.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Judul Utama')" name="setting[main_title]" id="main-title" :value="$settings['main_title']['value']"
                                placeholder="Judul Utama" />
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Utama')" name="setting[main_description]"
                                id="main-description" :value="$settings['main_description']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Utama')" previewId="image-preview-main" inputId="image-input-main"
                                id="main-image" name="main_image" :default="$settings['main_image']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Syarat Umum')"
                                name="setting[syarat_umum_decription]" id="syarat-umum-decription" :value="$settings['syarat_umum_decription']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Syarat Umum')" previewId="image-preview-syarat-umum"
                                inputId="image-input-syarat-umum" id="syarat-umum-image" name="syarat_umum_image"
                                :default="$settings['syarat_umum_image']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Jalur Masuk')" previewId="image-preview-jalur-masuk"
                                inputId="image-input-jalur-masuk" id="jalur-masuk-image" name="jalur_masuk_image"
                                :default="$settings['jalur_masuk_image']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            configUploadPreview('image-input-main', 'image-preview-main');
            configUploadPreview('image-input-syarat-umum', 'image-preview-syarat-umum');
            configUploadPreview('image-input-jalur-masuk', 'image-preview-jalur-masuk');
        </script>
    @endpush
</x-app-layout>
