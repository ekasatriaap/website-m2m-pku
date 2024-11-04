@php
    $class_form_bidang = 'd-none';
    if (accountIsOperator()) {
        $class_form_bidang = '';
    }
@endphp
<x-form-input :label="__('Nama')" id="name" name="name" :value="old('name', $user->name)" required />
<x-form-input :label="__('Username')" id="username" name="username" :value="old('username', $user->username)" required />
<x-form-input :label="__('Email')" id="email" name="email" type="email" :value="old('email', $user->email)" required />
@if (accountIsRoot())
    <x-form-select :label="__('Level')" id="level" name="level" :options="$levels" :value="old('level', $user->level)" />
@endif
<div id="form-bidang" class="{{ $class_form_bidang }}">
    <x-form-select :label="__('Bidang')" id="bidang" name="id_bidang" :options="$bidangs" :value="old('id_bidang', $user->id_bidang)"
        placeholder="Pilih Bidang" />
</div>

<script>
    $(document).on("change", "#level", function() {
        if ($(this).val() == {{ ADMIN }}) {
            $(`#form-bidang`).removeClass('d-none');
        } else {
            $(`#form-bidang`).addClass("d-none");
        }
    })
</script>
