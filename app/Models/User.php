<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int                                                        $id
 * @property string                                                     $name
 * @property string                                                     $email
 * @property string|null                                                $phone
 * @property string|null                                                $position
 * @property string|null                                                $team
 * @property string|null                                                $photo
 * @property int|null                                                   $workplace_id
 * @property \Illuminate\Support\Carbon|null                            $created_at
 * @property \Illuminate\Support\Carbon|null                            $updated_at
 * @property-read mixed                                                 $online
 * @property-read Collection|LeaveRequest[]                             $leave_requests
 * @property-read int|null                                              $leave_requests_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null                                              $notifications_count
 * @property-read Workplace|null                                        $workplace
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePhoto($value)
 * @method static Builder|User wherePosition($value)
 * @method static Builder|User whereTeam($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereWorkplaceId($value)
 * @mixin Eloquent
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

    protected $appends = [
        'online',
    ];

    protected $with = [
        'workplace'
    ];

    protected $hidden = [
        'workplace_id'
    ];

    /**
     * @return BelongsTo
     */
    public function workplace(): BelongsTo
    {
        return $this->belongsTo(Workplace::class, 'workplace_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function leave_requests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class);
    }

    /**
     * @return bool
     */
    public function getOnlineAttribute(): bool
    {
        $now = Carbon::now()->toDateString();
        return !$this->leave_requests()
            ->where(static function (Builder $builder) use ($now) {
                $builder
                    ->where('start_date', '<=', $now)
                    ->orWhere('end_date', '>=', $now);
            })
            ->exists();
    }
}
