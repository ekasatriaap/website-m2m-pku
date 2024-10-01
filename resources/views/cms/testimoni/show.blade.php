<div class="row">
    <div class="col-md-4">
        <img src="{{ $testimoni->image ? getFileUpload($testimoni->image) : asset('assets/img/no-photo.jpg') }}"
            class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $testimoni->name }}</h2>
        <hr />
        <p>{!! $testimoni->testimoni !!}</p>
    </div>
</div>
