<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRiskRequest;
use App\Http\Requests\StoreRiskRequest;
use App\Http\Requests\UpdateRiskRequest;
use App\Models\Risk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RiskController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('risk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Risk::query()->select(sprintf('%s.*', (new Risk())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'risk_show';
                $editGate = 'risk_edit';
                $deleteGate = 'risk_delete';
                $crudRoutePart = 'risks';

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
            $table->editColumn('risk_name', function ($row) {
                return $row->risk_name ? $row->risk_name : '';
            });
            $table->editColumn('risk_process', function ($row) {
                return $row->risk_process ? $row->risk_process : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('likelihood_baseline', function ($row) {
                return $row->likelihood_baseline ? $row->likelihood_baseline : '';
            });
            $table->editColumn('consequences_baseline', function ($row) {
                return $row->consequences_baseline ? $row->consequences_baseline : '';
            });
            $table->editColumn('iso', function ($row) {
                return $row->iso ? $row->iso : '';
            });
            $table->editColumn('existing_control', function ($row) {
                return $row->existing_control ? $row->existing_control : '';
            });
            $table->editColumn('effectiveness', function ($row) {
                return $row->effectiveness ? Risk::EFFECTIVENESS_RADIO[$row->effectiveness] : '';
            });
            $table->editColumn('risk_cause', function ($row) {
                return $row->risk_cause ? $row->risk_cause : '';
            });
            $table->editColumn('proactive_mitigation', function ($row) {
                return $row->proactive_mitigation ? $row->proactive_mitigation : '';
            });
            $table->editColumn('likelihood_target', function ($row) {
                return $row->likelihood_target ? $row->likelihood_target : '';
            });
            $table->editColumn('consequences_target', function ($row) {
                return $row->consequences_target ? $row->consequences_target : '';
            });
            $table->editColumn('impact', function ($row) {
                return $row->impact ? $row->impact : '';
            });
            $table->editColumn('reactive_mitigation', function ($row) {
                return $row->reactive_mitigation ? $row->reactive_mitigation : '';
            });
            $table->editColumn('time_schedule', function ($row) {
                return $row->time_schedule ? $row->time_schedule : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Risk::TYPE_RADIO[$row->type] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.risks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('risk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.risks.create');
    }

    public function store(StoreRiskRequest $request)
    {
        $risk = Risk::create($request->all());

        return redirect()->route('admin.risks.index');
    }

    public function edit(Risk $risk)
    {
        abort_if(Gate::denies('risk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.risks.edit', compact('risk'));
    }

    public function update(UpdateRiskRequest $request, Risk $risk)
    {
        $risk->update($request->all());

        return redirect()->route('admin.risks.index');
    }

    public function show(Risk $risk)
    {
        abort_if(Gate::denies('risk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.risks.show', compact('risk'));
    }

    public function destroy(Risk $risk)
    {
        abort_if(Gate::denies('risk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $risk->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiskRequest $request)
    {
        Risk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
