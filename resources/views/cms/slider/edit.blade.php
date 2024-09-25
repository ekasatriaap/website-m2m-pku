<x-form action="{{ route('cms.slider.update', encode($slider->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.slider._form')
</x-form>
