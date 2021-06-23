<?php

namespace EternalVoid\Events\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Uuid;

    /**
     * @var string
     */
    protected $table = 'events';
    /**
     * @var string
     */
    protected $primaryKey = 'uuid';
}
