<?php

namespace EternalVoid\Race\Models;

use App\Traits\Uuid;
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
 * @package EternalVoid\Race\Models
 */
class Race extends Model
{
    use Uuid;
    /**
     * @var string
     */
    protected $table = 'races';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
