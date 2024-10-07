<x-form action="{{ route('cms.profile_anggota.update', encode($profile_anggota->id)) }}"
    onsubmit="submitModalDataTable(this); return false;" method="POST" enctype="multipart/form-data">
    @method('put')
    @include('cms.profile-anggota._form')
</x-form>
