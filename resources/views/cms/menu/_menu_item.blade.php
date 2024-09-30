<li class="dd-item" data-id="{{ $item->id }}">
    <div class="dd-handle">{{ $item->nama_menu }}</div>
    <div class="dd-actions">
        <button class="btn btn-sm btn-warning" data-id="{{ $item->id }}" data-title="Edit Menu"
            data-url="{{ route('cms.menu.edit', $item->id) }}" onclick="actionModalData(this)">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-danger delete-menu" data-url="{{ route('cms.menu.destroy', $item->id) }}">
            <i class="fas fa-trash"></i>
        </button>
    </div>
    @if ($item->children->count() > 0)
        <ol class="dd-list">
            @foreach ($item->children as $child)
                @include('cms.menu._menu_item', ['item' => $child])
            @endforeach
        </ol>
    @endif
</li>
