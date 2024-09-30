<x-app-layout :title="$title">
    <x-row>
        <div class="col-md-12">
            <x-card :title="$title">
                @slot('toolbar')
                    <button type="button" class="btn btn-sm btn-primary" data-title="Tambah Menu"
                        data-url="{{ route('cms.menu.create') }}" onclick="actionModalData(this)">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                @endslot

                <div class="col-md-6 mx-auto">
                    <div id="menu-list" class="dd">
                        <ol class="dd-list">
                            @if ($menu->isEmpty())
                                <li class="dd-item">
                                    <div class="dd-handle">Tidak Ada Menu</div>
                                </li>
                            @else
                                @foreach ($menu as $item)
                                    @include('cms.menu._menu_item', ['item' => $item])
                                @endforeach
                            @endif
                        </ol>
                        <div class="text-right mt-3">
                            <button type="button" id="save-order" class="btn btn-success">Simpan Urutan</button>
                        </div>
                    </div>
                </div>

            </x-card>
        </div>
    </x-row>

    @push('add-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
        <style>
            .dd-handle {
                height: auto;
                min-height: 40px;
                padding: 8px 10px;
            }

            .dd-empty,
            .dd-placeholder {
                min-height: 40px;
                background: #f2fbff;
                border: 1px dashed #b6bcbf;
            }

            .dd-item {
                position: relative;
            }

            .dd-actions {
                position: absolute;
                top: 5px;
                right: 5px;
                z-index: 1;
            }

            .dd-actions button {
                margin-left: 5px;
            }
        </style>
    @endpush

    @push('add-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.dd').nestable({
                    maxDepth: 3,
                    expandBtnHTML: '<button class="dd-expand" data-action="expand" type="button">Expand</button>',
                    collapseBtnHTML: '<button class="dd-collapse" data-action="collapse" type="button">Collapse</button>'
                });

                $('#save-order').click(function() {
                    let data = $('.dd').nestable('serialize');
                    $.ajax({
                        url: `{{ route('cms.menu.updateOrder') }}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            order: JSON.stringify(data)
                        },
                        success: function(response) {
                            if (response.success) {
                                alertSweet(response.message, 'success');
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            } else {
                                alertSweet(response.message, "warning");
                            }
                        },
                        error: function(xhr) {
                            alertSweet('Terjadi kesalahan: ' + xhr.responseText, 'error');
                        }
                    });
                });

                $(document).on('click', '.delete-menu', function(e) {
                    e.stopPropagation();
                    let url = $(this).data('url');
                    deleteDataReloadPage(url);
                });
            });
        </script>
    @endpush

</x-app-layout>
