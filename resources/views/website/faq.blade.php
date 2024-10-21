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
            <div class="row gx-lg-8 gx-xl-12 gy-10">
                <div class="col-lg-5 mb-0">
                    <img src="{{ asset('') }}/web-assets/img/icons/lineal/headphone.svg"
                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                    <h3 class="display-5 mb-4">Jika Anda tidak melihat jawaban atas pertanyaan Anda, Anda dapat
                        mengirimkan email kepada kami dari formulir kontak kami.</h3>
                    <p class="lead mb-6">If you don't see an answer to your question, you can send us an email from our
                        contact form.</p>
                </div>
                <!--/column -->
                <div class="col-lg-7">
                    <div id="accordion-3" class="accordion-wrapper">
                        @foreach ($faq as $index => $item)
                            <div class="card accordion-item">
                                <div class="card-header" id="accordion-heading-3-{{ $index }}">
                                    <button class="collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordion-collapse-3-{{ $index }}" aria-expanded="false"
                                        aria-controls="accordion-collapse-3-{{ $index }}">{{ $item->pertanyaan }}</button>
                                </div>
                                <!-- /.card-header -->
                                <div id="accordion-collapse-3-{{ $index }}" class="collapse"
                                    aria-labelledby="accordion-heading-3-{{ $index }}"
                                    data-bs-target="#accordion-3">
                                    <div class="card-body">
                                        <p>{!! $item->jawaban !!}</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.collapse -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /.accordion-wrapper -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
</x-web-layout>
