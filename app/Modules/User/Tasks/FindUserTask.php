<?php

namespace EternalVoid\User\Tasks;

use EternalVoid\User\Models\User;

class FindUserTask
{
    private $user;

    /**
     * FindUserTask constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function run(): User
    {
        return $this->user->get()->first();
    }

    /**
     * @param $username
     *
     * @return User
     */
    public function byUsername($username): User
    {
        $this->user->where('username', $username);

        return $this->run();
    }
}
