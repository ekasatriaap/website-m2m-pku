<x-form action="{{ route('cms.bidang.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST">
    @include('cms.bidang._form')
</x-form>
