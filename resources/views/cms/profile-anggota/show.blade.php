<div class="row">
    <div class="col-md-4">
        <img src="{{ $profile_anggota->image ? getFileUpload($profile_anggota->image) : asset('assets/img/no-photo.jpg') }}"
            class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $profile_anggota->name }}</h2>
        <h3>{{ $profile_anggota->jabatan }} ({{ JENIS_PROFILE[$profile_anggota->jenis_profile] }})</h3>
        <hr />
        <p>{!! $profile_anggota->description !!}</p>
    </div>
</div>
