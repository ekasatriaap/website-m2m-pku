<x-form action="{{ route('cms.users.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST">
    @include('cms.users._form')
</x-form>
