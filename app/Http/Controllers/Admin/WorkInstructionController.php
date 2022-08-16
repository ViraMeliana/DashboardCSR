<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkInstructionRequest;
use App\Http\Requests\UpdateWorkInstructionRequest;
use App\Models\WorkInstruction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Yajra\DataTables\Facades\DataTables;

class WorkInstructionController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('work_instruction_access'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = WorkInstruction::query()->select(sprintf('%s.*', (new WorkInstruction())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'work_instruction_show';
                $editGate = 'work_instruction_edit';
                $deleteGate = 'work_instruction_delete';
                $crudRoutePart = 'work-instructions';

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
            $table->editColumn('no_urut', function ($row) {
                return $row->no_urut ? $row->no_urut : '';
            });
            $table->editColumn('no_ik', function ($row) {
                return $row->no_ik ? $row->no_ik : '';
            });
            $table->editColumn('work_unit', function ($row) {
                return $row->work_unit ? $row->work_unit : '';
            });
            $table->editColumn('publish_date', function ($row) {
                return $row->publish_date ? $row->publish_date : '';
            });
            $table->editColumn('reassessment_date', function ($row) {
                return $row->reassessment_date ? $row->reassessment_date : '';
            });
            $table->editColumn('check_date', function ($row) {
                return $row->check_date ? $row->check_date : '';
            });
            $table->editColumn('tindakan', function ($row) {
                return $row->tindakan ? $row->tindakan : '';
            });
            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.workInstructions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('work_instruction_create'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workInstructions.create');
    }

    public function store(StoreWorkInstructionRequest $request)
    {
        $work_instruction = WorkInstruction::create($request->all());

        return redirect()->route('admin.work-instructions.index');
    }

    public function edit(WorkInstruction $work_instruction)
    {
        abort_if(Gate::denies('work_instruction_edit'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workInstructions.edit', compact('work_instruction'));
    }

    public function update(UpdateWorkInstructionRequest $request, WorkInstruction $work_instruction)
    {
        $work_instruction->update($request->all());

        return redirect()->route('admin.work-instructions.index');
    }

    public function show(WorkInstruction $work_instruction)
    {
        abort_if(Gate::denies('work_instruction_show'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workInstructions.show', compact('work_instruction'));
    }

    public function destroy(WorkInstruction $work_instruction)
    {
        abort_if(Gate::denies('work_instruction_delete'), ResponseAlias::HTTP_FORBIDDEN, '403 Forbidden');

        $work_instruction->delete();

        return back();
    }
}
