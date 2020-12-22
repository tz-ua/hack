<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Workplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $with = [
        'user',
        'equipment'
    ];

    /**
     * @return MorphMany
     */
    public function equipment(): MorphMany
    {
        return $this->morphMany(Equipment::class, 'equipmentable');
    }

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'workplace_id', 'id');
    }
}
