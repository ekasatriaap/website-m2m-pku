<div class="row">
    <div class="col-md-4">
        <img src="{{ $pages->image ? getFileUpload($pages->image) : asset('assets/img/no-photo.jpg') }}"
            class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $pages->title }}</h2>
        <p class="text-muted">Dipublikasikan pada {{ $pages->created_at->format('d-m-Y H:i') }}</p>
        <hr />
        <p>{!! $pages->content !!}</p>
    </div>
</div>
