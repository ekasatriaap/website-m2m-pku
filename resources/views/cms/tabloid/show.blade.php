<div class="row">
    <div class="col-md-12">
        <h2>{{ $tabloid->title }}</h2>
        <hr />
        <p>{!! $tabloid->description !!}</p>
        @if ($tabloid->file)
            <p>
                <a href="{{ asset('storage/uploads/' . $tabloid->file) }}" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> Download File
                </a>
            </p>
        @endif
    </div>
</div>
