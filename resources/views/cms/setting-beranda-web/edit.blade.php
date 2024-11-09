<x-app-layout :title="$title">
    @push('add-styles')
        <style>
            .form_image_wide {
                width: 100%;
                height: 256px;
            }
        </style>
    @endpush
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.setting_beranda_web.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Judul Section 1')" name="setting[section_1_title]" id="section-1-title" :value="$settings['section_1_title']['value']" placeholder="Judul Section 1" />
                            <x-form-input :label="__('URL Video Section 1')" name="setting[section_1_url_video]" id="section-1-url-video" :value="$settings['section_1_url_video']['value']" />
                            <x-form-textarea class="summernote" :label="__('Deskripsi Section 1')" name="setting[section_1_description]" id="section-1-description" :value="$settings['section_1_description']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Section 1')" previewId="image-preview-section-1" class="form_image_wide" inputId="image-input-section-1" id="section-1-image" name="section_1_image" :default="$settings['section_1_image']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-textarea class="summernote" :label="__('Judul Section 2')" name="setting[section_2_title]" id="section-2-title" :value="$settings['section_2_title']['value']" />
                            <x-form-textarea class="summernote" :label="__('Deskripsi Section 2')" name="setting[section_2_description]" id="section-2-description" :value="$settings['section_2_description']['value']" />
                            <x-form-input :label="__('Nama Section 2')" name="setting[section_2_name]" id="section-2-name" :value="$settings['section_2_name']['value']" />
                            <x-form-input :label="__('Jabatan Section 2')" name="setting[section_2_jabatan]" id="section-2-jabatan" :value="$settings['section_2_jabatan']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Section 2')" previewId="image-preview-section-2" class="form_image_wide" inputId="image-input-section-2" id="section-2-image" name="section_2_image" :default="$settings['section_2_image']['value']" />
                            <x-form-image :label="__('Foto Section 2')" previewId="foto-preview-section-2" inputId="foto-input-section-2" id="section-2-foto" name="section_2_foto" :default="$settings['section_2_foto']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Judul Section 3')" name="setting[section_3_title]" id="section-3-title" :value="$settings['section_3_title']['value']" placeholder="Judul Section 3" />
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Section 3')" name="setting[section_3_description]" id="section-3-description" :value="$settings['section_3_description']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Section 3')" previewId="image-preview-section-3" class="form_image_wide" inputId="image-input-section-3" id="section-3-image" name="section_3_image" :default="$settings['section_3_image']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Judul Section 4')" name="setting[section_4_title]" id="section-4-title" :value="$settings['section_4_title']['value']" placeholder="Judul Section 4" />
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Section 4')" name="setting[section_4_description]" id="section-4-description" :value="$settings['section_4_description']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Section 4')" previewId="image-preview-section-4" class="form_image_wide" inputId="image-input-section-4" id="section-4-image" name="section_4_image" :default="$settings['section_4_image']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            configUploadPreview('image-input-section-1', 'image-preview-section-1');
            configUploadPreview('image-input-section-2', 'image-preview-section-2');
            configUploadPreview('image-input-section-3', 'image-preview-section-3');
            configUploadPreview('image-input-section-4', 'image-preview-section-4');
            configUploadPreview('foto-input-section-2', 'foto-preview-section-2');
        </script>
    @endpush
</x-app-layout>
