<div class="form-group">
    @if ($attributes->has('label'))
        <x-form-label :label="$label" :for="$id" />
    @endif
    <input {!! $attributes->merge(['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')]) !!}>
    @if ($errors->has($name))
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
