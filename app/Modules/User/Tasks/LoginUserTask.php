<?php

namespace EternalVoid\Modules\User\Tasks;

class LoginUserTask
{
    /**
     * @param $credentials
     *
     * @return bool
     */
    public function run($credentials): bool
    {
        return auth()->attempt($credentials);
    }
}