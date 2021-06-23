<?php

namespace EternalVoid\User\Tasks;

use EternalVoid\User\Models\Profile;

/**
 * Class CreateProfileTask
 *
 * @package EternalVoid\User\Tasks
 */
class CreateProfileTask
{
    /**
     * @var Profile
     */
    private $profile;

    /**
     * CreateProfileTask constructor.
     *
     * @param Profile $profile
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @param array $profile
     *
     * @return bool
     */
    public function run(array $profile): bool
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
