<header class="wrapper">
    <nav class="navbar navbar-expand-lg center-nav navbar-dark bg-primary">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('/storage/uploads/' . $setting['logo']) }}" style="max-height: 60px;"
                        srcset="{{ asset('/storage/uploads/' . $setting['logo']) }} 2x" alt="" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">{{ $setting['alias'] }}</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        @foreach ($menu as $item)
                            @if ($item->children->isEmpty())
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ $item['type'] == TYPE_MENU_INTERNAL ? url($item['url']) : $item['url'] }}"
                                        target="{{ $item['target'] }}">{{ $item['nama_menu'] }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">{{ $item['nama_menu'] }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($item->children as $child)
                                            <li class="nav-item">
                                                <a class="dropdown-item"
                                                    href="{{ $child['type'] == TYPE_MENU_INTERNAL ? url($child['url']) : $child['url'] }}"
                                                    target="{{ $child['target'] }}">{{ $child['nama_menu'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="mailto:{{ $setting['email'] }}" class="link-inverse">{{ $setting['email'] }}</a>
                            <br />{{ $setting['phone'] }}<br />
                            <nav class="nav social social-white mt-4">
                                <a href="{{ $setting['twitter'] }}"><i class="uil uil-twitter"></i></a>
                                <a href="{{ $setting['facebook'] }}"><i class="uil uil-facebook-f"></i></a>
                                <a href="{{ $setting['instagram'] }}"><i class="uil uil-instagram"></i></a>
                                <a href="{{ $setting['youtube'] }}"><i class="uil uil-youtube"></i></a>
                            </nav>
                            <!-- /.social -->
                        </div>
                    </div>
                    <!-- /.offcanvas-footer -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvas-info"><i class="uil uil-info-circle"></i></a></li>
                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
            <h3 class="text-white fs-30 mb-0">{{ $setting['name'] }}</h3>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-6">

            <div class="widget mb-8">
                <h4 class="widget-title text-white mb-3">Contact Info</h4>
                <address> {{ $setting['address'] }} </address>
                <a href="mailto:{{ $setting['email'] }}">{{ $setting['email'] }}</a>
                <br /> {{ $setting['phone'] }}
            </div>
            <div class="widget">
                <h4 class="widget-title text-white mb-3">Follow Us</h4>
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
        <!-- /.offcanvas-body -->
    </div>

</header>
<!-- /header -->
