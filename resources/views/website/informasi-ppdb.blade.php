<x-web-layout :title="$title">
    <section class="wrapper bg-primary ">
        <div class="container py-6 pt-md-14 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-5">
                    <h3 class="display-1 mb-6 text-light">{{ $title }}</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center">
                <div class="col-md-8 col-lg-6 offset-lg-0 col-xl-5 offset-xl-1 position-relative">
                    <div class="shape bg-dot primary rellax w-17 h-21" data-rellax-speed="1"
                        style="top: -2rem; left: -1.4rem;"></div>
                    <figure class="rounded"><img src="{{ asset("/storage/uploads/{$setting['main_image']['value']}") }}"
                            srcset="{{ asset("/storage/uploads/{$setting['main_image']['value']}") }} 2x"
                            alt=""></figure>
                </div>
                <!--/column -->
                <div class="col-lg-6">
                    <img src="./assets/img/icons/lineal/telemarketer.svg" class="svg-inject icon-svg icon-svg-md mb-4"
                        alt="" />
                    <h2 class="display-4 mb-8">{{ $setting['main_title']['value'] }}</h2>
                    <p>
                        {!! $setting['main_description']['value'] !!}
                    </p>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                        <div class="col-lg-7 order-lg-2">
                            <figure>
                                <img class="w-auto"
                                    src="{{ asset("/storage/uploads/{$setting['syarat_umum_image']['value']}") }}"
                                    srcset="{{ asset("/storage/uploads/{$setting['syarat_umum_image']['value']}") }} 2x"
                                    alt="" />
                            </figure>
                        </div>
                        <!--/column -->
                        <div class="col-lg-5">
                            <h3 class="display-5">Syarat Umum.</h3>
                            <h2 class="fs-15  text-muted mb-7">{{ $setting['syarat_umum_description']['value'] }}</h2>
                            <div class="accordion accordion-wrapper" id="accordionExample">
                                @foreach ($syarat as $index => $item)
                                    <div class="card plain accordion-item">
                                        <div class="card-header" id="heading{{ $index }}">
                                            <button class="collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                                aria-controls="collapse{{ $index }}">
                                                {{ $item->syarat_name }}
                                            </button>
                                        </div>
                                        <!--/.card-header -->
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>
                                                    {!! $item->description !!}
                                                </p>
                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!--/.accordion-collapse -->
                                    </div>
                                @endforeach
                                <!--/.accordion-item -->
                            </div>
                            <!--/.accordion -->
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10">
                <div class="col-lg-3">
                    <figure><img class="w-auto"
                            src="{{ asset("/storage/uploads/{$setting['jalur_masuk_image']['value']}") }}"
                            srcset="{{ asset("/storage/uploads/{$setting['jalur_masuk_image']['value']}") }} 2x"
                            alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-8">
                    <ul class="nav nav-tabs nav-pills">
                        @foreach ($jalur_pendaftaran as $index => $item)
                            <li class="nav-item mb-3">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    href="#tab1-{{ $index }}">
                                    <i class="uil uil-laptop-cloud pe-1"></i>
                                    <span>{{ $item->nama_jalur }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- /.nav-tabs -->

                    <div class="tab-content">
                        @foreach ($jalur_pendaftaran as $index => $jalur)
                            <div class="tab-pane fade {{ $index == 0 ? 'active show' : '' }}"
                                id="tab1-{{ $index }}">
                                <p>
                                    {!! $jalur->description !!}
                                </p>
                                <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                                    @foreach (explode(',', $jalur->persyaratan) as $syarat)
                                        <li><i class="uil uil-check"></i>{{ $syarat }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/.tab-pane -->
                        @endforeach
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->


    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400"
                data-image-src="{{ asset('') }}/web-assets/img/photos/bg3.jpg">
                <div
                    class="card-body p-6 p-md-11 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-center text-lg-start">
                    <h3 class="display-6 mb-6 mb-lg-0 pe-lg-10 pe-xl-5 pe-xxl-18 text-white">Lebih dari 5000 orang
                        sudah menjadi alumni MAN 2 Kota Pekanbaru. Ayo join menjadi anggota dari alumni MAN 2 Pekanbaru
                    </h3>
                    <a href="#" class="btn btn-white rounded-pill mb-0 text-nowrap">Daftar Sekarang</a>
                </div>
                <!--/.card-body -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
