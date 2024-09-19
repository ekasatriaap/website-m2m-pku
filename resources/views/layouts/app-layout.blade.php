<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.meta')
    <title>{{ $title }}</title>

    @include('layouts.partials.styles')
    @stack('add-styles')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            {{-- navbar start --}}
            @include('layouts.partials.navbar')
            {{-- navbar end --}}

            {{-- sidebar start --}}
            @include('layouts.partials.sidebar')
            {{-- sidebar end --}}

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $title }}</h1>
                    </div>
                    {{-- main content start --}}
                    {{ $slot }}
                    {{-- main content end --}}
                </section>
            </div>

            {{-- footer start --}}
            @include('layouts.partials.footer')
            {{-- footer end --}}
        </div>
    </div>

    {{-- script start --}}
    @include('layouts.partials.scripts')
    @stack('add-scripts')
    {{-- script end --}}
</body>

</html>
