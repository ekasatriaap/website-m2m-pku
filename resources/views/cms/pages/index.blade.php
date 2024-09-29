<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                @slot('toolbar')
                    <a class="btn btn-primary" href="{{ route('cms.pages.create') }}">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                @endslot

                <div class="table-responsive">
                    {{ $dataTable->table(['class' => 'table table-striped']) }}
                </div>
            </x-card>
        </div>
    </x-row>

    @push('add-scripts')
        {!! $dataTable->scripts() !!}
    @endpush
</x-app-layout>
