<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\EventSponsor
 *
 * @property int $id
 * @property int $event_id
 * @property int $sponsor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventSponsor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventSponsor extends Pivot
{
    //
}
