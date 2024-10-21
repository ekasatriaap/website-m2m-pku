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
            <div class="row">
                @foreach ($majalah as $item)
                    <div class="col-lg-3 mb-6">
                        <div class="swiper-slide">
                            <figure class="rounded">
                                @if (substr($item->file, -3) == 'pdf')
                                    <img src="{{ asset('') }}/web-assets/img/photos/pd7.jpg"
                                        srcset="{{ asset('') }}/web-assets/img/photos/pd7@2x.jpg 2x"
                                        alt="" />
                                    <a href="{{ asset("/storage/uploads/$item->file") }}" class="item-link"
                                        target="_blank">
                                        <i><i class="uil uil-focus-add"></i></i></a>
                                @else
                                    <img src="{{ asset("/storage/uploads/$item->file") }}"
                                        srcset="{{ asset("/storage/uploads/$item->file") }} 2x" alt="" />
                                    <a class="item-link" href="{{ asset("/storage/uploads/$item->file") }}"
                                        data-glightbox data-gallery="projects-group">
                                        <i class="uil uil-focus-add"></i>
                                    </a>
                                @endif
                            </figure>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
