<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Room
 *
 * @property-read Collection|BookRequest[] $book_requests
 * @property-read int|null                 $book_requests_count
 * @method static Builder|Room newModelQuery()
 * @method static Builder|Room newQuery()
 * @method static Builder|Room query()
 * @mixin Eloquent
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'photo'
    ];

    protected $appends = ['future_book_requests'];

    /**
     * @return HasMany
     */
    public function book_requests(): HasMany
    {
        return $this->hasMany(BookRequest::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    /**
     * @return bool
     */
    public function getFutureBookRequestsAttribute(): bool
    {
        $now = Carbon::now()->toDateTimeString();
        return !$this->book_requests()
            ->where('to', '>=', $now)
            ->get();
    }
}
