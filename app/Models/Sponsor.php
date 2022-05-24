<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Edition $edition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @method static \Database\Factories\SponsorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereEditionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereTagline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUrl($value)
 * @mixin \Eloquent
 */
class Sponsor extends Model
{
    use HasFactory;

    /**
     * Get the edition this sponsor belongs to.
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * Get the events sponsored by this sponsor.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class)->using(EventSponsor::class);
    }
}
