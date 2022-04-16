<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BriberyRiskAssesment;
use App\Models\BusinessPartner;
use App\Models\DocumentManagement;
use App\Models\BusinessPartnerIdentification;
use App\Models\RiskMitigationMonitoring;
use PDF;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DocumentManagementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('business_partner_identification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DocumentManagement::query()->select(sprintf('%s.*', (new DocumentManagement())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = '';
                $editGate = 'business_partner_identification_edit';
                $deleteGate = 'business_partner_identification_delete';
                $crudRoutePart = 'business-partner-documents';
                $downloadGate = 'business_partner_identification_access';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'downloadGate',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('document_number', function ($row) {
                return $row->document_number ? $row->document_number : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.documentManagements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('business_partner_identification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentManagements.create');
    }

    public function store(Request $request)
    {
        $businessPartnerDocument = DocumentManagement::create($request->all());

        return redirect()->route('admin.business-partner-documents.index');
    }

    public function edit(DocumentManagement $businessPartnerDocument)
    {
        abort_if(Gate::denies('business_partner_identification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentManagements.edit', compact('businessPartnerDocument'));
    }

    public function update(Request $request, DocumentManagement $businessPartnerDocument)
    {
        $businessPartnerDocument->update($request->all());

        return redirect()->route('admin.business-partner-documents.index');
    }

    public function destroy(DocumentManagement $businessPartnerDocument)
    {
        abort_if(Gate::denies('business_partner_identification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartnerDocument->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        DocumentManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function report($id, $type){
        $business_document = DocumentManagement::all()->where('id',$id)->first();

        if ($type == 'business-partner') {
            $business_identification = BusinessPartnerIdentification::with(['business_partner','business_document'])->where('document_id',$id)->get();
            $business_partner = BusinessPartner::all();
            $pdf = PDF::loadview('reports.smap.business-partner-identification', ['business_partner'=>$business_partner,'business_identification'=>$business_identification, 'business_document'=>$business_document])->setPaper('a2', 'landscape');;
            $download = 'business-partner-identification-report.pdf';
        } else if ($type == 'bribery-risk') {
            $bribery_risk = BriberyRiskAssesment::with(['atp_process', 'personal_identification', 'business_document'])->where('document_id',$id)->get();
            $pdf = PDF::loadview('reports.smap.bra-csr',['bribery_risk'=>$bribery_risk,'business_document'=>$business_document])->setPaper('a1', 'landscape');;
            $download = 'bribery-risk-assesment-report.pdf';
        } else if ($type == 'rm3p'){
            $risk_mitigation = RiskMitigationMonitoring::with(['responsible','business_document'])->where('document_id',$id)->get();
            $pdf = PDF::loadview('reports.smap.rm3p',['risk_mitigation'=>$risk_mitigation,'business_document'=>$business_document])->setPaper('a1', 'landscape');
            $download = 'risk-mitigation-report.pdf';
        }
        return $pdf->download($download);
    }
}
