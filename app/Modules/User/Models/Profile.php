<?php

namespace EternalVoid\User\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use App\Traits\Who;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 *
 * @property int $id
 * @property string $uuid
 * @property Carbon $created_at
 * @property string $created_uuid
 * @property Carbon $updated_at
 * @property string $updated_uuid
 * @property string $race_uuid
 * @property string $alliance_uuid
 * @property string $alliance_rank_uuid
 * @property string $email_hashed
 * @property string $email_encrypted
 * @property boolean $planetimages
 *
 * @package EternalVoid\User\Models
 */
class Profile extends Model
{
    use Uuid;
    use Who;

    /**
     * @var string
     */
    protected $table = 'users_profiles';
    protected $primaryKey = 'uuid';
}
