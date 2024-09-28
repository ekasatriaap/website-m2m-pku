<x-form-input :label="__('Judul')" id="title" name="title" :value="old('title', $gallery->title)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $gallery->description)" />
<x-form-image :label="__('Image')" id="image" previewId="image-preview" inputId="image-input-upload" name="image"
    :default="$gallery->image" />

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        // Image Preview
        configUploadPreview('image-input-upload', 'image-preview');
        configSimpleSummernote('summernote-simple');
    });
</script>
