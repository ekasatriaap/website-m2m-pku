<x-form action="{{ route('cms.syarat_ppdb.update', encode($syarat_ppdb->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.syarat-ppdb._form')
</x-form>
