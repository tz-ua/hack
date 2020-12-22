<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkplaceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Workplace;

class WorkplaceController extends Controller
{
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
