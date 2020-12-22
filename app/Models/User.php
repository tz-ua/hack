<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * @return BelongsTo
     */
    public function workplace(): BelongsTo
    {
        return $this->belongsTo(Workplace::class, 'workplace_id', 'id');
    }
}
