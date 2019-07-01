<?php

namespace EternalVoid\Modules\User\Tasks;

use EternalVoid\Modules\User\Models\Profile;

class CreateProfile
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function run($profile)
    {
        $this->profile->uuid            = $profile['uuid'];
        $this->profile->created_uuid    = $profile['created_uuid'];
        $this->profile->updated_uuid    = $profile['updated_uuid'];
        $this->profile->race_uuid       = $profile['race_uuid'];
        $this->profile->email_hashed    = $profile['email_hashed'];
        $this->profile->email_encrypted = $profile['email_encrypted'];

        return $this->profile->save();
    }
}