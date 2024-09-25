<x-form action="{{ route('cms.slider.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.slider._form')
</x-form>
