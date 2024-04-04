<div class="card-body">
{{--    <ul class="list-unstyled d-flex justify-content-between">--}}
{{--        <li>--}}
{{--            <label for="name">Seçim qrupu adı</label>--}}
{{--            <input type="text" id="name" class="form-control filter-input" name="name" value="">--}}
{{--        </li>--}}
{{--    </ul>--}}

    <table class="table table-separate table-head-custom table-checkable" id="datatable">
        <thead>
            <tr>
                <th>@lang('backend.labels.id')</th>
                <th>@lang('backend.labels.name')</th>
                <th>@lang('backend.labels.group')</th>
                <th>@lang('backend.labels.category')</th>
                <th>@lang('backend.labels.status')</th>
                <th>@lang('backend.labels.actions')</th>
            </tr>
        </thead>
    </table>
</div>
