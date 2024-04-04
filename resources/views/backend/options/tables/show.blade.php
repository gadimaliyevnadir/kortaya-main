<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $option->id }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.name')
                    </td>
                    <td class="table-center">{{ $option->transname }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.slug')
                    </td>
                    <td class="table-center">{{ $option->transslug }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.group')
                    </td>
                    <td class="table-center">{{ optional($option->optionGroup)->transname ?? '' }}</td>
                </tr>


                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.sort_order')</td>
                    <td class="table-center">{{ $option->order }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($option->status) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
