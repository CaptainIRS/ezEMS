<?php

namespace App\Models;

use Database\Factories\ClusterFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * App\Models\Cluster
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category $category
 * @property-read Collection|Event[] $events
 * @property-read int|null $events_count
 *
 * @method static ClusterFactory factory(...$parameters)
 * @method static Builder|Cluster newModelQuery()
 * @method static Builder|Cluster newQuery()
 * @method static Builder|Cluster query()
 * @method static Builder|Cluster whereCategoryId($value)
 * @method static Builder|Cluster whereCreatedAt($value)
 * @method static Builder|Cluster whereDescription($value)
 * @method static Builder|Cluster whereId($value)
 * @method static Builder|Cluster whereName($value)
 * @method static Builder|Cluster whereSlug($value)
 * @method static Builder|Cluster whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Cluster extends Model
{
    use HasFactory;
    use BelongsToThrough;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'category_id',
    ];

    /**
     * Get the category this cluster belongs to.
     *
     * @returns BelongsTo<Category>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the events that belong to this cluster.
     *
     * @returns HasMany<Event>
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get the edition that this cluster belongs to
     *
     * @returns \Znck\Eloquent\Relations\BelongsToThrough<Edition>
     */
    public function edition(): \Znck\Eloquent\Relations\BelongsToThrough
    {
        return $this->belongsToThrough(Edition::class, Category::class);
    }
}
