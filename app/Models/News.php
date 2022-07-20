<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $edition_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Edition $edition
 *
 * @method static NewsFactory factory(...$parameters)
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereContent($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereEditionId($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin Eloquent
 */
class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'edition_id',
    ];

    /**
     * Get the edition these news belong to.
     *
     * @returns BelongsTo<Edition>
     */
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }
}
