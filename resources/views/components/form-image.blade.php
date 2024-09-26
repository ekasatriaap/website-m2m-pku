<div class="form-group">
    @if ($attributes->has('label'))
        <x-form-label :label="$label" :for="$id" />
    @endif
    <div id="image-preview" {!! $attributes->merge(['class' => 'image-preview']) !!}
        @if ($attributes->has('default') && !empty($attributes->get('default'))) @php
                    $get_path = "storage/uploads/{$default}";
                    if (file_exists(public_path($get_path))) {
                      $get_content = file_get_contents(public_path("$get_path"));
                      $finfo = finfo_open(FILEINFO_MIME_TYPE);
                      $mime_type = finfo_file($finfo, public_path($get_path));
                      $extension = explode('/', $mime_type)[1];
                      finfo_close($finfo);
                      $imageData = base64_encode($get_content);
                    }
                @endphp
                style="background-image: url(data:image/{{ $extension ?? '' }};base64,{{ $imageData ?? '' }}); background-size: cover; background-position: center center;" @endif>
        <label for="{{ $id }}" id="image-label">
            @if ($attributes->has('default') && !empty($attributes->get('default')))
                Change Image
            @else
                Choose Image
            @endif
        </label>
        <input type="file" name="{{ $name }}" id="{{ $id }}" />
    </div>
    @if ($errors->has($name))
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
