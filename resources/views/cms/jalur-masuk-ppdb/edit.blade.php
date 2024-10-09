<x-form action="{{ route('cms.jalur_masuk_ppdb.update', encode($jalur_masuk_ppdb->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.jalur-masuk-ppdb._form')
</x-form>
