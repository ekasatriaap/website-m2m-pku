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
            <form action="" method="GET">
                <div class="row mb-8 justify-content-end">
                    <div class="col-lg-6 d-flex">
                        <div class="form-group w-100">
                            <input type="text" name="search" id="search" class="form-control"
                                value="{{ $search }}" placeholder="Cari...">
                        </div>
                        <button type="submit" class="btn btn-primary ms-2">Cari</button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-4 mb-4">
                        <article>
                            <figure class="overlay overlay-1 hover-scale rounded mb-5">
                                <a href="{{ route('news_detail', $item->slug) }}">
                                    <img src="{{ asset("/storage/uploads/{$item->thumbnail}") }}" alt="" />
                                </a>
                                <figcaption>
                                    <h5 class="from-top mb-0">Read More</h5>
                                </figcaption>
                            </figure>
                            <div class="post-header">
                                <div class="post-category text-line">
                                    <a href="#" class="hover" rel="category">{{ $item->bidang->nama_bidang }}</a>
                                </div>
                                <!-- /.post-category -->
                                <h2 class="post-title h3 mt-0 mb-0">
                                    <a class="link-dark" href="{{ route('news_detail', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                            </div>
                            <!-- /.post-header -->
                            <div class="post-footer">
                                <ul class="post-meta">
                                    <li class="post-date"><i
                                            class="uil uil-calendar-alt"></i><span>{{ tanggal($item->created_at) }}</span>
                                    </li>
                                </ul>
                                <!-- /.post-meta -->
                            </div>
                            <!-- /.post-footer -->
                        </article>
                    </div>
                @endforeach
            </div>
            <nav class="d-flex mt-8" aria-label="pagination">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($news->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $news->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                        @if ($page == $news->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($news->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <!-- /.container -->
    </section>
</x-web-layout>
