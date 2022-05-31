<?php

namespace App\Models;

use Database\Factories\AnnouncementFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Announcement
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $event_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Event $event
 * @method static AnnouncementFactory factory(...$parameters)
 * @method static Builder|Announcement newModelQuery()
 * @method static Builder|Announcement newQuery()
 * @method static Builder|Announcement query()
 * @method static Builder|Announcement whereContent($value)
 * @method static Builder|Announcement whereCreatedAt($value)
 * @method static Builder|Announcement whereEventId($value)
 * @method static Builder|Announcement whereId($value)
 * @method static Builder|Announcement whereTitle($value)
 * @method static Builder|Announcement whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Announcement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'event_id'
    ];

    /**
     * Get the event that owns the announcement.
     *
     * @returns BelongsTo<Event>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
