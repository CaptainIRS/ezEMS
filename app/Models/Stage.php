<?php

namespace App\Models;

use Database\Factories\StageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Stage
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property string|null $location_in_venue
 * @property int $event_id
 * @property int $venue_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Event $event
 * @property-read Collection|EventTeam[] $eventTeams
 * @property-read int|null $event_teams_count
 * @property-read Venue $venue
 *
 * @method static StageFactory factory(...$parameters)
 * @method static Builder|Stage newModelQuery()
 * @method static Builder|Stage newQuery()
 * @method static Builder|Stage query()
 * @method static Builder|Stage whereCreatedAt($value)
 * @method static Builder|Stage whereDescription($value)
 * @method static Builder|Stage whereEndTime($value)
 * @method static Builder|Stage whereEventId($value)
 * @method static Builder|Stage whereId($value)
 * @method static Builder|Stage whereLocationInVenue($value)
 * @method static Builder|Stage whereName($value)
 * @method static Builder|Stage whereSlug($value)
 * @method static Builder|Stage whereStartTime($value)
 * @method static Builder|Stage whereUpdatedAt($value)
 * @method static Builder|Stage whereVenueId($value)
 * @mixin Eloquent
 */
class Stage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'start_time', 'end_time', 'location_in_venue', 'event_id', 'venue_id',
    ];

    /**
     * Get the event this stage belongs to.
     *
     * @returns BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the venue of this stage.
     *
     * @returns BelongsTo<Venue>
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Get the event teams that belong to this stage.
     *
     * @returns HasMany<EventTeam>
     */
    public function eventTeams(): HasMany
    {
        return $this->hasMany(EventTeam::class);
    }
}
