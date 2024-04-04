<div class="card-body">
{{--    <ul class="list-unstyled d-flex justify-content-between">--}}
{{--        <li>--}}
{{--            <label for="name">Kateqoriya adı</label>--}}
{{--            <input type="text" id="name" class="form-control filter-input" name="name" value="">--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <label for="status">Aktivlik</label>--}}
{{--            <select id="status" class="form-control filter-select" name="status">--}}
{{--                <option value="" selected>Seçin</option>--}}
{{--                <option value="1">Aktiv</option>--}}
{{--                <option value="0">Passiv</option>--}}
{{--            </select>--}}
{{--        </li>--}}
{{--    </ul>--}}
    <table class="table table-separate table-head-custom table-checkable" id="datatable">
        <thead>
            <tr>
                <th>@lang('backend.labels.id')</th>
                <th>@lang('backend.labels.image')</th>
                <th>@lang('backend.labels.name')</th>
                <th>@lang('backend.labels.status')</th>
                <th>@lang('backend.labels.actions')</th>
            </tr>
        </thead>
    </table>
</div>
