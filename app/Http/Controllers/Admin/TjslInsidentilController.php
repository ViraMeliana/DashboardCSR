<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTjslInsidentilRequest;
use App\Http\Requests\UpdateTjslInsidentilRequest;
use App\Models\TjslInsidentil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TjslInsidentilController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('tjsl_insidentil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TjslInsidentil::query()->select(sprintf('%s.*', (new TjslInsidentil())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tjsl_insidentil_show';
                $editGate = 'tjsl_insidentil_edit';
                $deleteGate = 'tjsl_insidentil_delete';
                $crudRoutePart = 'tjsl-insidentils';

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
            $table->editColumn('periode', function ($row) {
                return $row->periode ? $row->periode : '';
            });
            $table->editColumn('rka', function ($row) {
                return $row->rka ? $row->rka : '';
            });
            $table->editColumn('cash_out', function ($row) {
                return $row->cash_out ? $row->cash_out : '';
            });
            $table->editColumn('commited', function ($row) {
                return $row->commited ? $row->commited : '';
            });
            $table->editColumn('realization', function ($row) {
                return $row->realization ? $row->realization : '';
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.tjslInsidentils.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tjsl_insidentil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tjslInsidentils.create');
    }

    public function store(StoreTjslInsidentilRequest $request)
    {
        $tjsl_insidentil = TjslInsidentil::create($request->all());

        return redirect()->route('admin.tjsl-insidentils.index');
    }

    public function edit(TjslInsidentil $tjsl_insidentil)
    {
        abort_if(Gate::denies('tjsl_insidentil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tjslInsidentils.edit', compact('tjsl_insidentil'));
    }

    public function update(UpdateTjslInsidentilRequest $request, TjslInsidentil $tjsl_insidentil)
    {
        $tjsl_insidentil->update($request->all());

        return redirect()->route('admin.tjsl-insidentils.index');
    }

    public function show(TjslInsidentil $tjsl_insidentil)
    {
        abort_if(Gate::denies('tjsl_insidentil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tjslInsidentils.show', compact('tjsl_insidentil'));
    }

    public function destroy(TjslInsidentil $tjsl_insidentil)
    {
        abort_if(Gate::denies('tjsl_insidentil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl_insidentil->delete();

        return back();
    }
}
