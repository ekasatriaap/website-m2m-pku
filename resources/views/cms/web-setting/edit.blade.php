<x-app-layout :title="$title">
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
                            <x-form-input type="number" :label="__('Kode Pos')" name="setting[postcode]" id="postcode"
                                :value="$settings['postcode']['value']" />
                            <x-form-input type="tel" :label="__('Nomor telepon')" name="setting[phone]" id="phone"
                                :value="$settings['phone']['value']" />
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
                            <x-form-image :label="__('Logo Sekolah')" preview_id="image-preview-logo" input_id="image-input-logo"
                                name="logo" :default="$settings['logo']['value']" />
                            <x-form-image :label="__('Favicon')" preview_id="image-preview-favicon"
                                input_id="image-input-favicon" name="favicon" :default="$settings['favicon']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            // Image Preview
            $.uploadPreview({
                input_field: "#image-input-logo", // Default: .image-upload
                preview_box: "#image-preview-logo", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
            // Image Preview
            $.uploadPreview({
                input_field: "#image-input-favicon", // Default: .image-upload
                preview_box: "#image-preview-favicon", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
            // Summernote
            $('#default-drsk-modal').on('shown.bs.modal', function() {
                $('.summernote-simple').summernote({
                    height: 200,
                    toolbar: [
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['strike', ['strikethrough']],
                        ['para', ['paragraph']],
                    ],
                });
            });
        </script>
    @endpush
</x-app-layout>
