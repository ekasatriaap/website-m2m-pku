<x-form action="{{ route('cms.menu.update', encode($menu->id)) }}" onsubmit="submitModalReloadPage(this); return false;"
    method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.menu._form')
</x-form>
