<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Venue
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $location
 * @property int|null $capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stage[] $stages
 * @property-read int|null $stages_count
 * @method static \Database\Factories\VenueFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Venue extends Model
{
    use HasFactory;

    /**
     * Get the stages hosted by this venue.
     */
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
