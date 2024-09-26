<x-form action="{{ route('cms.tabloid.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.tabloid._form')
</x-form>
