<x-app-layout :title="$title">
    @push('add-styles')
        <style>
            .form_image_header {
                width: 100%;
                height: 256px;
            }

            .form_image_parallax {
                width: 100%;
                height: 512px;
            }
        </style>
    @endpush
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.web_setting.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Nama Sekolah')" name="setting[name]" id="name" :value="$settings['name']['value']"
                                placeholder="Nama Sekolah" />
                            <x-form-textarea class="summernote-simple" :label="__('Deskripsi')" name="setting[description]"
                                id="description" :value="$settings['description']['value']" />
                            <x-form-input :label="__('Tagline')" name="setting[tagline]" id="tagline" :value="$settings['tagline']['value']" />
                            <x-form-input :label="__('Alamat')" name="setting[address]" id="address" :value="$settings['address']['value']" />
                            <x-form-input :label="__('Kode Pos')" name="setting[postcode]" id="postcode" :value="$settings['postcode']['value']"
                                data-number-only data-max-digits="5" />
                            <x-form-input type="tel" :label="__('Nomor telepon')" name="setting[phone]" id="phone"
                                :value="$settings['phone']['value']" data-number-only data-max-digits="13" />
                            <x-form-input type="tel" :label="__('Nomor whatsapp')" name="setting[whatsapp]" id="whatsapp"
                                :value="$settings['whatsapp']['value']" data-number-only data-max-digits="13" />
                            <x-form-input type="email" :label="__('Email')" name="setting[email]" id="email"
                                :value="$settings['email']['value']" />
                            <x-form-input :label="__('Facebook')" name="setting[facebook]" id="facebook"
                                :value="$settings['facebook']['value']" />
                            <x-form-input :label="__('Instagram')" name="setting[instagram]" id="instagram"
                                :value="$settings['instagram']['value']" />
                            <x-form-input :label="__('Twitter')" name="setting[twitter]" id="twitter"
                                :value="$settings['twitter']['value']" />
                            <x-form-input :label="__('Youtube')" name="setting[youtube]" id="youtube"
                                :value="$settings['youtube']['value']" />
                            <x-form-input :label="__('longitude')" name="setting[longitude]" id="longitude"
                                :value="$settings['longitude']['value']" />
                            <x-form-input :label="__('Latitude')" name="setting[latitude]" id="latitude"
                                :value="$settings['latitude']['value']" />
                        </div>
                        <div class="col-6">
                            <x-form-image :label="__('Logo Sekolah')" previewId="image-preview-logo" inputId="image-input-logo"
                                id="logo" name="logo" :default="$settings['logo']['value']" />
                            <x-form-image :label="__('Favicon')" previewId="image-preview-favicon" id="favicon"
                                inputId="image-input-favicon" name="favicon" :default="$settings['favicon']['value']" />
                            <x-form-image :label="__('Header Halaman')" name="page_header" class="form_image_header"
                                previewId="image-preview-header" inputId="image-input-header" id="page_header"
                                :default="$settings['page_header']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            configUploadPreview('image-input-logo', 'image-preview-logo');
            configUploadPreview('image-input-favicon', 'image-preview-favicon');
            configUploadPreview('image-input-header', 'image-preview-header');
        </script>
    @endpush
</x-app-layout>
