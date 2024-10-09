<x-form action="{{ route('cms.jalur_masuk_ppdb.store') }}" onsubmit="submitModalDataTable(this); return false;"
    method="POST" enctype="multipart/form-data">
    @include('cms.jalur-masuk-ppdb._form')
</x-form>
