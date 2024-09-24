<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                <x-form method="post" action="{{ route('cms.news.store') }}" id="create-news-form"
                    enctype="multipart/form-data">
                    @include('cms.news._form')
                </x-form>
            </x-card>
        </div>
    </x-row>
</x-app-layout>
