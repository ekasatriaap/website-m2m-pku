<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.visi_misi.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    <x-row>
                        <div class="col-md-6">
                            <x-form-input :label="__('Visi')" name="setting[visi]" id="visi" :value="old('visi', $settings['visi']['value'])"
                                placeholder="Visi" />
                            <x-form-input class="tagsinput" :label="__('Misi')" id="misi" name="setting[misi]"
                                :value="old('misi', $settings['misi']['value'])" />
                        </div>
                        <div class="col-md-6">
                            <x-form-image :label="__('Gambar')" previewId="image-preview" inputId="image-input"
                                id="image" name="image" :default="$settings['image']['value']" />
                        </div>
                    </x-row>
                    <x-form-button />
                </x-form>
            </x-card>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            configUploadPreview('image-input', 'image-preview');
            $(".tagsinput").tagsinput('items');
        </script>
    @endpush
</x-app-layout>
