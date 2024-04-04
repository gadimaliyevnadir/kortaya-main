<div class="card-body">
    <table class="table table-responsive table-separate table-head-custom table-checkable" id="datatable">
        <thead>
        <tr>
            <td colspan="1">
            </td>
            <td colspan="2">
                <label for="name">@lang('backend.labels.name')</label>
                <input type="text" id="name" class="form-control filter-input" name="name" value="">
            </td>
            <td colspan="2">
                <label for="category_id">@lang('backend.labels.category')</label>
                <select id="category_id" class="form-control filter-select" name="category_id">
                    <option value="">Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ translation_first($category)->name }}</option>
                    @endforeach
                </select>
            </td>
            <td colspan="2">
                <label for="brand_id">@lang('backend.labels.brand')</label>
                <select id="brand_id"  class="form-control filter-select" name="brand_id">
                    <option value="">Seçin</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </td>
            <td colspan="2">
                <label for="product_status_id">Məhsul statusu</label>
                <select id="product_status_id" class="form-control filter-select" name="product_status_id">
                    <option value="">Seçin</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ translation_first($status)->name }}</option>
                    @endforeach
                </select>
            </td>
{{--            <td colspan="2">--}}
{{--                <label for="status">Aktivlik</label>--}}
{{--                <select id="status" class="form-control filter-select" name="status">--}}
{{--                    <option value="" selected>Seçin</option>--}}
{{--                    <option value="1">Aktiv</option>--}}
{{--                    <option value="0">Passiv</option>--}}
{{--                </select>--}}
{{--            </td>--}}
        </tr>

        <tr>
            <th>@lang('backend.labels.id')</th>
            <th>@lang('backend.labels.image')</th>
            <th>@lang('backend.labels.name')</th>
            <th>@lang('backend.labels.category')</th>
            <th>@lang('backend.labels.brand')</th>
            <th>@lang('backend.labels.product_status')</th>
            <th>@lang('backend.labels.status')</th>
            <th>@lang('backend.labels.actions')</th>
        </tr>
        </thead>
    </table>
</div>
