<?php

namespace App\Models;

use Database\Factories\EditionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Carbon;

/**
 * App\Models\Edition
 *
 * @property int $id
 * @property string $year
 * @property string $start_time
 * @property string $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|News[] $news
 * @property-read int|null $news_count
 * @property-read Collection|Sponsor[] $sponsors
 * @property-read int|null $sponsors_count
 *
 * @method static EditionFactory factory(...$parameters)
 * @method static Builder|Edition newModelQuery()
 * @method static Builder|Edition newQuery()
 * @method static Builder|Edition query()
 * @method static Builder|Edition whereCreatedAt($value)
 * @method static Builder|Edition whereEndTime($value)
 * @method static Builder|Edition whereId($value)
 * @method static Builder|Edition whereStartTime($value)
 * @method static Builder|Edition whereUpdatedAt($value)
 * @method static Builder|Edition whereYear($value)
 *
 * @property-read Collection<int, \App\Models\Cluster> $clusters
 * @property-read int|null $clusters_count
 * @mixin Eloquent
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
        'year', 'start_time', 'end_time',
    ];

    /**
     * Get the categories for the edition.
     *
     * @returns HasMany<Category>
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get the news for the edition.
     *
     * @returns HasMany<News>
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get the sponsors for the edition.
     *
     * @returns HasMany<Sponsor>
     */
    public function sponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class);
    }

    /**
     * Get the clusters in this edition.
     *
     * @returns HasManyThrough<Cluster>
     */
    public function clusters(): HasManyThrough
    {
        return $this->hasManyThrough(Cluster::class, Category::class);
    }
}
