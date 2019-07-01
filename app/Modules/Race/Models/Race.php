<?php

namespace EternalVoid\Modules\Race\Models;

use EternalVoid\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Race
 *
 * @property int $id
 * @property string $uuid
 * @property string $racename
 * @property string $racetext
 * @property string $racebonus
 *
 * @package EternalVoid\Modules\Race\Models
 */
class Race extends Model
{
    use Uuids;
    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string
     */
    protected $table = 'races';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}