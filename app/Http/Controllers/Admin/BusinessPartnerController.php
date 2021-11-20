<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBusinessPartnerRequest;
use App\Http\Requests\StoreBusinessPartnerRequest;
use App\Http\Requests\UpdateBusinessPartnerRequest;
use App\Models\BusinessPartner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BusinessPartnerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('business_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BusinessPartner::query()->select(sprintf('%s.*', (new BusinessPartner())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'business_partner_show';
                $editGate = 'business_partner_edit';
                $deleteGate = 'business_partner_delete';
                $crudRoutePart = 'business-partners';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.businessPartners.index');
    }

    public function create()
    {
        abort_if(Gate::denies('business_partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.businessPartners.create');
    }

    public function store(StoreBusinessPartnerRequest $request)
    {
        $businessPartner = BusinessPartner::create($request->all());

        return redirect()->route('admin.business-partners.index');
    }

    public function edit(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.businessPartners.edit', compact('businessPartner'));
    }

    public function update(UpdateBusinessPartnerRequest $request, BusinessPartner $businessPartner)
    {
        $businessPartner->update($request->all());

        return redirect()->route('admin.business-partners.index');
    }

    public function show(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.businessPartners.show', compact('businessPartner'));
    }

    public function destroy(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBusinessPartnerRequest $request)
    {
        BusinessPartner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
