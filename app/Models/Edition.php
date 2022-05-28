<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Edition
 *
 * @property int $id
 * @property string $year
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\News[] $news
 * @property-read int|null $news_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sponsor[] $sponsors
 * @property-read int|null $sponsors_count
 * @method static \Database\Factories\EditionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Edition whereYear($value)
 * @mixin \Eloquent
 */
class Edition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'start_time', 'end_time'
    ];

    /**
     * Get the categories for the edition.
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the news for the edition.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get the sponsors for the edition.
     */
    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }

    /**
     * Get the clusters in this edition.
     */
    public function clusters()
    {
        return $this->hasManyThrough(Cluster::class, Category::class);
    }
}
