<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * App\Models\EventTeam
 *
 * @property int $id
 * @property int|null $stage_id
 * @property int $event_id
 * @property int $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EventTeam newModelQuery()
 * @method static Builder|EventTeam newQuery()
 * @method static Builder|EventTeam query()
 * @method static Builder|EventTeam whereCreatedAt($value)
 * @method static Builder|EventTeam whereEventId($value)
 * @method static Builder|EventTeam whereId($value)
 * @method static Builder|EventTeam whereStageId($value)
 * @method static Builder|EventTeam whereTeamId($value)
 * @method static Builder|EventTeam whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $payment_status
 * @property string|null $checkout_session
 * @property-read Stage|null $stage
 * @method static Builder|EventTeam whereCheckoutSession($value)
 * @method static Builder|EventTeam wherePaymentStatus($value)
 */
class EventTeam extends Pivot
{
    /**
     * Get the stage the team is in
     *
     * @returns BelongsTo<Stage>
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
}
