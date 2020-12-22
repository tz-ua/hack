<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkplaceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Workplace;

class WorkplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/api/workplaces",
     *      tags={"Workplace"},
     *      operationId="workplaceIndex",
     *      summary="Get Workplaces list",
     *      description="Returns list of Workplaces",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/WorkplaceSchema")
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(Workplace::all());
    }

    public function create(StoreWorkplaceRequest $request): JsonResponse
    {
        $workplace = Workplace::create($request->validated());

        return response()->json($workplace);
    }
}
