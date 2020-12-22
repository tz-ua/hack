<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
*
* @OA\Schema(
*     schema="WorkplaceSchema",
*     description="Workplace model",
*     title="Workplace schema",
*     @OA\Property(
*         property="name",
*         description="Workplace identity name",
*         type="string",
*         example="Johnny Sins workplace",
*         minLength=1,
*         maxLength=100,
*     ),
* )
*/

class Workplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
