<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
