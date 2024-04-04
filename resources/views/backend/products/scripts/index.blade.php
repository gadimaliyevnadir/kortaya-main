<script>
    let table = $('#datatable').DataTable(
    {
        oLanguage:
        {
            sProcessing: '{{ trans("backend.datatables.loading") }}',
            sSearch:     '{{ trans("backend.datatables.search") }}'
        },
        ajax:
        {
            url:  '{{ route("backend.products.index") }}',
            data: function (d) {
                d.search = $('input[name=name]').val();
                d.category = $('select[name=category_id]').val();
                d.brand = $('select[name=brand_id]').val();
                d.product_status = $('select[name=product_status_id]').val();
            },
            type: 'GET'
        },
        serverSide: true,
        processing: true,
        searching: false,

        aaSorting : [[0, false]],
        columns:
        [
            {data: 'id',             name: 'id'},
            {data: 'image',          name: 'image'},
            {data: 'name',           name: 'name'},
            {data: 'category_name',           name: 'category_name'},
            {data: 'brand_name',           name: 'brand_name'},
            {data: 'product_status', name: 'product_status'},
            {data: 'status',         name: 'status'},
            {data: 'actions',        name: 'actions'}
        ],
        columnDefs:
        [
            {
                'orderable': false
            }
        ],
        language:
        {
            'emptyTable': '{{ trans("backend.datatables.empty") }}'
        }
    });

    $('.filter-input').keypress(function () {
        table.search($(this).val())
            .draw();
    });


    $('.filter-select').on('change',function(){
        table.search($(this).val())
        .draw();
    });

    $(document).ready(function() {
        let select2 = $('.select2');

        select2.select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: 5,
            placeholder: 'Axtardığınız'
        });

    });

    $(document).on('click', '.btn-delete', function(e)
    {
        e.preventDefault();

        {!! confirm() !!}.then((result) =>
        {
            if (result.isConfirmed)
            {
                var url  = $(this).prop('href');
                var type = 'POST';
                var data = {_method: 'DELETE', _token: '{{ csrf_token() }}'};

                $.ajax(
                {
                    url:  url,
                    type: type,
                    data: data,
                    success: function (result)
                    {
                        if (result.status == 1)
                        {
                            {!! notify('success', trans('backend.messages.success.delete')) !!}
                            table.row($(this).parents('tr')).remove().draw();
                        }

                        else
                        {
                            {!! notify('error', trans('backend.messages.error.delete')) !!}
                        }
                    }
                });
            }
        });
    });
</script>
