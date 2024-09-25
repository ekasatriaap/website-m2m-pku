@php
    $listUrl = [
        [
            'label' => '<i class="fas fa-edit"></i>',
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.slider.edit', $id) .
                '" data-title="Edit Data Slider"',
            'title' => 'Edit',
            'color' => 'warning',
        ],
        [
            'label' => "<i class='fas fa-eye'></i>",
            'attr' =>
                'onclick="actionModalData(this)" data-url="' .
                route('cms.slider.show', $id) .
                '" data-title="Show Detail Slider" btnDetail',
            'title' => 'Show',
            'color' => 'info',
        ],
        [
            'label' => '<i class="fas fa-trash"></i>',
            'attr' => "onclick=\"deleteDataDataTable('" . route('cms.slider.destroy', $id) . "') \"",
            'title' => 'Delete',
            'color' => 'danger',
        ],
    ];
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
