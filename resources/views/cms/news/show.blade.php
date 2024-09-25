<div class="row">
    <div class="col-md-4">
        <img src="{{ $news->image ? getFileUpload($news->image) : asset('assets/img/no-photo.jpg') }}" class="img-fluid">
    </div>
    <div class="col-md-8">
        <h2>{{ $news->title }}</h2>
        <p class="text-muted">Dipublikasikan pada {{ $news->created_at->format('d-m-Y H:i') }}</p>
        <p class="text-muted">Oleh {{ $news->user->name }}</p>
        <p class="text-muted">Bidang {{ $news->bidang->nama_bidang }}</p>
        <hr />
        <p>{!! $news->content !!}</p>
    </div>
</div>
