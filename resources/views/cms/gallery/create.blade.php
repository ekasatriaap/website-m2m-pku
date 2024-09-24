<x-form action="{{ route('cms.gallery.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.gallery._form')
</x-form>
