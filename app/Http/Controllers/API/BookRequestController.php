<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest\CreateRequest;
use App\Http\Requests\BookRequest\UpdateRequest;
use App\Models\BookRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class BookRequestController extends Controller
{

    /**
     * Display a listing of book requests.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *     path="/api/book_requests",
     *     tags={"Book Request"},
     *     operationId="bookRequestList",
     *     summary="Get list of Book Requests",
     *     description="Returns list of Book Requests",
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
     *     path="/api/book_requests",
     *     tags={"Book Request"},
     *     operationId="bookRequestCreate",
     *     summary="Create Book Request",
     *     description="Create new Book Request",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonModel")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     )
     * )
     */
    public function create(CreateRequest $createRequest): JsonResponse
    {
        $bookRequest = new BookRequest();
        $bookRequest->fill($createRequest->validated());
        $bookRequest->save();

        return response()->json($bookRequest);
    }

    /**
     * @param UpdateRequest $request
     * @param BookRequest   $bookRequest
     * @return JsonResponse
     *
     * @OA\Patch(
     *     path="/api/book_requests/{id}",
     *     tags={"Book Request"},
     *     operationId="bookRequestUpdate",
     *     summary="Update Book Request",
     *     description="Update Book Request",
     *     @OA\Parameter(
     *         name="id",
     *         description="Id of Book request",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookRequestJsonModel")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     )
     * )
     */
    public function update(UpdateRequest $request, BookRequest $bookRequest): JsonResponse
    {
        $bookRequest->update($request->validated());

        return response()->json($bookRequest);
    }

    /**
     * @param BookRequest $room
     * @return void
     * @throws Exception
     *
     * @OA\Delete(
     *     path="/api/book_requests/{id}",
     *     tags={"Book Request"},
     *     operationId="bookRequestDelete",
     *     summary="Delete Book Request",
     *     description="Delete Book Request",
     *     @OA\Parameter(
     *         name="id",
     *         description="Id of Book request",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successful operation",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     )
     * )
     */
    public function destroy(BookRequest $room)
    {
        $room->delete();
    }
}
