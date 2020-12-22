<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Workplace;

class WorkplaceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Workplace::all());
    }

    public function create(Request $request): JsonResponse
    {
        $workplace = new Workplace();
        $workplace->name = $request->name;
        $workplace->save();

        return response()->json($workplace);
    }
}
