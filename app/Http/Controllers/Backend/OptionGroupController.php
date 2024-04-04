<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormOptionGroupRequest;
use App\Models\Category;
use App\Models\OptionGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OptionGroupController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('option-groups index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option_categories = Category::active()->get();

        if (request()->ajax()) {
            $data = OptionGroup::with('category');

            if (!is_null($request['name'])) {
                $data = $data->whereTranslationLike('name', '%' . $request['name'] . '%');
            }

            if (!is_null($request['category_id'])) {
                $data = $data->where('category_id', $request['category_id']);
            }

            $limit = request('length');
            $start = request('start');

            $data = $data->latest()->offset($start)->limit($limit)->get();
            $total_filtered = OptionGroup::count();

            return $this->dataTable($data, $total_filtered);
        }

        return view('backend.option_groups.index', compact('option_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('option-groups create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $edit = false;
        return view('backend.option_groups.form', compact('categories', 'edit'));
    }

    public function store(FormOptionGroupRequest $request)
    {
        abort_if(Gate::denies('brands create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $option_group = OptionGroup::create([
                'status' => $data['status'],
                'is_filtered' => $data['is_filtered'],
                'category_id' => $data['category_id'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $option_group->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.option-groups.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.option_groups.show', compact('option_group'));
    }

    public function edit(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::active()->get();
        $edit = true;
        return view('backend.option_groups.form', compact('option_group', 'categories', 'edit'));
    }

    public function update(FormOptionGroupRequest $request, OptionGroup $option_group)
    {
        abort_if(Gate::denies('option_groups edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $option_group->update([
                'status' => $data['status'],
                'is_filtered' => $data['is_filtered'],
                'category_id' => $data['category_id'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $option_group->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'locale' => $lang->code,
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                    ]
                );
            }

            DB::commit();
            return redirect(route('backend.option-groups.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(OptionGroup $option_group)
    {
        abort_if(Gate::denies('option-groups delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $option_group->delete();

            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }

    public function dataTable($data, $total_filtered)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function ($row) {
                return translation_first($row)->name ?? '';
            })
            ->addColumn('category', function ($row) {
                return translation_first($row->category)->name ?? '';
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['status', 'actions'])
            ->skipPaging()
            ->setTotalRecords($total_filtered)
            ->setFilteredRecords($total_filtered)
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('option-groups show')) {
            $result .= "<a href='" . route('backend.option-groups.show', ['option_group' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('option-groups edit')) {
            $result .= "<a href='" . route('backend.option-groups.edit', ['option_group' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('option-groups delete')) {
            $result .= "<a href='" . route('backend.option-groups.destroy', ['option_group' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
