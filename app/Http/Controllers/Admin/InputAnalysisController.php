<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInputAnalysiRequest;
use App\Http\Requests\StoreInputAnalysiRequest;
use App\Http\Requests\UpdateInputAnalysiRequest;
use App\Models\AnalysisProcess;
use App\Models\InputAnalysi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InputAnalysisController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('input_analysi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InputAnalysi::with(['analysis_process'])->select(sprintf('%s.*', (new InputAnalysi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'input_analysi_show';
                $editGate = 'input_analysi_edit';
                $deleteGate = 'input_analysi_delete';
                $crudRoutePart = 'input-analysis';

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
            $table->editColumn('input', function ($row) {
                return $row->input ? $row->input : '';
            });
            $table->addColumn('analysis_process_date', function ($row) {
                return $row->analysis_process ? $row->analysis_process->date : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'analysis_process']);

            return $table->make(true);
        }

        return view('admin.inputAnalysis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('input_analysi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysis_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inputAnalysis.create', compact('analysis_processes'));
    }

    public function store(StoreInputAnalysiRequest $request)
    {
        $inputAnalysi = InputAnalysi::create($request->all());

        return redirect()->route('admin.input-analysis.index');
    }

    public function edit(InputAnalysi $inputAnalysi)
    {
        abort_if(Gate::denies('input_analysi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $analysis_processes = AnalysisProcess::pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inputAnalysi->load('analysis_process');

        return view('admin.inputAnalysis.edit', compact('analysis_processes', 'inputAnalysi'));
    }

    public function update(UpdateInputAnalysiRequest $request, InputAnalysi $inputAnalysi)
    {
        $inputAnalysi->update($request->all());

        return redirect()->route('admin.input-analysis.index');
    }

    public function show(InputAnalysi $inputAnalysi)
    {
        abort_if(Gate::denies('input_analysi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAnalysi->load('analysis_process');

        return view('admin.inputAnalysis.show', compact('inputAnalysi'));
    }

    public function destroy(InputAnalysi $inputAnalysi)
    {
        abort_if(Gate::denies('input_analysi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputAnalysi->delete();

        return back();
    }

    public function massDestroy(MassDestroyInputAnalysiRequest $request)
    {
        InputAnalysi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
