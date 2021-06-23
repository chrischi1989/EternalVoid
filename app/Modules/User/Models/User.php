<?php

namespace EternalVoid\User\Models;

use App\Traits\Uuid;
use Carbon\Carbon;
use App\Traits\Who;
use EternalVoid\Planet\Models\Planet;
use EternalVoid\Research\Models\Research;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Collection;

/**
 * Class User
 *
 * @property int $id
 * @property string $uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property Carbon $disabled_at
 * @property string $disabled_uuid
 * @property Carbon $lastactive_at
 * @property string $username
 * @property string $password
 * @property string $activation_token
 * @property string $remember_token
 * @property string $regip
 * @property string $lastip
 * @property Collection $planets
 * @property Research $research
 * @property Profile $profile
 * @property Planet $currentPlanet
 *
 * @package EternalVoid\User\Models
 */
class User extends Authenticatable
{
    use Who;
    use Uuid;
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'uuid';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return HasMany
     */
    public function planets(): HasMany
    {
        return $this->hasMany(Planet::class, 'settled_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function research(): HasOne
    {
        return $this->hasOne(Research::class, 'created_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'created_uuid', 'uuid');
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return false;
    }
}
