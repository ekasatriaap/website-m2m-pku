<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form method="post" action="{{ route('cms.pages.store') }}" id="create-pages-form"
                    enctype="multipart/form-data">
                    @include('cms.pages._form')
                </x-form>
            </x-card>
        </div>
    </x-row>
</x-app-layout>
