<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateInspectionRequest;
use App\Services\InspectionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;

class InspectionController extends Controller
{
        public function __construct(
        private InspectionService $inspectionService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return Response::json($this->inspectionService->getAll()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateInspectionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateInspectionRequest $request): JsonResponse
    {
        return Response::json($this->inspectionService->store($request->turbine_components));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        return Response::json($this->inspectionService->getOne($id));
    }
}
