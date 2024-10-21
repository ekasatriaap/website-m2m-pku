<x-web-layout :title="$title">
    {{-- silder start --}}
    <div class="swiper-container dots-over" data-margin="5" data-dots="true" data-nav="true" data-autoheight="true">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide bg-overlay bg-overlay-400 rounded">
                        <img src="{{ asset('/storage/uploads/' . $slider['image']) }}" alt="" />
                        <div class="caption-wrapper p-12">
                        </div>
                        <!--/.caption-wrapper -->
                    </div>
                @endforeach
            </div>
            <!--/.swiper-wrapper -->
        </div>
    </div>
    {{-- end --}}

    {{-- section 1 start --}}
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10 ">
                <!--/column -->
                <div class="col-lg-6">
                    <h2 class="display-4 mb-3">{{ $setting['section_1_title']['value'] }}</h2>
                    <!-- <p class="lead fs-lg">We are a digital and branding company that believes in the power of creative strategy and along with great design.</p> -->
                    <p class="mb-6">{!! $setting['section_1_description']['value'] !!}</p>
                </div>
                <!--/column -->
                <div class="col-lg-6 position-relative">
                    <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1"
                        style="top: 3rem; left: 5.5rem"></div>
                    <div class="overlap-grid overlap-grid-2">
                        <div class="item">
                            <figure class="rounded shadow">
                                <img src="{{ asset('/storage/uploads/' . $setting['section_1_image']['value']) }}"
                                    srcset="{{ asset('/storage/uploads/' . $setting['section_1_image']['value']) }} 2x"
                                    alt="">
                            </figure>
                        </div>
                        <div class="item">
                            <figure class="rounded shadow">
                                <iframe class="rounded" style="width: 530px; max-width:100%" height="300px"
                                    src="{{ $setting['section_1_url_video']['value'] }}" title="" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </figure>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}

    {{-- section 2 start --}}
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="card rounded-4"
                style="background-image: url('{{ asset('/storage/uploads/' . $setting['section_2_image']['value']) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="card-body p-md-10 py-xl-11 px-xl-15">
                    <div class="row gx-lg-8 gx-xl-0 gy-10 align-items-center">
                        <div class="col-lg-6 order-lg-2 d-flex position-relative">
                            <img class="img-fluid ms-auto mx-auto me-lg-8"
                                src="{{ asset('/storage/uploads/' . $setting['section_2_foto']['value']) }}"
                                srcset="{{ asset('/storage/uploads/' . $setting['section_2_foto']['value']) }} 2x"
                                alt="" data-cue="fadeIn">
                            <div data-cue="slideInRight" data-delay="300">
                                <div class="card shadow-lg position-absolute" style="bottom: 10%; right: -3%;">
                                    <div class="card-body py-4 px-5">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <h3 class="counter mb-0 text-nowrap">
                                                    {{ $setting['section_2_name']['value'] }}
                                                </h3>
                                                <p class="fs-14 lh-sm mb-0 text-nowrap">
                                                    {{ $setting['section_2_jabatan']['value'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.card -->
                            </div>
                            <!--/div -->
                        </div>
                        <!--/column -->
                        <div class="col-lg-6 text-center text-lg-start" data-cues="slideInDown" data-group="page-title"
                            data-delay="600">
                            <h1 class="display-5 mb-5 text-light">{{ $setting['section_2_title']['value'] }}</h1>
                            <p class="lead fs-lg lh-sm mb-7 pe-xl-10">{!! $setting['section_2_description']['value'] !!}</p>

                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/.card-body -->
            </div>
            <!--/.card -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}

    {{-- section 3 start --}}
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16 text-center">
            <div class="row">
                <div class="col-md-9 col-lg-8 col-xl-8 mx-auto text-center">
                    <img src="{{ asset('') }}web-assets/img/icons/lineal/puzzle-2.svg"
                        class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
                    <h2 class="display-4 mb-3">{{ $setting['section_3_title']['value'] }}</h2>
                    <p class="lead fs-lg mb-6 px-xl-10 px-xxl-15">{!! $setting['section_3_description']['value'] !!}</p>
                </div>
                <!-- /column -->
            </div>
            <img src="{{ asset('/storage/uploads/' . $setting['section_3_image']['value']) }}" class="rounded"
                alt="" style="width: 100%;">
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}

    {{-- sectio 4 start --}}
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('/storage/uploads/' . $setting['section_4_image']['value']) }}"
        style="background-image: url('{{ asset('/storage/uploads/' . $setting['section_4_image']['value']) }}');">
        <div class="container py-14 py-md-17 ">
            <i class="icn-flower text-white fs-30 opacity-50"></i>
            <h2 class="text-white">{{ $setting['section_4_title']['value'] }}</h2>
            <div class="row mt-3">
                <div class="col-xl-9 col-xxl-8 ">
                    <p>{!! $setting['section_4_description']['value'] !!}</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}

    {{-- alumni start --}}
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row gx-xl-12 gy-10">
                <div class="col-xl-4">
                    <h2 class="display-4 mt-10 mb-3">Alumni {{ getSettingWebsite('name') }}</h2>
                    <p class="lead fs-lg mb-6">Mari menjadi bagian dari alumni hebat kami.</p>
                    <a href="#" class="btn btn-primary rounded-pill">Lihat Seluruh</a>
                </div>
                <!-- /column -->
                <div class="col-xl-8">
                    <div class="position-relative">
                        <div class="shape rounded-circle bg-soft-primary rellax w-16 h-16" data-rellax-speed="1"
                            style="top: -0.7rem; right: -1.7rem;"></div>
                        <div class="shape rounded-circle bg-line primary rellax w-16 h-16" data-rellax-speed="1"
                            style="bottom: -0.5rem; left: -1.4rem;"></div>
                        <div class="swiper-container dots-closer mb-6" data-margin="0" data-dots="true"
                            data-items-md="2" data-items-xs="1">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($alumnis as $alumni)
                                        <div class="swiper-slide">
                                            <div class="item-inner">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <blockquote class="icon mb-0">
                                                            <p>“{!! $alumni['testimoni'] !!}”
                                                            </p>
                                                            <div class="blockquote-details">
                                                                <img class="rounded-circle w-12"
                                                                    src="{{ asset('/storage/uploads/' . $alumni['image']) }}"
                                                                    srcset="{{ asset('/storage/uploads/' . $alumni['image']) }} 2x"
                                                                    alt="" />
                                                                <div class="info">
                                                                    <h5 class="mb-1">{{ $alumni['name'] }}</h5>
                                                                    <p class="mb-0">Alumni {{ $alumni['angkatan'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </blockquote>
                                                    </div>
                                                    <!--/.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.item-inner -->
                                        </div>
                                    @endforeach
                                </div>
                                <!--/.swiper-wrapper -->
                            </div>
                            <!-- /.swiper -->
                        </div>
                        <!-- /.swiper-container -->
                    </div>
                    <!-- /.position-relative -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}

    {{-- berita start --}}
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <h2 class="display-4 mb-3 text-center">Berita Terbaru</h2>
            <p class="lead fs-lg mb-10 text-center px-md-16 px-lg-21 px-xl-0">Pantau terus berita terbaru dari kami.
            </p>
            <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-xl="3"
                data-items-md="2" data-items-xs="1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($news as $berita)
                            <div class="swiper-slide">
                                <article>
                                    <figure class="overlay overlay-1 hover-scale rounded mb-5"><a
                                            href="{{ route('news_detail', $berita->slug) }}"> <img
                                                src="{{ asset('/storage/uploads/' . $berita->thumbnail) }}"
                                                alt="" /></a>
                                        <figcaption>
                                            <h5 class="from-top mb-0">Read More</h5>
                                        </figcaption>
                                    </figure>
                                    <div class="post-header">
                                        <div class="post-category text-line">
                                            <a href="#" class="hover"
                                                rel="category">{{ $berita->bidang->nama_bidang }}</a>
                                        </div>
                                        <!-- /.post-category -->
                                        <h2 class="post-title h3 mt-0 mb-0"><a class="link-dark"
                                                href="{{ route('news_detail', $berita->slug) }}">{{ $berita->title }}</a>
                                        </h2>
                                    </div>
                                    <!-- /.post-header -->
                                    <div class="post-footer">
                                        <ul class="post-meta">
                                            <li class="post-date"><i
                                                    class="uil uil-calendar-alt"></i><span>{{ tanggal($berita->created_at) }}</span>
                                            </li>
                                        </ul>
                                        <!-- /.post-meta -->
                                    </div>
                                    <!-- /.post-footer -->
                                </article>
                                <!-- /article -->
                            </div>
                        @endforeach
                    </div>
                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
        </div>
        <!-- /.container -->
    </section>
    {{-- end --}}
</x-web-layout>
