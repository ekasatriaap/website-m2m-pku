<x-form action="{{ route('cms.testimoni.update', encode($testimoni->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.testimoni._form')
</x-form>
