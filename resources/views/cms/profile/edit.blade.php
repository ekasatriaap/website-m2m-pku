<x-app-layout :title="$title">
    <x-row class="mt-sm-4">
        <div class="col-md-12">
            <x-row>
                <div class="col-md-6">
                    <x-card title="Edit Profile">
                        <x-form method="post" action="{{ route('profile.update') }}" id="update-profile-form">
                            @method('patch')
                            <x-form-group :label="__('Name')" for="name" id="name" name="name" :value="old('name', $user->name)"
                                required />
                            <x-form-group :label="__('Username')" for="username" id="username" name="username"
                                :value="old('username', $user->username)" required />
                            <x-form-group :label="__('Email')" for="email" id="email" name="email" type="email"
                                :value="old('email', $user->email)" required />
                            <div class="text-right">
                                <button class="btn btn-primary btn-icon icon-left">
                                    <i class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </x-form>
                    </x-card>
                </div>
                <div class="col-md-6">
                    <x-card title="Change Password">
                        <x-form method="post" action="{{ route('password.update') }}" id="update-password-form">
                            @method('put')
                            <x-form-group :label="__('Current Password')" for="current_password" id="current_password"
                                name="current_password" type="password" value="" required />
                            <x-form-group :label="__('New Password')" for="password" id="password" name="password" value=""
                                type="password" required />
                            <x-form-group :label="__('Confirm Password')" for="password_confirmation" id="password_confirmation"
                                name="password_confirmation" type="password" value="" required />
                            <div class="text-right">
                                <button class="btn btn-primary btn-icon icon-left">
                                    <i class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </x-form>
                    </x-card>
            </x-row>
        </div>
    </x-row>
    @push('add-scripts')
        <script>
            $(document).ready(function() {
                $(`#update-profile-form`).submit(function(e) {
                    e.preventDefault();
                    const form = this;
                    const url = $(form).attr('action');
                    const method = $(form).attr('method');
                    ajaxMaster(form, url, method).catch((error) => {
                        setInvalidFeedback(error, form);
                    });
                });

                $(`#update-password-form`).submit(function(e) {
                    e.preventDefault();
                    const form = this;
                    const url = $(form).attr('action');
                    const method = $(form).attr('method');
                    ajaxMaster(form, url, method).catch((error) => {
                        setInvalidFeedback(error, form);
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
