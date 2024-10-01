<x-form action="{{ route('cms.testimoni.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.testimoni._form')
</x-form>
