<?php

namespace App\Models\ChallengeGroups;

use App\Models\Auth\User;
use Database\Factories\ChallengeGroups\ChallengeGroupFactory;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $created_by
 * @property string $name
 * @property DateTime $end_date
 * @property User $creator
 * @method static create(array $array)
 */
class ChallengeGroup extends Model
{
    /** @use HasFactory<ChallengeGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'created_by',
        'name',
        'end_date',
    ];

    /**
     * @return BelongsTo<User>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
