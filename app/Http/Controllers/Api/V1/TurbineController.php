<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTurbineRequest;
use App\Services\TurbineService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TurbineController extends Controller
{
    public function __construct(
        private TurbineService $turbineService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return Response::json($this->turbineService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTurbineRequest $request): JsonResponse
    {
        return Response::json($this->turbineService->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        return Response::json($this->turbineService->getOne($id));
    }

    public function attachComponent(Request $request, $id): JsonResponse
    {
        return Response::json($this->turbineService->attachComponent($id, $request->components));
    }

    public function detachComponent(Request $request, $id): JsonResponse
    {
        return Response::json($this->turbineService->detachComponent($id, $request->components));
    }
}
