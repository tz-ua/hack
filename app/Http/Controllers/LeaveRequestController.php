<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest\CreateRequest;
use App\Models\LeaveRequest;
use Illuminate\Http\JsonResponse;

class LeaveRequestController extends Controller
{

    public function list(): JsonResponse
    {
        return response()->json(LeaveRequest::all());
    }

    public function create(CreateRequest $createRequest): JsonResponse
    {
        $leaveRequest = new LeaveRequest();
        $leaveRequest->fill($createRequest->validated());
        $leaveRequest->save();

        return response()->json($leaveRequest);
    }
}
