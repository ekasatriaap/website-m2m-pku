<x-form-input :label="__('Nama Jalur Masuk')" id="nama_jalur" name="nama_jalur" :value="old('nama_jalur', $jalur_masuk_ppdb->nama_jalur)" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $jalur_masuk_ppdb->description)" />
<x-form-input class="tagsinput" :label="__('Persyaratan')" id="persyaratan" name="persyaratan" :value="old('persyaratan', $jalur_masuk_ppdb->persyaratan)" />

<script>
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        $(".tagsinput").tagsinput('items');
        // Summernote
        configSimpleSummernote('summernote-simple');
    });
</script>
