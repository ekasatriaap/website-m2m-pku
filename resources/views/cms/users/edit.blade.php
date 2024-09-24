<x-form action="{{ route('cms.users.update', encode($user->id)) }}" onsubmit="submitModalDataTable(this); return false;"
    method="POST">
    @method('put')
    @include('cms.users._form')
</x-form>
