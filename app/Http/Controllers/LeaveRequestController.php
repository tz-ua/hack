<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest\CreateRequest;
use App\Models\LeaveRequest;
use Illuminate\Http\JsonResponse;

class LeaveRequestController extends Controller
{

    /**
     * Display a listing of leave requests.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/api/leave_requests",
     *      tags={"Leave Request"},
     *      operationId="leaveRequestList",
     *      summary="Get list of Leave Requests",
     *      description="Returns list of Leave Requests",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/LeaveRequestJsonModel")
     *         )
     *     )
     * )
     */
    public function list(): JsonResponse
    {
        return response()->json(LeaveRequest::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $createRequest
     * @return JsonResponse
     *
     * @OA\Post(
     *      path="/api/leave_requests",
     *      tags={"Leave Request"},
     *      operationId="leaveRequestCreate",
     *      summary="Create Leave Request",
     *      description="Create new Leave Request",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/LeaveRequestJsonRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/LeaveRequestJsonModel")
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *      )
     * )
     */
    public function create(CreateRequest $createRequest): JsonResponse
    {
        $leaveRequest = new LeaveRequest();
        $leaveRequest->fill($createRequest->validated());
        $leaveRequest->save();

        return response()->json($leaveRequest);
    }
}
