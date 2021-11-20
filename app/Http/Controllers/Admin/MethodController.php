<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMethodRequest;
use App\Http\Requests\StoreMethodRequest;
use App\Http\Requests\UpdateMethodRequest;
use App\Models\Method;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MethodController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('method_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Method::query()->select(sprintf('%s.*', (new Method())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'method_show';
                $editGate = 'method_edit';
                $deleteGate = 'method_delete';
                $crudRoutePart = 'methods';

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

        return view('admin.methods.index');
    }

    public function create()
    {
        abort_if(Gate::denies('method_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.methods.create');
    }

    public function store(StoreMethodRequest $request)
    {
        $method = Method::create($request->all());

        return redirect()->route('admin.methods.index');
    }

    public function edit(Method $method)
    {
        abort_if(Gate::denies('method_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.methods.edit', compact('method'));
    }

    public function update(UpdateMethodRequest $request, Method $method)
    {
        $method->update($request->all());

        return redirect()->route('admin.methods.index');
    }

    public function show(Method $method)
    {
        abort_if(Gate::denies('method_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.methods.show', compact('method'));
    }

    public function destroy(Method $method)
    {
        abort_if(Gate::denies('method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $method->delete();

        return back();
    }

    public function massDestroy(MassDestroyMethodRequest $request)
    {
        Method::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
