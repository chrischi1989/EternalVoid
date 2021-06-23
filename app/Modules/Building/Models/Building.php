<?php

namespace EternalVoid\Building\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Traits\Who;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 *
 * @property int $id
 * @property string $uuid
 * @property string $planet_uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property int $aluminiummine
 * @property int $titanfertigung
 * @property int $siliziummine
 * @property int $arsenfertigung
 * @property int $wasserstofffabrik
 * @property int $antimateriefabrik
 * @property int $lager
 * @property int $speziallager
 * @property int $tanks
 * @property int $bunker
 * @property int $schiffswerft
 * @property int $raumhafen
 * @property int $sternenbasis
 * @property int $flottenkommando
 * @property int $planetarer_schild
 * @property int $kommandozentrale
 * @property int $forschungszentrum
 * @property int $handelsboerse
 * @property int $schiffsboerse
 *
 * @package EternalVoid\Building\Models
 */
class Building extends Model
{
    use Who;
    use Uuid;
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
    protected $table = 'planets_buildings';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
