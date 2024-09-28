@php
    $listUrl = [];
    $edit = [
        'label' => '<i class="fas fa-edit"></i>',
        'title' => 'Edit',
        'color' => 'warning',
        'url' => route('cms.pages.edit', $id),
    ];
    $view = [
        'label' => '<i class="fas fa-eye"></i>',
        'title' => 'Show',
        'color' => 'info',
        'attr' =>
            'onclick="actionModalData(this)" data-url="' .
            route('cms.pages.show', $id) .
            '" data-title="Show Detail Pages" btnDetail',
    ];
    $delete = [
        'label' => '<i class="fas fa-trash"></i>',
        'title' => 'Delete',
        'color' => 'danger',
        'attr' => "onclick=\"deleteDataDataTable('" . route('cms.pages.destroy', $id) . "') \"",
    ];

    $listUrl[] = $edit;
    $listUrl[] = $view;
    $listUrl[] = $delete;

@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
