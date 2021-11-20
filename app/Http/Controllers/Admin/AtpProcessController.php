<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAtpProcessRequest;
use App\Http\Requests\StoreAtpProcessRequest;
use App\Http\Requests\UpdateAtpProcessRequest;
use App\Models\AtpProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AtpProcessController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('atp_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AtpProcess::query()->select(sprintf('%s.*', (new AtpProcess())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'atp_process_show';
                $editGate = 'atp_process_edit';
                $deleteGate = 'atp_process_delete';
                $crudRoutePart = 'atp-processes';

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
            $table->editColumn('activity', function ($row) {
                return $row->activity ? $row->activity : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('transaction', function ($row) {
                return $row->transaction ? $row->transaction : '';
            });
            $table->editColumn('project', function ($row) {
                return $row->project ? $row->project : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.atpProcesses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('atp_process_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atpProcesses.create');
    }

    public function store(StoreAtpProcessRequest $request)
    {
        $atpProcess = AtpProcess::create($request->all());

        return redirect()->route('admin.atp-processes.index');
    }

    public function edit(AtpProcess $atpProcess)
    {
        abort_if(Gate::denies('atp_process_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atpProcesses.edit', compact('atpProcess'));
    }

    public function update(UpdateAtpProcessRequest $request, AtpProcess $atpProcess)
    {
        $atpProcess->update($request->all());

        return redirect()->route('admin.atp-processes.index');
    }

    public function show(AtpProcess $atpProcess)
    {
        abort_if(Gate::denies('atp_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.atpProcesses.show', compact('atpProcess'));
    }

    public function destroy(AtpProcess $atpProcess)
    {
        abort_if(Gate::denies('atp_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atpProcess->delete();

        return back();
    }

    public function massDestroy(MassDestroyAtpProcessRequest $request)
    {
        AtpProcess::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
