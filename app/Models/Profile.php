<?php

namespace App\Models;

use Database\Factories\ProfileFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string|null $gender
 * @property string|null $nationality
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $pin_code
 * @property string|null $contact_number
 * @property string|null $degree
 * @property string|null $year_of_study
 * @property int $user_id
 * @property int|null $college_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read College|null $college
 * @property-read User $user
 *
 * @method static ProfileFactory factory(...$parameters)
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereAddress($value)
 * @method static Builder|Profile whereCity($value)
 * @method static Builder|Profile whereCollegeId($value)
 * @method static Builder|Profile whereContactNumber($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereDegree($value)
 * @method static Builder|Profile whereGender($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereNationality($value)
 * @method static Builder|Profile wherePinCode($value)
 * @method static Builder|Profile whereState($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereUserId($value)
 * @method static Builder|Profile whereYearOfStudy($value)
 * @mixin Eloquent
 */
class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender',
        'nationality',
        'address',
        'city',
        'state',
        'pin_code',
        'contact_number',
        'degree',
        'year_of_study',
        'user_id',
        'college_id',
    ];

    /**
     * Get the user that owns the profile.
     *
     * @returns BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the college this profile belongs to.
     *
     * @returns BelongsTo<College>
     */
    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }
}
