<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMethodRequest;
use App\Http\Requests\UpdateMethodRequest;
use App\Http\Resources\Admin\MethodResource;
use App\Models\Method;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MethodApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('method_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MethodResource(Method::all());
    }

    public function store(StoreMethodRequest $request)
    {
        $method = Method::create($request->all());

        return (new MethodResource($method))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateMethodRequest $request, Method $method)
    {
        $method->update($request->all());

        return (new MethodResource($method))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Method $method)
    {
        abort_if(Gate::denies('method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $method->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
