<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     *         @OA\JsonContent(ref="#/components/schemas/UserSchema")
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     *         @OA\JsonContent(ref="#/components/schemas/UserSchema")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfull operation",
     *         @OA\JsonContent(ref="#/components/schemas/UserSchema")
     *     )
     * )
     */
    public function store(StoreUserRequest $request)
    {
        return User::create($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiResponse"),
     *      )
     * )
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
