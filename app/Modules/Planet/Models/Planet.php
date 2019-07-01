<?php

namespace EternalVoid\Modules\Planet\Models;

use Carbon\Carbon;
use EternalVoid\Modules\Building\Models\Building;
use EternalVoid\Modules\Defense\Models\Defense;
use EternalVoid\Modules\Production\Models\Production;
use EternalVoid\Modules\Resources\Models\Resource;
use EternalVoid\Modules\Unit\Models\Unit;
use EternalVoid\Modules\User\Models\User;
use EternalVoid\Traits\Uuids;
use EternalVoid\Traits\Who;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Planet
 *
 * @property int $id
 * @property string $uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property User $created_by
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property User $updated_by
 * @property Carbon $settled_at
 * @property string $settled_uuid
 * @property User $settled_by
 * @property int $galaxy
 * @property int $system
 * @property int $position
 * @property string $planetname
 * @property int $temp_min
 * @property int $temp_max
 * @property int $diameter
 * @property int $image
 * @property int $bonus
 * @property Building $buildings
 * @property Production $production
 * @property Resource $resources
 * @property Defense $defenses
 * @property Unit $units
 * @property User $user
 *
 * @package EternalVoid\Modules\Planet\Models
 */
class Planet extends Model
{
    use Uuids;
    use Who;
    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string
     */
    protected $table = 'planets';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * @return HasOne
     */
    public function buildings(): HasOne
    {
        return $this->hasOne(Building::class, 'planet_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function production(): HasOne
    {
        return $this->hasOne(Production::class, 'planet_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function resources(): HasOne
    {
        return $this->hasOne(Resource::class, 'planet_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function defense(): HasOne
    {
        return $this->hasOne(Defense::class, 'planet_uuid', 'uuid');
    }

    /**
     * @return HasOne
     */
    public function units(): HasOne
    {
        return $this->hasOne(Unit::class, 'planet_uuid', 'uuid');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'settled_uuid', 'uuid');
    }
}
