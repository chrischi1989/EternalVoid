<?php

namespace EternalVoid\Modules\User\Models;

use Carbon\Carbon;
use EternalVoid\Traits\Who;
use EternalVoid\Modules\Planet\Models\Planet;
use EternalVoid\Modules\Research\Models\Research;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
 * @package EternalVoid\Modules\User\Models
 */
class User extends Authenticatable
{
    use Who;
    use Notifiable;
    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * @var string
     */
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