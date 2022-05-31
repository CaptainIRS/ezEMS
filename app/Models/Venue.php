<?php

namespace App\Models;

use Database\Factories\VenueFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Venue
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $location
 * @property int|null $capacity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Stage[] $stages
 * @property-read int|null $stages_count
 * @method static VenueFactory factory(...$parameters)
 * @method static Builder|Venue newModelQuery()
 * @method static Builder|Venue newQuery()
 * @method static Builder|Venue query()
 * @method static Builder|Venue whereCapacity($value)
 * @method static Builder|Venue whereCreatedAt($value)
 * @method static Builder|Venue whereDescription($value)
 * @method static Builder|Venue whereId($value)
 * @method static Builder|Venue whereLocation($value)
 * @method static Builder|Venue whereName($value)
 * @method static Builder|Venue whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Venue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'location', 'capacity'
    ];

    /**
     * Get the stages hosted by this venue.
     *
     * @returns HasMany<Stage>
     */
    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }
}
