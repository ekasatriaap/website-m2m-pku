@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.tabloid.edit', $id) .
                '" data-title="Edit Data Tabloid"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => "<i class='fas fa-eye'></i>",
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.tabloid.show', $id) .
                '" data-title="Show Detail Tabloid" btnDetail',
            'title' => 'Show',
            'color' => 'info',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.tabloid.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
