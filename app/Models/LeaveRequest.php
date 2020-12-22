<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\LeaveRequest
 *
 * @property int $id
 * @property int $user_id
 * @property string $start_date
 * @property string $end_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|LeaveRequest newModelQuery()
 * @method static Builder|LeaveRequest newQuery()
 * @method static Builder|LeaveRequest query()
 * @method static Builder|LeaveRequest whereCreatedAt($value)
 * @method static Builder|LeaveRequest whereEndDate($value)
 * @method static Builder|LeaveRequest whereId($value)
 * @method static Builder|LeaveRequest whereStartDate($value)
 * @method static Builder|LeaveRequest whereUpdatedAt($value)
 * @method static Builder|LeaveRequest whereUserId($value)
 * @mixin Eloquent
 */
class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
    ];
}
