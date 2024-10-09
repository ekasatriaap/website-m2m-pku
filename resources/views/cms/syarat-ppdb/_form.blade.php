<x-form-input :label="__('Nama Syarat')" id="syarat_name" name="syarat_name" :value="old('syarat_name', $syarat_ppdb->syarat_name)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $syarat_ppdb->description)" />
<x-form-input :label="__('Urutan')" id="urutan" name="urutan" :value="old('urutan', $syarat_ppdb->urutan)" data-number-only />

<script>
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        // Summernote
        configSimpleSummernote('summernote-simple');
        initializeNumberOnlyInputs();
    });
</script>
