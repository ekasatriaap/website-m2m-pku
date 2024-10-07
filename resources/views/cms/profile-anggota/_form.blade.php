<x-form-input :label="__('Nama')" id="name" name="name" :value="old('name', $profile_anggota->name)" />
<x-form-input :label="__('Jabatan')" id="jabatan" name="jabatan" :value="old('jabatan', $profile_anggota->jabatan)" />
<x-form-input :label="__('Urutan')" id="urutan" name="urutan" :value="old('urutan', $profile_anggota->urutan)" data-number-only />
<x-form-select :label="__('Jenis Profile')" id="jenis_profile" name="jenis_profile" :value="old('jenis_profile', $profile_anggota->jenis_profile)" :options="$jenis_profile" />
<x-form-textarea :label="__('Deskripsi')" class="summernote-simple" id="description" name="description" :value="old('description', $profile_anggota->description)" />
<x-form-image :label="__('Image')" id="image" previewId="image-preview" inputId="image-input-upload" name="image"
    :default="$profile_anggota->image" />

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        // Image Preview
        configUploadPreview('image-input-upload', 'image-preview');
        configSimpleSummernote('summernote-simple');
    });
</script>
