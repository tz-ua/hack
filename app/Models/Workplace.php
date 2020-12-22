<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    /**
     * @return MorphOne
     */
    public function equipment(): MorphOne
    {
        return $this->morphOne(Equipment::class, 'equipmentable');
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'workplace_id', 'id');
    }
}
