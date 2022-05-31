<?php

namespace App\Models;

use Database\Factories\SponsorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Sponsor
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $tagline
 * @property string $url
 * @property string $type
 * @property int $edition_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Edition $edition
 * @property-read Collection|Event[] $events
 * @property-read int|null $events_count
 * @method static SponsorFactory factory(...$parameters)
 * @method static Builder|Sponsor newModelQuery()
 * @method static Builder|Sponsor newQuery()
 * @method static Builder|Sponsor query()
 * @method static Builder|Sponsor whereCreatedAt($value)
 * @method static Builder|Sponsor whereEditionId($value)
 * @method static Builder|Sponsor whereId($value)
 * @method static Builder|Sponsor whereName($value)
 * @method static Builder|Sponsor whereSlug($value)
 * @method static Builder|Sponsor whereTagline($value)
 * @method static Builder|Sponsor whereType($value)
 * @method static Builder|Sponsor whereUpdatedAt($value)
 * @method static Builder|Sponsor whereUrl($value)
 * @mixin Eloquent
 */
class Sponsor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'tagline', 'url', 'type', 'edition_id'
    ];

    /**
     * Get the edition this sponsor belongs to.
     *
     * @returns BelongsTo<Edition>
     */
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * Get the events sponsored by this sponsor.
     *
     * @returns BelongsToMany<Event>
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->using(EventSponsor::class);
    }
}
