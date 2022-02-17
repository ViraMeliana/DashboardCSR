<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTpbRequest;
use App\Http\Requests\UpdateTpbRequest;
use App\Http\Resources\Admin\TpbResource;
use App\Models\Tpb;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TpbApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tpb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TpbResource(Tpb::with(['pilar'])->get());
    }

    public function store(StoreTpbRequest $request)
    {
        $tpb = Tpb::create($request->all());

        return (new TpbResource($tpb))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tpb $tpb)
    {
        abort_if(Gate::denies('tpb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TpbResource($tpb->load(['pilar']));
    }

    public function update(UpdateTpbRequest $request, Tpb $tpb)
    {
        $tpb->update($request->all());

        return (new TpbResource($tpb))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tpb $tpb)
    {
        abort_if(Gate::denies('tpb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tpb->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
