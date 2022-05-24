<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Announcement[] $announcements
 * @property-read int|null $announcements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq[] $faqs
 * @property-read int|null $faqs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sponsor[] $sponsors
 * @property-read int|null $sponsors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stage[] $stages
 * @property-read int|null $stages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereMaxParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePrizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRegistrationFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereResources($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;

    /**
     * Get the announcements for the event.
     */
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Get the FAQs for the event.
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Get the payments for the event.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the stages for the event.
     */
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * Get the sponsors for the event.
     */
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class)->using(EventSponsor::class);
    }

    /**
     * Get the teams for the event.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class)->using(EventTeam::class);
    }
}
