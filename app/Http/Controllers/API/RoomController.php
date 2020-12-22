<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *      path="/api/rooms",
     *      tags={"Room"},
     *      operationId="roomIndex",
     *      summary="Get list of Rooms",
     *      description="Returns list of Rooms",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/RoomSchemaResponse")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return response()->json(Room::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     *
     * @OA\Post(
     *      path="/api/rooms",
     *      tags={"Room"},
     *      operationId="roomCreate",
     *      summary="Create Room",
     *      description="Create new Room",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/RoomSchemaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/RoomSchemaResponse")
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *      )
     * )
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $room = Room::create($request->validated());

        return response()->json($room);
    }

    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return Response
     *
     * @OA\Patch(
     *      path="/api/rooms/{id}",
     *      tags={"Room"},
     *      operationId="roomUpdate",
     *      summary="Update Room",
     *      description="Update existing room",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id of Room",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *             @OA\Property(
     *                property="data",
     *                type="object",
     *                ref="#/components/schemas/RoomSchemaResponse"
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse"),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Keyword data",
     *          @OA\JsonContent(ref="#/components/schemas/RoomSchemaRequest")
     *      )
     * )
     */
    public function update(UpdateRoomRequest $request, Room $room): JsonResponse
    {
        $room->update($request->validated());

        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/api/rooms/{id}",
     *      tags={"Room"},
     *      operationId="roomDelete",
     *      summary="Delete Room",
     *      description="Delete existing Room",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id of Room",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *      )
     * )
     */
    public function destroy(Room $room)
    {
        $room->delete();
    }
}
