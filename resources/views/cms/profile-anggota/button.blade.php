@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.profile_anggota.edit', $id) .
                '" data-title="Edit Data Profile Anggota"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => "<i class='fas fa-eye'></i>",
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.profile_anggota.show', $id) .
                '" data-title="Show Detail Profile Anggota" btnDetail',
            'title' => 'Show',
            'color' => 'info',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.profile_anggota.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
