<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.description_profile.update') }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    <x-row>
                        <div class="col-md-6">
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Madrasah')"
                                name="setting[description_madrasah]" id="description-madrasah" :value="$settings['description_madrasah']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Profile Madrasah')" previewId="image-preview-madrasah"
                                inputId="image-input-madrasah" id="madrasah-image" name="image_madrasah"
                                :default="$settings['image_madrasah']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Komite')"
                                name="setting[description_komite]" id="description-komite" :value="$settings['description_komite']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Profile Komite')" previewId="image-preview-komite"
                                inputId="image-input-komite" id="komite-image" name="image_komite" :default="$settings['image_komite']['value']" />
                        </div>
                    </x-row>
                    <x-row>
                        <div class="col-md-6">
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi Struktural')"
                                name="setting[description_struktural]" id="description-struktural" :value="$settings['description_struktural']['value']" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar Struktural')" previewId="image-preview-struktural"
                                inputId="image-input-struktural" id="struktural-image" name="image_struktural"
                                :default="$settings['image_struktural']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            configUploadPreview('image-input-madrasah', 'image-preview-madrasah');
            configUploadPreview('image-input-komite', 'image-preview-komite');
            configUploadPreview('image-input-struktural', 'image-preview-struktural');
        </script>
    @endpush
</x-app-layout>
