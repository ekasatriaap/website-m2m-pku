<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.web-meta')
    <title>{{ $title }}</title>
    @if ($setting['favicon'])
        <link rel="shortcut icon" href="{{ asset('/storage/uploads/' . $setting['favicon']) }}">
    @endif
    @include('layouts.partials.web-styles')
    @stack('add-styles')
</head>

<body>
    <div class="content-wrapper">
        @include('layouts.partials.web-header', ['setting' => $setting, 'menu' => $menu])
        {{ $slot }}
    </div>
    @include('layouts.partials.web-footer', ['setting' => $setting])
    @include('layouts.partials.web-scripts')
</body>

</html>
