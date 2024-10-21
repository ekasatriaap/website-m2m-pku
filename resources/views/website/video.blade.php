<x-web-layout :title="$title">
    <section class="wrapper bg-primary position-relative">
        <div class="container py-8 pt-md-14 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-5">
                    <h3 class="display-1 mb-6 text-light">{{ $title }}</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row">
                <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                    <h2 class="fs-15 text-uppercase text-muted mb-3">{{ $title }}</h2>
                    <h3 class="display-4 mb-10">Berikut <span
                            class="underline-3 style-2 yellow">{{ $title }}</span>
                        {{ getSettingWebsite('name') }}.</h3>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($video as $item)
                    <div class="col-lg-3">
                        <iframe class="rounded" style="width: 100%" src="{{ $item->url }}" frameborder="0"
                            title="{{ $item->title }}"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
