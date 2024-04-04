<div class="modal fade bd-example-modal-xl" id="optionGroupModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seçimlər </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">
                                    @lang('backend.labels.category')
                                </label>
                                <select id="category_id" class="form-control" v-model="form.category_id" @change="getOptionGroups">
                                    <option selected value="">Seçin</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ translation_first($category)->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="search">
                                    Axtarış
                                </label>
                                <input id="search" type="text" class="form-control" v-model="form.name" @input.lazy="getOptionGroups" placeholder="Kateqoriyanın adını daxil edin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" v-if="optionGroups.length > 0">
                            <table class="table table-bordered table-hover table-striped table-sm text-center">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Adı</th>
                                    <th scope="col">Kateqoriyası</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(group, index) in optionGroups" @key="group.id">
                                    <th>@{{ group?.id }}</th>
                                    <td>@{{ group?.name }}</td>
                                    <td>@{{ group?.category_name }}</td>
                                    <td>
                                        <a v-if="group.id !== selectedOptionGroup.id" href="javascript:void(0)" @click.preventDefault="addSelectedOption(group)" class="btn btn-success btn-sm">
                                            <i class="fa fa-plus"></i> Əlavə et
                                        </a>
                                        <a v-else href="javascript:void(0)" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Əlavə olundu</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div>
                                <a href="javascript:void(0)" @click.preventDefault="moreLoading" class="btn btn-warning">Daha çox</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


