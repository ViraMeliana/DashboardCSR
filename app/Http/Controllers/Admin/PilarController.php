<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPilarRequest;
use App\Http\Requests\StorePilarRequest;
use App\Http\Requests\UpdatePilarRequest;
use App\Models\Pilar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PilarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pilar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilars = Pilar::all();

        return view('admin.pilars.index', compact('pilars'));
    }

    public function create()
    {
        abort_if(Gate::denies('pilar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pilars.create');
    }

    public function store(StorePilarRequest $request)
    {
        $pilar = Pilar::create($request->all());

        return redirect()->route('admin.pilars.index');
    }

    public function edit(Pilar $pilar)
    {
        abort_if(Gate::denies('pilar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pilars.edit', compact('pilar'));
    }

    public function update(UpdatePilarRequest $request, Pilar $pilar)
    {
        $pilar->update($request->all());

        return redirect()->route('admin.pilars.index');
    }

    public function show(Pilar $pilar)
    {
        abort_if(Gate::denies('pilar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilar->load('pilarTpbs');

        return view('admin.pilars.show', compact('pilar'));
    }

    public function destroy(Pilar $pilar)
    {
        abort_if(Gate::denies('pilar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pilar->delete();

        return back();
    }

    public function massDestroy(MassDestroyPilarRequest $request)
    {
        Pilar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
