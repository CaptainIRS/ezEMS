<?php

namespace App\Models;

use Database\Factories\EventFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string|null $rules
 * @property string|null $prizes
 * @property string|null $resources
 * @property int|null $max_participants
 * @property string|null $registration_fee
 * @property string|null $contact
 * @property int $cluster_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Announcement[] $announcements
 * @property-read int|null $announcements_count
 * @property-read Cluster $cluster
 * @property-read Collection|Faq[] $faqs
 * @property-read int|null $faqs_count
 * @property-read int|null $payments_count
 * @property-read Collection|Sponsor[] $sponsors
 * @property-read int|null $sponsors_count
 * @property-read Collection|Stage[] $stages
 * @property-read int|null $stages_count
 * @property-read Collection|Team[] $teams
 * @property-read int|null $teams_count
 * @method static EventFactory factory(...$parameters)
 * @method static Builder|Event newModelQuery()
 * @method static Builder|Event newQuery()
 * @method static Builder|Event query()
 * @method static Builder|Event whereClusterId($value)
 * @method static Builder|Event whereContact($value)
 * @method static Builder|Event whereCreatedAt($value)
 * @method static Builder|Event whereDescription($value)
 * @method static Builder|Event whereId($value)
 * @method static Builder|Event whereMaxParticipants($value)
 * @method static Builder|Event whereName($value)
 * @method static Builder|Event wherePrizes($value)
 * @method static Builder|Event whereRegistrationFee($value)
 * @method static Builder|Event whereResources($value)
 * @method static Builder|Event whereRules($value)
 * @method static Builder|Event whereSlug($value)
 * @method static Builder|Event whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'rules', 'prizes', 'resources', 'max_participants', 'registration_fee', 'contact', 'cluster_id'
    ];

    /**
     * Get the announcements for the event.
     *
     * @returns HasMany<Announcement>
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Get the FAQs for the event.
     *
     * @returns HasMany<Faq>
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Get the stages for the event.
     *
     * @returns HasMany<Stage>
     */
    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * Get the sponsors for the event.
     *
     * @returns BelongsToMany<Sponsor>
     */
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class)->using(EventSponsor::class);
    }

    /**
     * Get the teams for the event.
     *
     * @returns BelongsToMany<Team>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)
            ->using(EventTeam::class)
            ->withPivot('stage_id')
            ->withPivot('payment_status')
            ->withPivot('checkout_session');
    }

    /**
     * Get the cluster this event belongs to.
     *
     * @returns BelongsTo<Cluster>
     */
    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class);
    }
}
