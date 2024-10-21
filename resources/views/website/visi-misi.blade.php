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
            <div class="row gy-10 gx-lg-8 gx-xl-12 align-items-center">
                <div class="col-lg-7 order-lg-2 position-relative">
                    <figure><img class="w-auto" src="{{ asset("/storage/uploads/{$setting['image']['value']}") }}"
                            srcset="{{ asset("/storage/uploads/{$setting['image']['value']}") }} 2x" alt="" />
                    </figure>
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <h2 class="display-4 mb-3">Visi & Misi</h2>
                    <p class="lead fs-lg">{{ $setting['visi']['value'] }}</p>
                    <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                        @foreach (explode(',', $setting['misi']['value']) as $item)
                            <li><span><i class="uil uil-check"></i></span><span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
