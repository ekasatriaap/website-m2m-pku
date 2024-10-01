<x-form-image :label="__('Image')" id="image" previewId="image-preview" inputId="image-input-upload" name="image"
    :default="$testimoni->image" />
<x-form-input :label="__('Nama')" id="name" name="name" :value="old('name', $testimoni->name)" />
<x-form-input :label="__('Angkatan')" id="angkatan" name="angkatan" :value="old('angkatan', $testimoni->angkatan)" data-number-only data-max-digits="4" />
<x-form-textarea :label="__('Testimoni')" class="summernote-simple" id="testimoni" name="testimoni" :value="old('testimoni', $testimoni->testimoni)" />

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        // Image Preview
        configUploadPreview('image-input-upload', 'image-preview');
        configSimpleSummernote('summernote-simple');
        initializeNumberOnlyInputs();
    });
</script>
