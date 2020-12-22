<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest\CreateRequest;
use App\Models\BookRequest;
use Illuminate\Http\JsonResponse;

class BookRequestController extends Controller
{

    /**
     * Display a listing of book requests.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/api/book_requests",
     *      tags={"Book Request"},
     *      operationId="bookRequestList",
     *      summary="Get list of Book Requests",
     *      description="Returns list of Book Requests",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/BookRequestJsonModel")
     *         )
     *     )
     * )
     */
    public function list(): JsonResponse
    {
        return response()->json(BookRequest::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $createRequest
     * @return JsonResponse
     *
     * @OA\Post(
     *      path="/api/book_requests",
     *      tags={"Book Request"},
     *      operationId="bookRequestCreate",
     *      summary="Create Book Request",
     *      description="Create new Book Request",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonModel")
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
        $bookRequest = new BookRequest();
        $bookRequest->fill($createRequest->validated());
        $bookRequest->save();

        return response()->json($bookRequest);
    }
}
