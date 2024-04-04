<div class="card-body">
    <div class="table-responsive">
        <table class="table table-light table-light-success">
            <tbody>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.id')</td>
                    <td class="table-center">{{ $option_group->id }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.name')
                    </td>
                    <td class="table-center">{{translation_first($option_group)->name }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.slug')
                    </td>
                    <td class="table-center">{{ translation_first($option_group)->slug }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">
                        @lang('backend.labels.category')
                    </td>
                    <td class="table-center">{{ translation_first($option_group->category)->name }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">Filterdə görsənir mi?</td>
                    <td class="table-center">{{ $option_group->is_filtered == '1' ? 'Hə' : 'Yox' }}</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="table-row-title w-25">@lang('backend.labels.status')</td>
                    <td class="table-center">{!! badge($option_group->status) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
