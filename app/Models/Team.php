<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;

/**
 * App\Models\Team
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $owner
 * @property-read Collection|TeamInvitation[] $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 *
 * @method static TeamFactory factory(...$parameters)
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereName($value)
 * @method static Builder|Team wherePersonalTeam($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @method static Builder|Team whereUserId($value)
 *
 * @property-read Collection|Event[] $events
 * @property-read int|null $events_count
 * @property-read int|null $payments_count
 * @mixin Eloquent
 */
class Team extends JetstreamTeam
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'personal_team',
        'user_id',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

    /**
     * Get the events this team is participating in.
     *
     * @returns BelongsToMany<Event>
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)
            ->using(EventTeam::class)
            ->withPivot('stage_id')
            ->withPivot('payment_status')
            ->withPivot('checkout_session');
    }
}
