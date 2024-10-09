<div class="row">
    <div class="col-md-12">
        <h2>{{ $jalur_masuk_ppdb->nama_jalur }}</h2>
        <hr />
        <p>{!! $jalur_masuk_ppdb->description !!}</p>
        @if ($jalur_masuk_ppdb->persyaratan)
            <h4>Persyaratan</h4>
            <ul>
                @php
                    $persyaratan = explode(',', $jalur_masuk_ppdb->persyaratan);
                @endphp
                @foreach ($persyaratan as $p)
                    <li>{{ $p }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
