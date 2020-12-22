<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
     *         @OA\JsonContent(
     *             type="object"
     *         )
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
    public function store(Request $request)
    {
        // @todo move validation to UserRequest
        // workplace_id unique:workplaces
        return User::create($request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'max:255',
            'photo' => 'max:255',
            'position' => 'max:255',
            'team' => 'max:255',
            'workplace_id' => 'integer',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
