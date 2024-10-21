<x-form action="{{ route('cms.faq.store') }}" onsubmit="submitModalDataTable(this); return false;" method="POST">
    @include('cms.faq._form')
</x-form>
