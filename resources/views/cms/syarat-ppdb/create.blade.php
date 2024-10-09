<x-form action="{{ route('cms.syarat_ppdb.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.syarat-ppdb._form')
</x-form>
