<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormProductBadgeRequest;
use App\Models\Badge;
use App\Models\Type;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class BadgeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product-badges index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax())
            return $this->dataTable(Badge::get());

        return view('backend.badges.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product-badges create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = false;
        return view('backend.badges.form', compact('edit'));
    }

    public function store(FormProductBadgeRequest $request)
    {
        abort_if(Gate::denies('product-badges create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $badge = Badge::create([
                'status' => $data['status'],
                'border_color' => $data['border_color'],
                'bg_color' => $data['bg_color'],
                'text_color' => $data['text_color'],
                'icon' => $data['icon'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $badge->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                    'slug' => $data['slug:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.badges.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }

    }

    public function show(Badge $badge)
    {
        abort_if(Gate::denies('product-badges show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.badges.show', compact('badge'));
    }

    public function edit(Badge $badge)
    {
        abort_if(Gate::denies('product-badges edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit = true;
        return view('backend.badges.form', compact('edit', 'badge'));
    }

    public function update(FormProductBadgeRequest $request, Badge $badge)
    {
        abort_if(Gate::denies('product-badges edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validated();
        DB::beginTransaction();
        try {
            $badge->update([
                'status' => $data['status'],
                'border_color' => $data['border_color'],
                'bg_color' => $data['bg_color'],
                'text_color' => $data['text_color'],
                'icon' => $data['icon'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $badge->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'locale' => $lang->code,
                        'name' => $data['name:' . $lang->code],
                        'slug' => $data['slug:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.badges.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error'));
        }
    }

    public function destroy(Badge $badge)
    {
        abort_if(Gate::denies('product-badges delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $badge->delete();

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
                return translation_first($row)->name ?? '';
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
            ->rawColumns(['name', 'status', 'actions'])
            ->make(true);
    }

    public function permissions($id): string
    {
        $class = 'btn btn-sm btn-icon btn-clean';
        $result = '';

        if (admin()->can('product-badges show')) {
            $result .= "<a href='" . route('backend.badges.show', ['badge' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('product-badges edit')) {
            $result .= "<a href='" . route('backend.badges.edit', ['badge' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('product-badges delete')) {
            $result .= "<a href='" . route('backend.badges.destroy', ['badge' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
