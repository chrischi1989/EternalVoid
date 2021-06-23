<?php

namespace EternalVoid\User\Tasks;

use EternalVoid\User\Models\User;

/**
 * Class CreateUserTask
 *
 * @package EternalVoid\User\Tasks
 */
class CreateUserTask
{
    /**
     * @var User
     */
    private $user;

    /**
     * CreateUserTask constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $user
     *
     * @return bool
     */
    public function run(array $user): bool
    {
        $this->user->uuid             = $user['uuid'];
        $this->user->created_uuid     = $user['created_uuid'];
        $this->user->updated_uuid     = $user['updated_uuid'];
        $this->user->disabled_at      = $user['disabled_at'];
        $this->user->disabled_uuid    = $user['disabled_uuid'];
        $this->user->username         = $user['username'];
        $this->user->password         = $user['password'];
        $this->user->activation_token = $user['activation_token'];
        $this->user->regip            = $user['regip'];
        $this->user->lastip           = $user['lastip'];

        return $this->user->save();
    }
}
