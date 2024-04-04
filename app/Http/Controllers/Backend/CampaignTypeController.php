<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCampaignTypeRequest;
use App\Models\CampaignType;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CampaignTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campaign_types index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->ajax()) {
            return $this->dataTable(CampaignType::all());
        }

        return view('backend.campaign_types.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_types developer create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;

        return view('backend.campaign_types.form', compact('edit'));

    }

    public function store(FormCampaignTypeRequest $request)
    {
        abort_if(Gate::denies('campaign_types create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $campaign_type = CampaignType::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $campaign_type->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.campaign_types.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }
    }

    public function show(CampaignType $campaign_type)
    {
        abort_if(Gate::denies('campaign_types show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaign_types.show', compact('campaign_type'));
    }

    public function edit(CampaignType $campaign_type)
    {
        abort_if(Gate::denies('campaign_types developer edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;

        return view('backend.campaign_types.form', compact('edit', 'campaign_type'));
    }

    public function update(FormCampaignTypeRequest $request, CampaignType $campaign_type)
    {
        abort_if(Gate::denies('campaign_types edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $campaign_type->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $campaign_type->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.campaign_types.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(CampaignType $campaign_type)
    {
        abort_if(Gate::denies('campaign_types delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $campaign_type->delete();
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

        if (admin()->can('campaign_types show')) {
            $result .= "<a href='" . route('backend.campaign_types.show', ['campaign_type' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaign_types edit')) {
            $result .= "<a href='" . route('backend.campaign_types.edit', ['campaign_type' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaign_types delete')) {
            $result .= "<a href='" . route('backend.campaign_types.destroy', ['campaign_type' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
