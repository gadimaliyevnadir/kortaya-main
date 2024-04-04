@extends('layouts.backend.master')
@section('title', trans('backend.titles.options'))
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid" id="optionGroupApp">
            <div class="container">
                <div class="card card-custom example example-compact">
                    @include('backend.includes.form.header', ['page' => 'options'])
                    <form action="{{ $edit === false ? route('backend.options.store') : route('backend.options.update', ['option' => $option->id]) }}" method="POST">
                        @csrf
                        @if($edit)
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12"></label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <ul class="nav nav-light-primary nav-pills" role="tablist">
                                        @foreach ($langs as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif"
                                                   id="tab-{{ $lang->code }}" data-toggle="tab"
                                                   href="#{{ $lang->code }}">
                                                    <span class="nav-text">{{ $lang->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane fade @if($loop->first) active show @endif"
                                         id="{{ $lang->code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->code }}">
                                        <div class="form-group row">
                                            <label for="name:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.name') ({{ strtoupper($lang->code) }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="name:{{ $lang->code }}" type="text" class="form-control @if($errors->has("name:$lang->code")) is-invalid @endif"  name="name:{{ $lang->code }}" value="{{ isset($option) ? $option->translate($lang->code)?->name : old('name:'.$lang->code) }}" placeholder="@lang('backend.placeholders.enter.name')">
                                                    @if ($errors->has("name:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("name:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="slug:{{ $lang->code }}" class="col-form-label text-right col-lg-3 col-sm-12">
                                                @lang('backend.labels.slug') ({{ strtoupper($lang->code) }})
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input id="slug:{{ $lang->code }}" type="text"
                                                           class="form-control @if($errors->has("slug:$lang->code")) is-invalid @endif"
                                                           name="slug:{{ $lang->code }}"
                                                           value="{{ isset($option) ? $option->translate($lang->code)?->slug : old('slug:'.$lang->code) }}"
                                                           placeholder="@lang('backend.placeholders.enter.slug')">
                                                    @if ($errors->has("slug:$lang->code"))
                                                        <div class="invalid-feedback">{{ $errors->first("slug:$lang->code") }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 mx-auto">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#optionGroupModal">
                                        <i class="fa fa-plus"></i> Seçim seç </button>
                                </div>
                            </div>

                            <div class="form-group row"  v-if="selectedOptionGroup?.id !== undefined ">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    Seçim qrupu
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <table class="table table-bordered table-hover tbale-striped table-sm text-center">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Adı</th>
                                                <th scope="col">Kateqoriyası</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>@{{ selectedOptionGroup?.id }}</th>
                                                <td>@{{ selectedOptionGroup?.name }}</td>
                                                <td>@{{ selectedOptionGroup?.category_name }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" @click.preventDefault="removeSelectedOption()"
                                                       class="btn btn-danger btn-sm">Sil <i class="fa fa-trash"></i></a>
                                                </td>
                                                <input type="hidden" name="option_group_id" :value="selectedOptionGroup.id">
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">
                                    @lang('backend.labels.status')
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <div class="input-group">
                                         <span class="switch switch-md switch-icon">
                                             <label>
                                                 <input type="checkbox" class="bool" name="status" value="{{ isset($option) ? $option->status : old('status') }}"  {{ (isset($option) ? old('status',$option->status) : old('status',1) ) == 1 ? 'checked' : '' }}>
                                                 <span></span>
                                             </label>
                                         </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('backend.includes.form.footer')
                    </form>
                    @include('backend.options.modal.optionGroups')

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/backend/js/vue-3.js') }}"></script>
    <script>
        Vue.createApp({
            data() {
                return {
                    form: {
                        name: '',
                        category_id: "",
                    },
                    optionGroups: [],
                    lastID: 0,
                    selectedOptionGroup: {...JSON.parse('{!!  json_encode($group ?? '')  !!}')}
                }
            },
            methods: {
                getOptionGroups() {
                    fetch('{{ route('backend.options.getOptionGroups') }}?category_id=' + this.form.category_id + '&name=' + this.form.name)
                        .then(response => response.json())
                        .then(data => {
                            this.optionGroups = [];
                            this.optionGroups.push(...data.data);
                            this.lastID = data.lastID;
                        })
                        .catch(err => console.error(err));
                },

                moreLoading() {
                    if (this.lastID !== 0) {
                        fetch('{{ route('backend.options.getOptionGroups') }}?category_id=' + this.form.category_id + '&name=' + this.form.name + '&lastID=' + this.lastID)
                            .then(response => response.json())
                            .then(data => {
                                this.lastID = data.lastID;
                                this.optionGroups.push(...data.data);
                            })
                            .catch(err => console.error(err));
                    }
                },

                addSelectedOption(group) {
                    this.selectedOptionGroup = {...group};
                },
                removeSelectedOption() {
                    this.selectedOptionGroup = {};
                },
            }
        }).mount('#optionGroupApp')
    </script>
@endsection


