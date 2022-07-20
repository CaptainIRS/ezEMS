<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use JoelButcher\Socialstream\ConnectedAccount as SocialstreamConnectedAccount;
use JoelButcher\Socialstream\Events\ConnectedAccountCreated;
use JoelButcher\Socialstream\Events\ConnectedAccountDeleted;
use JoelButcher\Socialstream\Events\ConnectedAccountUpdated;

/**
 * App\Models\ConnectedAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $name
 * @property string|null $nickname
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $avatar_path
 * @property string $token
 * @property string|null $secret
 * @property string|null $refresh_token
 * @property string|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $user
 *
 * @method static Builder|ConnectedAccount newModelQuery()
 * @method static Builder|ConnectedAccount newQuery()
 * @method static Builder|ConnectedAccount query()
 * @method static Builder|ConnectedAccount whereAvatarPath($value)
 * @method static Builder|ConnectedAccount whereCreatedAt($value)
 * @method static Builder|ConnectedAccount whereEmail($value)
 * @method static Builder|ConnectedAccount whereExpiresAt($value)
 * @method static Builder|ConnectedAccount whereId($value)
 * @method static Builder|ConnectedAccount whereName($value)
 * @method static Builder|ConnectedAccount whereNickname($value)
 * @method static Builder|ConnectedAccount whereProvider($value)
 * @method static Builder|ConnectedAccount whereProviderId($value)
 * @method static Builder|ConnectedAccount whereRefreshToken($value)
 * @method static Builder|ConnectedAccount whereSecret($value)
 * @method static Builder|ConnectedAccount whereTelephone($value)
 * @method static Builder|ConnectedAccount whereToken($value)
 * @method static Builder|ConnectedAccount whereUpdatedAt($value)
 * @method static Builder|ConnectedAccount whereUserId($value)
 * @mixin Eloquent
 */
class ConnectedAccount extends SocialstreamConnectedAccount
{
    use HasFactory;
    use HasTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider',
        'provider_id',
        'name',
        'nickname',
        'email',
        'avatar_path',
        'token',
        'refresh_token',
        'expires_at',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ConnectedAccountCreated::class,
        'updated' => ConnectedAccountUpdated::class,
        'deleted' => ConnectedAccountDeleted::class,
    ];
}
