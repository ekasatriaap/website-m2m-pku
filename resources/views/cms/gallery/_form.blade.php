<x-form-input :label="__('Judul')" id="title" name="title" :value="old('title', $gallery->title)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $gallery->description)" />
<x-form-image :label="__('Image')" id="image-upload" name="image" :default="$gallery->image" />

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
