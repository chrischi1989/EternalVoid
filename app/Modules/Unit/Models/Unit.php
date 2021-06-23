<?php

namespace EternalVoid\Unit\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Traits\Who;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 *
 * @property int $id
 * @property string $uuid
 * @property string $planet_uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property int $spy
 * @property int $colonizer
 * @property int $piranha
 * @property int $dolphin
 * @property int $whale
 * @property int $recycler
 * @property int $hornet
 * @property int $scorpion
 * @property int $vulpine
 * @property int $wasp
 * @property int $gator
 * @property int $tiger
 * @property int $orca
 * @property int $grizzly
 * @property int $sabertooth
 * @property int $mammoth
 * @property int $invader
 *
 * @package EternalVoid\Unit\Models
 */
class Unit extends Model
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
    protected $table = 'planets_units';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
