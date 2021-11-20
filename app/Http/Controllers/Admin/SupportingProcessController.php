<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupportingProcessRequest;
use App\Http\Requests\StoreSupportingProcessRequest;
use App\Http\Requests\UpdateSupportingProcessRequest;
use App\Models\SupportingProcess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupportingProcessController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supporting_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SupportingProcess::query()->select(sprintf('%s.*', (new SupportingProcess())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'supporting_process_show';
                $editGate = 'supporting_process_edit';
                $deleteGate = 'supporting_process_delete';
                $crudRoutePart = 'supporting-processes';

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

        return view('admin.supportingProcesses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('supporting_process_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supportingProcesses.create');
    }

    public function store(StoreSupportingProcessRequest $request)
    {
        $supportingProcess = SupportingProcess::create($request->all());

        return redirect()->route('admin.supporting-processes.index');
    }

    public function edit(SupportingProcess $supportingProcess)
    {
        abort_if(Gate::denies('supporting_process_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supportingProcesses.edit', compact('supportingProcess'));
    }

    public function update(UpdateSupportingProcessRequest $request, SupportingProcess $supportingProcess)
    {
        $supportingProcess->update($request->all());

        return redirect()->route('admin.supporting-processes.index');
    }

    public function show(SupportingProcess $supportingProcess)
    {
        abort_if(Gate::denies('supporting_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supportingProcesses.show', compact('supportingProcess'));
    }

    public function destroy(SupportingProcess $supportingProcess)
    {
        abort_if(Gate::denies('supporting_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supportingProcess->delete();

        return back();
    }

    public function massDestroy(MassDestroySupportingProcessRequest $request)
    {
        SupportingProcess::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
