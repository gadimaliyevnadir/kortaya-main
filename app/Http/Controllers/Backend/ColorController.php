<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormColorRequest;
use App\Models\Color;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ColorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('colors index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(Color::get());
        }

        return view('backend.colors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('colors create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.colors.form', compact('edit'));
    }

    public function store(FormColorRequest $request)
    {
        abort_if(Gate::denies('colors create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $color = Color::create([
                'status' => $data['status'],
                'color_code' => $data['color_code'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $color->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.colors.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(Color $color)
    {
        abort_if(Gate::denies('colors show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.colors.show', compact('color'));
    }

    public function edit(Color $color)
    {
        abort_if(Gate::denies('colors edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        return view('backend.colors.form', compact('color', 'edit'));
    }

    public function update(FormColorRequest $request, Color $color)
    {
        abort_if(Gate::denies('colors edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $color->update([
                'status' => $data['status'],
                'color_code' => $data['color_code'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $color->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'locale' => $lang->code,
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.colors.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function destroy(Color $color)
    {
        abort_if(Gate::denies('colors delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $color->delete();
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
            ->addColumn('color_code', function ($row) {
                return $row->color_code;
            })
            ->addColumn('color_view', function ($row) {
                return '<span class="badge" style="border: 1px solid #000; background-color:' . $row->color_code . '; width:10%;"> </span>';
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
            ->rawColumns(['color_view', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('colors show')) {
            $result .= "<a href='" . route('backend.colors.show', ['color' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('colors edit')) {
            $result .= "<a href='" . route('backend.colors.edit', ['color' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('colors delete')) {
            $result .= "<a href='" . route('backend.colors.destroy', ['color' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
