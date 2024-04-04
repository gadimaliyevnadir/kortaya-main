<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormColorRequest;
use App\Http\Requests\Backend\FormSizeRequest;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sizes index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Size::get());
        }

        return view('backend.sizes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sizes create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.sizes.form', compact('edit'));
    }

    public function store(FormSizeRequest $request)
    {
        abort_if(Gate::denies('sizes create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $color = Size::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $color->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.sizes.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Size $size)
    {
        abort_if(Gate::denies('sizes show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.sizes.show', compact('size'));
    }

    public function edit(Size $size)
    {
        abort_if(Gate::denies('sizes edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.sizes.form', compact('size', 'edit'));
    }

    public function update(FormSizeRequest $request, Size $size)
    {
        abort_if(Gate::denies('sizes edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $size->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $size->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'locale' => $lang->code,
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.sizes.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function destroy(Size $size)
    {
        abort_if(Gate::denies('sizes delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $size->delete();
            return response(['status' => 1]);
        } catch (\Exception $e) {
            Log::channel('backend')->error($e->getMessage());
            return response(['status' => 0]);
        }
    }


    public function dataTable($data)
    {
        return datatables()
            ->of($data)
            ->addColumn('name', function ($row) {
                return translation_first($row)->name;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns([ 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('sizes show')) {
            $result .= "<a href='" . route('backend.sizes.show', ['size' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('sizes edit')) {
            $result .= "<a href='" . route('backend.sizes.edit', ['size' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('sizes delete')) {
            $result .= "<a href='" . route('backend.sizes.destroy', ['size' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
