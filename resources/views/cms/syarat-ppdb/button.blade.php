@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.syarat_ppdb.edit', $id) .
                '" data-title="Edit Data Syarat PPDB"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.syarat_ppdb.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
