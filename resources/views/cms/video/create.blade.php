<x-form action="{{ route('cms.video.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.video._form')
</x-form>
