@php
    $hide = old('type', $menu->type) == TYPE_MENU_INTERNAL ? false : true;
    $url = $menu->url;
    if ($menu->type == TYPE_MENU_INTERNAL) {
        $url_exp = explode('/', $menu->url);
        $url = $url_exp[2] ?? null;
    }
@endphp
<x-form-input :label="__('Nama Menu')" id="nama-menu" name="nama_menu" :value="old('nama_menu', $menu->nama_menu)" />
<x-form-select :label="__('Type')" id="type" name="type" :value="old('type', $menu->type)" :options="$type_menus" />
<div class="{{ $hide == true ? '' : 'd-none' }}" id="url">
    <x-form-input :label="__('URL')" id="url" name="url" :value="old('url', $url)" />
</div>
<div class="{{ $hide == true ? 'd-none' : '' }}" id="page">
    <x-form-select :label="__('Page')" id="page" name="page" :value="old('page', $url)" :options="$pages"
        placeholder="Parent" />
</div>
{{-- <x-form-input :label="__('Icon')" id="icon" name="icon" :value="old('icon', $menu->icon)" /> --}}
<x-form-select :label="__('Target')" id="target" name="target" :value="old('target', $menu->target)" :options="$target_menus" />

<script>
    $('#type').on('change', function() {
        if ($(this).val() == '{{ TYPE_MENU_INTERNAL }}') {
            $('#url').addClass('d-none');
            $('#page').removeClass('d-none');
        } else {
            $('#url').removeClass('d-none');
            $('#page').addClass('d-none');
        }
    });
</script>
