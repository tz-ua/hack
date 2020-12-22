<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class Test
 *
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * Returns payload from GET Request
     *
     * @param Request $request
     *
     * @OA\Get(
     *      path="/api/test",
     *      tags={"Test"},
     *      operationId="testGet",
     *      summary="Test GET request",
     *      description="Return payload from Request for testing",
     *      @OA\Parameter(
     *         in="query",
     *         name="abc",
     *         required=false,
     *         description="ABC desc",
     *         example="123",
     *         @OA\Schema(
     *             type="string"
     *         )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(
     *             type="object"
     *         )
     *     )
     * )
     */
    public function testGet(Request $request)
    {
        return response()->json($request, 202);
    }

    /**
     * Returns payload from POST Request
     *
     * @param Request $request
     *
     * @OA\Post(
     *      path="/api/test",
     *      tags={"Test"},
     *      operationId="testPost",
     *      summary="Test POST request",
     *      description="Return payload from Request for testing",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/TestJsonRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(
     *             type="object"
     *         )
     *     )
     * )
     */
    public function testPost(Request $request)
    {
        return response()->json($request, 202);
    }
}
