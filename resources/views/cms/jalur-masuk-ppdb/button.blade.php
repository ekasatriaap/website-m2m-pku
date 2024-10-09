@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.jalur_masuk_ppdb.edit', $id) .
                '" data-title="Edit Data Jalur Masuk PPDB"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => "<i class='fas fa-eye'></i>",
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.jalur_masuk_ppdb.show', $id) .
                '" data-title="Show Detail Jalur Masuk PPDB" btnDetail',
            'title' => 'Show',
            'color' => 'info',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.jalur_masuk_ppdb.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
