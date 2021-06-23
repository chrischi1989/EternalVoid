<?php

namespace EternalVoid\Production\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Traits\Who;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Production
 *
 * @property int $id
 * @property string $uuid
 * @property string $planet_uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property int $aluminium
 * @property int $titan
 * @property int $silizium
 * @property int $arsen
 * @property int $wasserstoff
 * @property int $antimaterie
 *
 * @package EternalVoid\Production\Models
 */
class Production extends Model
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
    protected $table = 'planets_production';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
