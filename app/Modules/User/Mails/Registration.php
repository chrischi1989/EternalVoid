<?php

namespace EternalVoid\User\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class Registration
 *
 * @package EternalVoid\User\Mail
 */
class Registration extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var array
     */
    private $user;
    /**
     * @var array
     */
    private $profile;
    /**
     * @var
     */
    private $password;

    /**
     * Registration constructor.
     *
     * @param array $user
     * @param array $profile
     * @param $password
     */
    public function __construct(array $user, array $profile, $password)
    {
        $this->user     = $user;
        $this->profile  = $profile;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mail@eternalvoid.de')->view('user::Mails.registration')->with([
            'user'     => $this->user,
            'profile'  => $this->profile,
            'password' => $this->password,
        ]);
    }
}
