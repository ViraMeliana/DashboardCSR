<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTpbRequest;
use App\Http\Requests\StoreTpbRequest;
use App\Http\Requests\UpdateTpbRequest;
use App\Models\Pilar;
use App\Models\Tpb;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TpbController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tpb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpbs = Tpb::with(['pilar'])->get();

        $pilars = Pilar::get();

        return view('admin.tpbs.index', compact('pilars', 'tpbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('tpb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilars = Pilar::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tpbs.create', compact('pilars'));
    }

    public function store(StoreTpbRequest $request)
    {
        $tpb = Tpb::create($request->all());

        return redirect()->route('admin.tpbs.index');
    }

    public function edit(Tpb $tpb)
    {
        abort_if(Gate::denies('tpb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilars = Pilar::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tpb->load('pilar');

        return view('admin.tpbs.edit', compact('pilars', 'tpb'));
    }

    public function update(UpdateTpbRequest $request, Tpb $tpb)
    {
        $tpb->update($request->all());

        return redirect()->route('admin.tpbs.index');
    }

    public function show(Tpb $tpb)
    {
        abort_if(Gate::denies('tpb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpb->load('pilar');

        return view('admin.tpbs.show', compact('tpb'));
    }

    public function destroy(Tpb $tpb)
    {
        abort_if(Gate::denies('tpb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpb->delete();

        return back();
    }

    public function massDestroy(MassDestroyTpbRequest $request)
    {
        Tpb::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
