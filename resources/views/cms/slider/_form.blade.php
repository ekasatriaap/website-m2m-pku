<x-form-input :label="__('Judul')" id="title" name="title" :value="old('title', $slider->title)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $slider->description)" />
<x-form-image :label="__('Image')" id="image-upload" name="image" :default="$slider->image" class="form-image-slider" />

<script>
    // Image Preview
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
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
