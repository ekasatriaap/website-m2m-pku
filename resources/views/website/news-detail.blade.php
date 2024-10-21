<x-web-layout :title="$news->title" :meta="$meta">
    <section class="wrapper bg-primary position-relative">
        <div class="container py-8 pt-md-14 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-5">
                    <h3 class="display-1 mb-6 text-light">{{ $news->title }}</h3>
                </div>
            </div>
        </div>
    </section>
    <div style="height: 100px;" class="bg-primary">
    </div>
    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single" style="margin-top: -100px;">
                        <div class="card">
                            <figure class="card-img-top">
                                <img src="{{ asset("/storage/uploads/{$news->image}") }}" alt="" />
                            </figure>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="post-category text-line">
                                        <a href="#" class="hover"
                                            rel="category">{{ $news->bidang->nama_bidang }}</a>
                                    </div>
                                    <ul class="post-meta ms-4">
                                        <li class="post-date">
                                            <i class="uil uil-calendar-alt"></i>
                                            <span>{{ tanggal($news->created_at) }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="classic-view">
                                    <article class="post">
                                        <div class="post-content mb-5">
                                            {!! $news->content !!}
                                        </div>
                                    </article>
                                    <!-- /.post -->
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.blog -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
</x-web-layout>
