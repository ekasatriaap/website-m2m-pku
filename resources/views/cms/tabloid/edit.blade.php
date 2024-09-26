<x-form action="{{ route('cms.tabloid.update', encode($tabloid->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.tabloid._form')
</x-form>
