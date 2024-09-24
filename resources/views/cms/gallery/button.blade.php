@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.gallery.edit', $id) .
                '" data-title="Edit Data Gallery"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => "<i class='fas fa-eye'></i>",
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.gallery.show', $id) .
                '" data-title="Show Detail Gallery" btnDetail',
            'title' => 'Show',
            'color' => 'info',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.gallery.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
