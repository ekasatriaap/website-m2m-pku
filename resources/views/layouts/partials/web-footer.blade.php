<footer class="bg-dark text-inverse">
    <div class="container py-13 py-md-15">
        <div class="row gy-6 gy-lg-0">
            <div class="col-lg-4">
                <div class="widget">
                    <img class="mb-4" src="{{ asset('/storage/uploads/' . $setting['logo']) }}"
                        srcset="{{ asset('/storage/uploads' . $setting['logo']) }} 2x" alt="" />
                    <p class="mb-4">{{ $setting['footer_credit'] }}</p>
                    <nav class="nav social social-white">
                        <a href="{{ $setting['twitter'] }}"><i class="uil uil-twitter"></i></a>
                        <a href="{{ $setting['facebook'] }}"><i class="uil uil-facebook-f"></i></a>
                        <a href="{{ $setting['instagram'] }}"><i class="uil uil-instagram"></i></a>
                        <a href="{{ $setting['youtube'] }}"><i class="uil uil-youtube"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <div class="col-md-4 col-lg-2">
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-2 offset-lg-2">
                <div class="widget">
                    <h4 class="widget-title mb-3 text-white">Peta Situs</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('visi_misi') }}">Visi Misi</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('news') }}">Berita</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->

            <!-- /column -->
            <div class="col-md-4 col-lg-2">
                <div class="widget">
                    <h4 class="widget-title mb-3 text-white">Kontak Kami</h4>
                    <address class="d-flex"> <i class="uil uil-map-marker me-1"></i><span>
                            {{ $setting['address'] }}</span></address>
                    <a href="mailto:{{ $setting['email'] }}"><i
                            class="uil uil-envelope me-1"></i>{{ $setting['email'] }}</a>
                    <p class="mb-0"><i class="uil uil-calling me-1"></i>{{ $setting['phone'] }}</p>
                    <p class="mb-0"><i class="uil uil-calling me-1"></i>{{ $setting['whatsapp'] }}</p>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
