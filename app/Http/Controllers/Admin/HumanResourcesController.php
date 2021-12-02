<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHumanResourceRequest;
use App\Http\Requests\StoreHumanResourceRequest;
use App\Http\Requests\UpdateHumanResourceRequest;
use App\Models\HumanResource;
use App\Models\User;
use App\Models\Position;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HumanResourcesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('human_resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HumanResource::with(['user'])->select(sprintf('%s.*', (new HumanResource())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'human_resource_show';
                $editGate = 'human_resource_edit';
                $deleteGate = 'human_resource_delete';
                $crudRoutePart = 'human-resources';

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
                return $row->position_id ? $row->position_id : '';
            });
            $table->editColumn('competence', function ($row) {
                return $row->competence ? $row->competence : '';
            });
            $table->editColumn('awareness', function ($row) {
                return $row->awareness ? $row->awareness : '';
            });
            $table->editColumn('scope', function ($row) {
                return $row->scope ? $row->scope : '';
            });
            $table->editColumn('jobdesc', function ($row) {
                return $row->jobdesc ? $row->jobdesc : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.humanResources.index');
    }

    public function create()
    {
        abort_if(Gate::denies('human_resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $position = Position::pluck('name', 'id');
        return view('admin.humanResources.create', compact('users','position'));
    }

    public function store(StoreHumanResourceRequest $request)
    {
        $humanResource = HumanResource::create($request->all());

        return redirect()->route('admin.human-resources.index');
    }

    public function edit(HumanResource $humanResource)
    {
        abort_if(Gate::denies('human_resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $position = Position::pluck('name', 'id');
        $humanResource->load('user');

        return view('admin.humanResources.edit', compact('users', 'humanResource','position'));
    }

    public function update(UpdateHumanResourceRequest $request, HumanResource $humanResource)
    {
        $humanResource->update($request->all());

        return redirect()->route('admin.human-resources.index');
    }

    public function show(HumanResource $humanResource)
    {
        abort_if(Gate::denies('human_resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $humanResource->load('user');

        return view('admin.humanResources.show', compact('humanResource'));
    }

    public function destroy(HumanResource $humanResource)
    {
        abort_if(Gate::denies('human_resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $humanResource->delete();

        return back();
    }

    public function massDestroy(MassDestroyHumanResourceRequest $request)
    {
        HumanResource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
