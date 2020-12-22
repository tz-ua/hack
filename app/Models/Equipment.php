<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = ['inventory_number', 'type'];

    /**
     * @return MorphTo
     */
    public function equipmentable(): MorphTo
    {
        return $this->morphTo();
    }
}
