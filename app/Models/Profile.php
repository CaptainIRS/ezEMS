<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\College|null $college
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCollegeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePinCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereYearOfStudy($value)
 * @mixin \Eloquent
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
        'college_id'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the college this profile belongs to.
     */
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
