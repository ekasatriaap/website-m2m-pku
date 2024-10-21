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
            <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                <!--/column -->
                <div class="col-lg-6">
                    <img src="{{ asset('') }}/web-assets/img/icons/lineal/megaphone.svg"
                        class="svg-inject icon-svg icon-svg-md mb-4" alt="" />
                    <h2 class="display-4 mb-3">{{ $title }}</h2>
                    <p class="mb-6">{!! $description['description_struktural']['value'] !!}</p>
                </div>
                <!--/column -->
                <div class="col-md-8 col-lg-6 col-xl-5 position-relative">
                    <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1"
                        style="top: -2rem; right: -1.9rem;"></div>
                    <figure class="rounded">
                        <img src="{{ asset("/storage/uploads/{$description['image_struktural']['value']}") }}"
                            srcset="{{ asset("/storage/uploads/{$description['image_struktural']['value']}") }} 2x"
                            alt="">
                    </figure>
                </div>
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row mb-3">
                <div class="col-md-10 col-lg-12 col-xl-10 col-xxl-9 mx-auto text-center">
                    <h3 class="display-4 mb-7 px-lg-19 px-xl-18">Bagian Dari Struktural</h3>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
                @foreach ($anggota as $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="position-relative">
                            <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0"
                                style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
                            <div class="card">
                                <figure class="card-img-top">
                                    <img class="img-fluid" src="{{ asset("/storage/uploads/{$item->image}") }}"
                                        srcset="{{ asset("/storage/uploads/{$item->image}") }} 2x" alt="" />
                                </figure>
                                <div class="card-body px-6 py-5">
                                    <h4 class="mb-1">{{ $item->name }}</h4>
                                    <p class="mb-0">{{ $item->jabatan }}</p>
                                </div>
                                <!--/.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /div -->
                    </div>
                    <!--/column -->
                @endforeach
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
