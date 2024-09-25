<div class="row">
    <div class="col-md-4">
        <img src="{{ $slider->image ? getFileUpload($slider->image) : asset('assets/img/no-photo.jpg') }}"
            class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $slider->title }}</h2>
        <hr />
        <p>{!! $slider->description !!}</p>
    </div>
</div>
