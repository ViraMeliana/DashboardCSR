<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutputAnalysiRequest;
use App\Http\Requests\StoreOutputAnalysiRequest;
use App\Http\Requests\UpdateOutputAnalysiRequest;
use App\Models\AnalysisProcess;
use App\Models\OutputAnalysi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OutputAnalysisController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('output_analysi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OutputAnalysi::with(['analysis_process'])->select(sprintf('%s.*', (new OutputAnalysi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'output_analysi_show';
                $editGate = 'output_analysi_edit';
                $deleteGate = 'output_analysi_delete';
                $crudRoutePart = 'output-analysis';

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
            $table->editColumn('output', function ($row) {
                return $row->output ? $row->output : '';
            });
            $table->addColumn('analysis_process_date', function ($row) {
                return $row->analysis_process ? $row->analysis_process->date : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'analysis_process']);

            return $table->make(true);
        }

        return view('admin.outputAnalysis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('output_analysi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysis_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.outputAnalysis.create', compact('analysis_processes'));
    }

    public function store(StoreOutputAnalysiRequest $request)
    {
        $outputAnalysi = OutputAnalysi::create($request->all());

        return redirect()->route('admin.output-analysis.index');
    }

    public function edit(OutputAnalysi $outputAnalysi)
    {
        abort_if(Gate::denies('output_analysi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysis_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $outputAnalysi->load('analysis_process');

        return view('admin.outputAnalysis.edit', compact('analysis_processes', 'outputAnalysi'));
    }

    public function update(UpdateOutputAnalysiRequest $request, OutputAnalysi $outputAnalysi)
    {
        $outputAnalysi->update($request->all());

        return redirect()->route('admin.output-analysis.index');
    }

    public function show(OutputAnalysi $outputAnalysi)
    {
        abort_if(Gate::denies('output_analysi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputAnalysi->load('analysis_process');

        return view('admin.outputAnalysis.show', compact('outputAnalysi'));
    }

    public function destroy(OutputAnalysi $outputAnalysi)
    {
        abort_if(Gate::denies('output_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outputAnalysi->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutputAnalysiRequest $request)
    {
        OutputAnalysi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
