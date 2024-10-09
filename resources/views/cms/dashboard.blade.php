<x-app-layout>
    <x-row>
        <x-dashboard-card class="col-lg-6" title="Total Halaman" :value="$pages" color="light" icon="fas fa-file-alt" />
        <x-dashboard-card class="col-lg-6" title="Total Berita" :value="$all_news" color="primary" icon="fas fa-newspaper" />
        <x-form-label class="col-lg-12" label="Berita Per Status" />
        <x-dashboard-card class="col-lg-3" title="Total Berita Diterbitkan" :value="$published_news" color="success"
            icon="fas fa-check" />
        <x-dashboard-card class="col-lg-3" title="Total Berita Diajukan" :value="$submission_news" color="info"
            icon="fas fa-spinner" />
        <x-dashboard-card class="col-lg-3" title="Total Berita Draft" :value="$draft_news" color="secondary"
            icon="fas fa-file-alt" />
        <x-dashboard-card class="col-lg-3" title="Total Berita Ditolak" :value="$reject_news" color="danger"
            icon="fas fa-times" />
        <x-form-label class="col-lg-12" label="Berita Per Bidang" />
        @foreach ($news_per_bidang as $bidang)
            <x-dashboard-card class="col-lg-3" title="Berita {{ $bidang->nama_bidang }}" :value="$bidang->news->count()"
                color="{{ $color[array_rand($color)] }}" icon="fas fa-newspaper" />
        @endforeach
    </x-row>
</x-app-layout>
