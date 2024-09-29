<x-form-input-inline :label="__('Judul')" id="title" name="title" :value="old('title', $pages->title)" onchange="slugify(this, 'slug')" />
<x-form-input-inline :label="__('Slug')" id="slug" name="slug" :value="old('slug', $pages->slug)" />
<x-form-image-inline :label="__('Image')" id="image" previewId="image-preview" inputId="image-upload" name="image"
    :default="$pages->image" />
<x-form-textarea-inline :label="__('Konten')" class="summernote" id="content" name="content" :value="old('content', $pages->content)" />
<x-form-button-inline mainRoute="pages" />

@push('add-scripts')
    <script>
        configUploadPreview('image-upload', 'image-preview');
    </script>
@endpush
