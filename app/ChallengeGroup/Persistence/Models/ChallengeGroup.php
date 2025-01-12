<?php

namespace App\ChallengeGroup\Persistence\Models;

use App\Auth\Persistence\Models\User;
use Database\Factories\ChallengeGroups\ChallengeGroupFactory;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $created_by
 * @property string $name
 * @property DateTime $end_date
 * @property User $creator
 * @property Collection $competitors
 * @method static create(array $array)
 * @method static exists(int $id)
 * @method static find(int $id)
 * @method static where(array $clauses)
 * @method static join(string $table, string $first, string $operator, string $second)
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

    public function newCollection(array $models = []): ChallengeGroupCollection
    {
        return new ChallengeGroupCollection($models);
    }

    /**
     * @return BelongsTo<User>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    /**
     * @return HasMany<ChallengeGroupUser>
     */
    public function competitors(): HasMany
    {
        return $this->hasMany(ChallengeGroupUser::class, 'challenge_group_id');
    }
}
