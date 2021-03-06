<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkplaceRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Workplace;
use Illuminate\Http\Response;

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
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/WorkplaceSchemaResponse")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(Workplace::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreWorkplaceRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *      path="/api/workplaces",
     *      tags={"Workplace"},
     *      operationId="workplaceCreate",
     *      summary="Create new Workplace",
     *      description="Create new Workplace",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/WorkplaceSchemaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/WorkplaceSchemaResponse")
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *      )
     * )
     */
    public function create(StoreWorkplaceRequest $request): JsonResponse
    {
        $workplace = Workplace::create($request->validated());

        return response()->json($workplace);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     *
     * @OA\Get(
     *     path="/api/workplaces/{id}",
     *     tags={"Workplace"},
     *     operationId="workplaceGet",
     *     summary="Get specific Workplace",
     *     description="Returns specific Workplace with User detailed information",
     *     @OA\Parameter(
     *         name="id",
     *         description="Id of Workplace",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/WorkplaceSchemaResponse")
     *     )
     * )
     */
    public function show(Workplace $workplace)
    {
        return $workplace;
    }
}
