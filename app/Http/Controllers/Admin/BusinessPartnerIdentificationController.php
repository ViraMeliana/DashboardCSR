<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBusinessPartnerIdentificationRequest;
use App\Http\Requests\StoreBusinessPartnerIdentificationRequest;
use App\Http\Requests\UpdateBusinessPartnerIdentificationRequest;
use App\Models\BusinessPartner;
use App\Models\BusinessPartnerDocument;
use App\Models\BusinessPartnerIdentification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BusinessPartnerIdentificationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('business_partner_identification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BusinessPartnerIdentification::with(['business_partner','business_document'])->select(sprintf('%s.*', (new BusinessPartnerIdentification())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'business_partner_identification_show';
                $editGate = 'business_partner_identification_edit';
                $deleteGate = 'business_partner_identification_delete';
                $crudRoutePart = 'business-partner-identifications';

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
            $table->editColumn('risk_level', function ($row) {
                return $row->risk_level ? BusinessPartnerIdentification::RISK_LEVEL_SELECT[$row->risk_level] : '';
            });
            $table->addColumn('business_partner_name', function ($row) {
                return $row->business_partner ? $row->business_partner->name : '';
            });

            $table->editColumn('business_partner_name', function ($row) {
                return $row->business_partner_name ? $row->business_partner_name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('activity', function ($row) {
                return $row->activity ? $row->activity : '';
            });
            $table->editColumn('smap_implementation', function ($row) {
                return $row->smap_implementation ? $row->smap_implementation : '';
            });
            $table->editColumn('self_smap_control', function ($row) {
                return $row->self_smap_control ? BusinessPartnerIdentification::SELF_SMAP_CONTROL_RADIO[$row->self_smap_control] : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('document_number', function ($row) {
                return $row->business_document ? $row->business_document->document_number : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'business_partner']);

            return $table->make(true);
        }

        return view('admin.businessPartnerIdentifications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('business_partner_identification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business_partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $business_documents = BusinessPartnerDocument::where('type','=','business-partner')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.businessPartnerIdentifications.create', compact('business_partners','business_documents'));
    }

    public function store(StoreBusinessPartnerIdentificationRequest $request)
    {
        $businessPartnerIdentification = BusinessPartnerIdentification::create($request->all());

        return redirect()->route('admin.business-partner-identifications.index');
    }

    public function edit(BusinessPartnerIdentification $businessPartnerIdentification)
    {
        abort_if(Gate::denies('business_partner_identification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business_partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $business_documents = BusinessPartnerDocument::where('type','=','business-partner')->pluck('document_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $businessPartnerIdentification->load('business_partner','business_document');

        return view('admin.businessPartnerIdentifications.edit', compact('business_partners', 'businessPartnerIdentification','business_documents'));
    }

    public function update(UpdateBusinessPartnerIdentificationRequest $request, BusinessPartnerIdentification $businessPartnerIdentification)
    {
        $businessPartnerIdentification->update($request->all());

        return redirect()->route('admin.business-partner-identifications.index');
    }

    public function show(BusinessPartnerIdentification $businessPartnerIdentification)
    {
        abort_if(Gate::denies('business_partner_identification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartnerIdentification->load('business_partner','business_document');

        return view('admin.businessPartnerIdentifications.show', compact('businessPartnerIdentification'));
    }

    public function destroy(BusinessPartnerIdentification $businessPartnerIdentification)
    {
        abort_if(Gate::denies('business_partner_identification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartnerIdentification->delete();

        return back();
    }

    public function massDestroy(MassDestroyBusinessPartnerIdentificationRequest $request)
    {
        BusinessPartnerIdentification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
