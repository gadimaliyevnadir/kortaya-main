<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FormCampaignBelongRequest;
use App\Models\CampaignBelong;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CampaignBelongController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campaign_belongs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (request()->ajax()) {
            return $this->dataTable(CampaignBelong::latest()->get());
        }

        return view('backend.campaign_belongs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_belongs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = false;

        $campaign_belongs = CampaignBelong::active()->get();

        return view('backend.campaign_belongs.form', compact('edit', 'campaign_belongs'));

    }

    public function store(FormCampaignBelongRequest $request)
    {
        abort_if(Gate::denies('campaign_belongs create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $campaign_belongs = CampaignBelong::create([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $campaign_belongs->translations()->create([
                    'locale' => $lang->code,
                    'name' => $data['name:' . $lang->code],
                ]);
            }
            DB::commit();
            return redirect(route('backend.campaign_belongs.index'))->withSuccess(trans('backend.messages.success.create'));
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.create'));
        }

    }

    public function show(CampaignBelong $campaign_belong)
    {
        abort_if(Gate::denies('campaign_belongs show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.campaign_belongs.show', compact('campaign_belong'));
    }

    public function edit(CampaignBelong $campaign_belong)
    {
        abort_if(Gate::denies('campaign_belongs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit = true;
        $campaign_belongs = CampaignBelong::active()->get();

        return view('backend.campaign_belongs.form', compact('edit', 'campaign_belong', 'campaign_belongs'));
    }

    public function update(FormCampaignBelongRequest $request, CampaignBelong $campaign_belong)
    {
        abort_if(Gate::denies('campaign_belongs edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $campaign_belong->update([
                'status' => $data['status'],
            ]);
            foreach (Cache::get('active_langs') as $lang) {
                $campaign_belong->translations()->updateOrcreate(
                    ['locale' => $lang->code],
                    [
                        'name' => $data['name:' . $lang->code],
                    ]
                );
            }
            DB::commit();
            return redirect(route('backend.campaign_belongs.index'))->withSuccess(trans('backend.messages.success.update'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('frontend')->error($e->getMessage());
            return redirect()->back()->withWarning(trans('backend.messages.error.update'));
        }
    }

    public function destroy(CampaignBelong $campaign_belong)
    {
        abort_if(Gate::denies('campaign_belongs delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $campaign_belong->delete();
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

        if (admin()->can('campaign_belongs show')) {
            $result .= "<a href='" . route('backend.campaign_belongs.show', ['campaign_belong' => $id]) . "'";
            $result .= " class='$class'><i class='la la-eye'></i></a>";
        }

        if (admin()->can('campaign_belongs edit')) {
            $result .= "<a href='" . route('backend.campaign_belongs.edit', ['campaign_belong' => $id]) . "'";
            $result .= " class='$class'><i class='la la-edit'></i></a>";
        }

        if (admin()->can('campaign_belongs delete')) {
            $result .= "<a href='" . route('backend.campaign_belongs.destroy', ['campaign_belong' => $id]) . "'";
            $result .= " class='$class btn-delete'><i class='la la-trash'></i></a>";
        }

        return $result;
    }
}
