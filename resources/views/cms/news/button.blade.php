@php
    $id = encode($data->id);
    $listUrl = [];
    $edit = [
        'label' => '<i class="fas fa-edit"></i>',
        'title' => 'Edit',
        'color' => 'warning',
        'url' => route('cms.news.edit', $id),
    ];
    $view = [
        'label' => '<i class="fas fa-eye"></i>',
        'title' => 'Show',
        'color' => 'info',
        'attr' =>
            'onclick="actionModalData(this)" data-url="' .
            route('cms.news.show', $id) .
            '" data-title="Show Detail News" btnDetail',
    ];
    $delete = [
        'label' => '<i class="fas fa-trash"></i>',
        'title' => 'Delete',
        'color' => 'danger',
        'attr' => "onclick=\"deleteDataDataTable('" . route('cms.news.destroy', $id) . "') \"",
    ];

    if (!accountIsAdmin()) {
        $listUrl[] = $edit;
        $listUrl[] = $view;
        $listUrl[] = $delete;
    }

    if (accountIsAdmin()) {
        if ($data->status != NEWS_STATUS_PUBLISH) {
            $listUrl[] = $edit;
        }
        $listUrl[] = $view;
        if ($data->status != NEWS_STATUS_PUBLISH) {
            $listUrl[] = $delete;
        }
    }
@endphp

<x-button-group title="Aksi" :listUrl="$listUrl" />
