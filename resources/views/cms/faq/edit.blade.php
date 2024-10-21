<x-form action="{{ route('cms.faq.update', encode($faq->id)) }}" onsubmit="submitModalDataTable(this); return false;"
    method="POST">
    @method('put')
    @include('cms.faq._form')
</x-form>
