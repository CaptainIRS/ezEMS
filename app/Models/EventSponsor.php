<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * App\Models\EventSponsor
 *
 * @property int $id
 * @property int $event_id
 * @property int $sponsor_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|EventSponsor newModelQuery()
 * @method static Builder|EventSponsor newQuery()
 * @method static Builder|EventSponsor query()
 * @method static Builder|EventSponsor whereCreatedAt($value)
 * @method static Builder|EventSponsor whereEventId($value)
 * @method static Builder|EventSponsor whereId($value)
 * @method static Builder|EventSponsor whereSponsorId($value)
 * @method static Builder|EventSponsor whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EventSponsor extends Pivot
{
    //
}
