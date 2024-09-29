<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.pages.update', encode($pages->id)) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @include('cms.pages._form')
                </x-form>
            </x-card>
        </div>
    </x-row>
</x-app-layout>
