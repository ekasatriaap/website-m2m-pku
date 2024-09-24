<x-form action="{{ route('cms.bidang.update', encode($bidang->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST">
    @method('put')
    @include('cms.bidang._form')
</x-form>
