<x-web-layout :title="$page->title">
    <section class="wrapper bg-primary position-relative">
        <div class="container py-8 pt-md-14 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-5">
                    <h3 class="display-1 mb-6 text-light">{{ $page->title }}</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="card border-0 shadow">
                <figure class="card-img-top">
                    <img src="{{ asset("/storage/uploads/{$page->image}") }}" alt="" />
                </figure>
                <div class="card-body">
                    <div class="d-flex mb-4">
                        <img src="{{ asset('') }}/web-assets/img/icons/lineal/controller.svg"
                            class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                        <h2 class="display-4 ms-3">{{ $page->title }}</h2>
                    </div>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
</x-web-layout>
