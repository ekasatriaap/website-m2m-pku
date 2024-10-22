<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('cms.dashboard') }}">{{ $setting['alias'] }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('cms.dashboard') }}">{{ substr($setting['alias'], 1, 1) }}</a>
        </div>
        <ul class="sidebar-menu">
            @foreach (getMenu() as $parent)
                @if (!isset($parent['child']))
                    <li>
                        <a class="nav-link" href="{{ route($parent['url']) }}">
                            <i class="{{ $parent['icon'] }}"></i>
                            <span>{{ $parent['name'] }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i class="{{ $parent['icon'] }}"></i><span>{{ $parent['name'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($parent['child'] as $child)
                                <li>
                                    <a class="nav-link" href="{{ route($child['url']) }}">{{ $child['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Website
            </a>
        </div>
    </aside>
</div>
