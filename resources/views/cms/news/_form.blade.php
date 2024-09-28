<x-form-input-inline :label="__('Judul')" id="title" name="title" :value="old('title', $news->title)" onchange="slugify(this, 'slug')" />
<x-form-input-inline :label="__('Slug')" id="slug" name="slug" :value="old('slug', $news->slug)" />
<x-form-image-inline :label="__('Image')" id="image" previewId="image-preview" inputId="image-upload" name="image"
    :default="$news->thumbnail" />
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
        configUploadPreview('image-upload', 'image-preview');
    </script>
@endpush
