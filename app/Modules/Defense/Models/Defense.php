<?php

namespace EternalVoid\Defense\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Traits\Who;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Defense
 *
 * @property int $id
 * @property string $uuid
 * @property string $planet_uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property int $raketenstellung
 * @property int $lasergeschuetz
 * @property int $plasmawerfer
 * @property int $phasenemitter
 * @property int $flak
 *
 * @package EternalVoid\Defense\Models
 */
class Defense extends Model
{
    use Uuid;
    use Who;
    /**
     * @var string
     */
    public $keyType = 'string';
    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string
     */
    protected $table = 'planets_defenses';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
