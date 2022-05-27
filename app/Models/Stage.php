<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventTeam[] $eventTeams
 * @property-read int|null $event_teams_count
 * @property-read \App\Models\Venue $venue
 * @method static \Database\Factories\StageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereLocationInVenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereVenueId($value)
 * @mixin \Eloquent
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
        'name', 'slug', 'description', 'start_time', 'end_time', 'location_in_venue', 'event_id', 'venue_id'
    ];

    /**
     * Get the event this stage belongs to.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the venue of this stage.
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Get the event teams that belong to this stage.
     */
    public function eventTeams()
    {
        return $this->hasMany(EventTeam::class);
    }
}
