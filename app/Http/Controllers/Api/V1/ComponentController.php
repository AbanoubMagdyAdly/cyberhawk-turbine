<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateComponentRequest;
use App\Models\Component;
use App\Services\ComponentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ComponentController extends Controller
{

    public function __construct(
        private ComponentService $componentService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return Response::json($this->componentService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateComponentRequest $request) :JsonResponse
    {
        return Response::json($this->componentService->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        return Response::json($this->componentService->getOne($id));
    }
}
