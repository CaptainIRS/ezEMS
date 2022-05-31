<?php

namespace App\Models;

use Database\Factories\CollegeFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\College
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Profile[] $profiles
 * @property-read int|null $profiles_count
 * @method static CollegeFactory factory(...$parameters)
 * @method static Builder|College newModelQuery()
 * @method static Builder|College newQuery()
 * @method static Builder|College query()
 * @method static Builder|College whereCreatedAt($value)
 * @method static Builder|College whereId($value)
 * @method static Builder|College whereName($value)
 * @method static Builder|College whereUpdatedAt($value)
 * @mixin Eloquent
 */
class College extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the profiles that belong to this college.
     *
     * @returns HasMany<Profile>
     */
    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }
}
