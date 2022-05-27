<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\EventTeam
 *
 * @property int $id
 * @property int|null $stage_id
 * @property int $event_id
 * @property int $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTeam whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventTeam extends Pivot
{
    /**
     * Get the stage the team is in
     */
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
