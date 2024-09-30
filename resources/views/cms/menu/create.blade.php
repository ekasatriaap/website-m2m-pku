<x-form action="{{ route('cms.menu.store') }}" onsubmit="submitModalReloadPage(this); return false;" method="POST"
    enctype="multipart/form-data">
    @include('cms.menu._form')
</x-form>
