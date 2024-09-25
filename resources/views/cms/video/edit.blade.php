<x-form action="{{ route('cms.video.update', encode($video->id)) }}" onsubmit="submitModalDataTable(this); return false;"
    method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.video._form')
</x-form>
