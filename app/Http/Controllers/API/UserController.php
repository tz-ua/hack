<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     *
     * @OA\Get(
     *      path="/api/users",
     *      tags={"User"},
     *      operationId="userIndex",
     *      summary="Get list of Users",
     *      description="Returns list of Users",
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/UserSchemaResponse")
     *     )
     * )
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     *
     * @OA\Post(
     *      path="/api/users",
     *      tags={"User"},
     *      operationId="userCreate",
     *      summary="Create User",
     *      description="Create new User",
     *      @OA\RequestBody(
     *         required=true,
     *         description="Json Content",
     *         @OA\JsonContent(ref="#/components/schemas/UserSchemaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/UserSchemaResponse")
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *      )
     * )
     */
    public function store(StoreUserRequest $request)
    {
        return User::create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     * @return Response
     *
     * @OA\Patch(
     *      path="/api/users/{id}",
     *      tags={"User"},
     *      operationId="userUpdate",
     *      summary="Update User",
     *      description="Update existing user",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id of User",
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
     *                ref="#/components/schemas/UserSchemaResponse"
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
     *          @OA\JsonContent(ref="#/components/schemas/UserSchemaRequest")
     *      )
     * )
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/api/users/{id}",
     *      tags={"User"},
     *      operationId="userDelete",
     *      summary="Delete User",
     *      description="Delete existing User",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id of User",
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
    public function destroy(User $user)
    {
        $user->delete();
    }
}
