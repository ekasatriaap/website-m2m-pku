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
        <div class="container py-14 py-md-16 text-center">
            <div class="row">
                <div class="col-lg-10 col-xl-8 col-xxl-7 mx-auto mb-8">
                    <h2 class="display-5 mb-3">{{ $title }} {{ getSettingWebsite('name') }}</h2>
                    <p class="lead fs-lg">Foto terbaik yang sudah kami pilih dari {{ getSettingWebsite('name') }}.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="grid grid-view projects-masonry">
                <div class="row gx-md-6 gy-6 isotope">
                    @foreach ($gallery as $item)
                        <div class="project item col-md-6 col-xl-4 events">
                            <figure class="overlay overlay-1 rounded">
                                <a href="{{ asset("/storage/uploads/{$item->image}") }}" data-glightbox
                                    data-gallery="shots-group">
                                    <img src="{{ asset("/storage/uploads/{$item->image}") }}" alt="" />
                                </a>
                                <figcaption>
                                    <h5 class="from-top mb-0">{{ $item->title }}</h5>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid -->
        </div>
        <!-- /.container -->
    </section>
</x-web-layout>
