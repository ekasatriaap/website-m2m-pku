<x-form action="{{ route('cms.gallery.update', encode($gallery->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.gallery._form')
</x-form>
