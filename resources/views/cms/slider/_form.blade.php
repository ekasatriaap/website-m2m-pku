<x-form-input :label="__('Judul')" id="title" name="title" :value="old('title', $slider->title)" required />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $slider->description)" />
<x-form-image :label="__('Image')" id="image" previewId="image-preview" inputId="image-upload" name="image"
    :default="$slider->image" class="form-image-slider" />

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        configUploadPreview('image-upload', 'image-preview');
        configSimpleSummernote('summernote-simple');
    });
</script>
