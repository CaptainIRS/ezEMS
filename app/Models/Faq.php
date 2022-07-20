<?php

namespace App\Models;

use Database\Factories\FaqFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Faq
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $event_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Event $event
 *
 * @method static FaqFactory factory(...$parameters)
 * @method static Builder|Faq newModelQuery()
 * @method static Builder|Faq newQuery()
 * @method static Builder|Faq query()
 * @method static Builder|Faq whereAnswer($value)
 * @method static Builder|Faq whereCreatedAt($value)
 * @method static Builder|Faq whereEventId($value)
 * @method static Builder|Faq whereId($value)
 * @method static Builder|Faq whereQuestion($value)
 * @method static Builder|Faq whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'answer', 'event_id',
    ];

    /**
     * Get the event these FAQs belong to.
     *
     * @returns BelongsTo<Event>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
