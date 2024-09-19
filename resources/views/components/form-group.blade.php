<div {!! $attributes->merge(['class' => 'form-group']) !!}>
    <x-form-label :label="$label" :for="$for" :required="$required" />
    <x-form-input :name="$name" :id="$id" :type="$type ?? 'text'" :value="$value" :required="$required"
        :class="$errors->has($name) ? 'is-invalid' : ''" :placeholder="$label" autocomplete="{{ $attributes->get('autocomplete') }}" />
    @if ($errors->has($name))
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
