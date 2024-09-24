<div class="row">
    <div class="col-md-4">
        <img src="{{ $gallery->image ? asset("storage/uploads/gallery/{$gallery->image}") : asset('assets/img/no-photo.jpg') }}"
            class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $gallery->title }}</h2>
        <hr />
        <p>{!! $gallery->description !!}</p>
    </div>
</div>
