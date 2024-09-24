<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form action="{{ route('cms.news.update', encode($news->id)) }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @include('cms.news._form')
                </x-form>
            </x-card>
        </div>
    </x-row>
</x-app-layout>
