<?php

namespace EternalVoid\Modules\User\Tasks;

use EternalVoid\Modules\User\Mails\Registration;
use Mail;

/**
 * Class SendActivationEmailTask
 *
 * @package EternalVoid\Modules\User\Tasks
 */
class SendActivationEmailTask
{
    /**
     * @param array $user
     * @param array $profile
     * @param $userPassword
     *
     * @return bool
     */
    public function run(array $user, array $profile, $userPassword): bool
    {
        Mail::to(decrypt($profile['email_encrypted']))->send(new Registration($user, $profile, $userPassword));

        return true;
    }
}