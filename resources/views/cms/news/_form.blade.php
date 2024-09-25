<x-form-input-inline :label="__('Judul')" id="title" name="title" :value="old('title', $news->title)" onchange="slugify(this, 'slug')" />
<x-form-input-inline :label="__('Slug')" id="slug" name="slug" :value="old('slug', $news->slug)" />
<x-form-image-inline :label="__('Image')" id="image-upload" name="image" :default="$news->thumbnail" />
@if (!accountIsAdmin())
    <x-form-select-inline :label="__('Bidang')" id="bidang" name="id_bidang" :options="$bidangs" :value="old('id_bidang', $news->id_bidang)"
        placeholder="Pilih Bidang" />
@endif
<x-form-textarea-inline :label="__('Konten')" class="summernote" id="content" name="content" :value="old('content', $news->content)" />
@if (!accountIsAdmin())
    <x-form-select-inline :label="__('Status')" id="status" name="status" :options="$status" :value="old('status', $news->status)"
        placeholder="Pilih Status" />
@endif
<x-form-button-inline mainRoute="news" />

@push('add-scripts')
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
    </script>
@endpush
