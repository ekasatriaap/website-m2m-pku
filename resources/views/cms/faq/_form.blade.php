<x-form-input :label="__('Pertanyaan')" id="pertanyaan" name="pertanyaan" :value="$faq->pertanyaan" />
<x-form-textarea :label="__('Jawaban')" class="summernote-simple" id="jawaban" name="jawaban" :value="$faq->jawaban" />

<script>
    // Summernote
    $('#default-drsk-modal').on('shown.bs.modal', function() {
        configSimpleSummernote('summernote-simple');
    });
</script>
