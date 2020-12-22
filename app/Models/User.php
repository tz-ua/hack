<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
*
* @OA\Schema(
*     schema="UserSchema",
*     description="User model",
*     title="User schema",
 *     required={"name", "email"},
*     @OA\Property(
*         property="name",
*         description="Name of user",
*         type="string",
*         example="John",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="email",
*         description="User's email address",
*         type="string",
*         example="john.doe@gmail.com",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="photo",
*         description="Link to user's photo",
*         type="string",
*         example="host.com/photo.png",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="phone",
*         description="User's mobile phone number",
*         type="string",
*         example="+380961234567",
*         minLength=1,
*         maxLength=20,
*     ),
*     @OA\Property(
*         property="position",
*         description="User's position in company",
*         type="string",
*         example="Project manager",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="team",
*         description="Team of user",
*         type="string",
*         example="Nexus",
*         minLength=1,
*         maxLength=255,
*     ),
*     @OA\Property(
*         property="workplace_id",
*         description="Place where user works",
*         type="int",
*         example="1"
*     ),
* )
*/

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'phone',
        'position',
        'team',
        'workplace_id',
    ];

    // @todo add relations
}
