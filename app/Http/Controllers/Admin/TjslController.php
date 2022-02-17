<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTjlsTrait;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTjslRequest;
use App\Http\Requests\StoreTjslRequest;
use App\Http\Requests\UpdateTjslRequest;
use App\Models\Pilar;
use App\Models\Tjsl;
use App\Models\Tpb;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TjslController extends Controller
{
    use CsvImportTjlsTrait;

    public function index()
    {
        abort_if(Gate::denies('tjsl_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsls = Tjsl::with(['tpbs'])->get();

        return view('admin.tjsls.index', compact('tjsls'));
    }

    public function create()
    {
        abort_if(Gate::denies('tjsl_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpbs = Tpb::pluck('tpb_number', 'id');

        return view('admin.tjsls.create', compact('tpbs'));
    }

    public function store(StoreTjslRequest $request)
    {
        $tjsl = Tjsl::create($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return redirect()->route('admin.tjsls.index');
    }

    public function edit(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpbs = Tpb::pluck('tpb_number', 'id');

        $tjsl->load('tpbs');

        return view('admin.tjsls.edit', compact('tjsl', 'tpbs'));
    }

    public function update(UpdateTjslRequest $request, Tjsl $tjsl)
    {
        $tjsl->update($request->all());
        $tjsl->tpbs()->sync($request->input('tpbs', []));

        return redirect()->route('admin.tjsls.index');
    }

    public function show(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl->load('tpbs');

        $toShow = [];
        $pilars = Pilar::all();

        foreach ($pilars as $pilar) {
            foreach ($tjsl->tpbs as $item) {
                if ($pilar->id == $item->pilar_id) {
                    $toShow[$pilar->name][] = $item->toArray();

                    isset($toShow[$pilar->name.'-rka']) ? $toShow[$pilar->name.'-rka'] += (int)$item->rka : $toShow[$pilar->name.'-rka'] = (int)$item->rka;
                    isset($toShow[$pilar->name.'-cash-out']) ? $toShow[$pilar->name.'-cash-out'] += (int)$item->cash_out : $toShow[$pilar->name.'-cash-out'] = (int)$item->cash_out;
                    isset($toShow[$pilar->name.'-commited']) ? $toShow[$pilar->name.'-commited'] += (int)$item->commited : $toShow[$pilar->name.'-commited'] = (int)$item->commited;
                    isset($toShow[$pilar->name.'-realization']) ? $toShow[$pilar->name.'-realization'] += (int)$item->realization : $toShow[$pilar->name.'-realization'] = (int)$item->realization;
                }
            }

            isset($toShow['rka-all']) ? $toShow['rka-all'] += $toShow[$pilar->name.'-rka']
                : $toShow['rka-all'] = $toShow[$pilar->name.'-rka'] ;

            isset($toShow['cash-out-all']) ? $toShow['cash-out-all'] += $toShow[$pilar->name.'-cash-out']
                : $toShow['cash-out-all'] = $toShow[$pilar->name.'-cash-out'] ;

            isset($toShow['commited-all']) ? $toShow['commited-all'] += $toShow[$pilar->name.'-commited']
                : $toShow['commited-all'] = $toShow[$pilar->name.'-commited'];

            isset($toShow['realization-all']) ? $toShow['realization-all'] += $toShow[$pilar->name.'-realization']
                : $toShow['realization-all'] = $toShow[$pilar->name.'-realization'];
        }

        return view('admin.tjsls.show', compact('toShow'));
    }

    public function destroy(Tjsl $tjsl)
    {
        abort_if(Gate::denies('tjsl_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tjsl->delete();

        return back();
    }

    public function massDestroy(MassDestroyTjslRequest $request)
    {
        Tjsl::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
