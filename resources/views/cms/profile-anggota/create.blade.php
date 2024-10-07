<x-form action="{{ route('cms.profile_anggota.store') }}" onsubmit="submitModalDataTable(this); return false;"
    method="POST" enctype="multipart/form-data">
    @include('cms.profile-anggota._form')
</x-form>
