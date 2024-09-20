<div class="form-group">
    <x-form-label :label="$label" :for="$id" :required="$required" />
    <input {!! $attributes->merge(['class' => 'form-control']) !!}>
    @if ($errors->has($name))
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
