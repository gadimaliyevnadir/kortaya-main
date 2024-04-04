<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormTypeRequest;
use App\Interfaces\DatatableInterface;
use App\Models\Type;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('types index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
            return $this->dataTable(Type::all());

        return view('backend.types.index');
    }

    public function create()
    {
        abort_if(Gate::denies('types create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.types.form', compact('edit'));
    }

    public function store(FormTypeRequest $request)
    {
        abort_if(Gate::denies('types create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $type = Type::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $type->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.types.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Type $type)
    {
        abort_if(Gate::denies('types show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        abort_if(Gate::denies('types edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.types.form', compact('type', 'edit'));
    }

    public function update(FormTypeRequest $request, Type $type)
    {
        abort_if(Gate::denies('types edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $type->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $type->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'locale' => $lang->code,
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.types.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function destroy(Type $type)
    {
        abort_if(Gate::denies('types delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $type->delete();
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
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('status', function ($row) {
                return badge($row->status);
            })
            ->addColumn('actions', function ($row) {
                return $this->permissions($row->id);
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('types show')) {
            $result .= "<a href='" . route('backend.types.show', ['type' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('types edit')) {
            $result .= "<a href='" . route('backend.types.edit', ['type' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('types delete')) {
            $result .= "<a href='" . route('backend.types.destroy', ['type' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
