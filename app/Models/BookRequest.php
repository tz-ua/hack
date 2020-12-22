<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\BookRequest
 *
 * @property int         $id
 * @property int         $user_id
 * @property int         $room_id
 * @property string      $from
 * @property string      $to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Room   $room
 * @property-read User   $user
 * @method static Builder|BookRequest newModelQuery()
 * @method static Builder|BookRequest newQuery()
 * @method static Builder|BookRequest query()
 * @method static Builder|BookRequest whereCreatedAt($value)
 * @method static Builder|BookRequest whereFrom($value)
 * @method static Builder|BookRequest whereId($value)
 * @method static Builder|BookRequest whereRoomId($value)
 * @method static Builder|BookRequest whereTo($value)
 * @method static Builder|BookRequest whereUpdatedAt($value)
 * @method static Builder|BookRequest whereUserId($value)
 * @mixin Eloquent
 */
class BookRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'from',
        'to',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
