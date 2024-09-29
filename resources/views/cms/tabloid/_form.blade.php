<x-form-input :label="__('Judul')" id="title" name="title" :value="old('title', $tabloid->title)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $tabloid->description)" />
<x-form-input :label="__('File')" id="file" name="file" :value="$tabloid->file" type="file" />
@if ($tabloid->file)
    <a href="{{ asset('storage/uploads/' . $tabloid->file) }}" class="btn btn-primary" download>
        <i class="fas fa-eye"></i>
        View File
    </a>
@endif

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        configSimpleSummernote('summernote-simple');
    });
</script>
