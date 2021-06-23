<?php


namespace EternalVoid\User\Actions;


use EternalVoid\User\Tasks\CreateProfileTask;
use EternalVoid\User\Tasks\CreateUserTask;
use EternalVoid\User\Tasks\SendActivationEmailTask;
use EternalVoid\User\UI\Web\Requests\RegisterRequest;
use Exception;
use Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CreateUserSubAction
{
    /**
     * @var CreateUserTask
     */
    private $createUserTask;
    /**
     * @var CreateProfileTask
     */
    private $createProfileTask;
    /**
     * @var SendActivationEmailTask
     */
    private $sendActivationEmailTask;

    /**
     * CreateUserSubAction constructor.
     * @param CreateUserTask $createUserTask
     * @param CreateProfileTask $createProfileTask
     * @param SendActivationEmailTask $sendActivationEmailTask
     */
    public function __construct(
        CreateUserTask $createUserTask,
        CreateProfileTask $createProfileTask,
        SendActivationEmailTask $sendActivationEmailTask
    ) {
        $this->createUserTask          = $createUserTask;
        $this->createProfileTask       = $createProfileTask;
        $this->sendActivationEmailTask = $sendActivationEmailTask;
    }

    /**
     * @param RegisterRequest $request
     * @return array|bool
     * @throws Exception
     */
    public function run(RegisterRequest $request)
    {
        $userUuid     = Uuid::uuid4();
        $userPassword = Str::random();

        $user    = $this->newUser($request, $userUuid, $userPassword);
        $profile = $this->newProfile($request, $userUuid);

        if ($this->createUserTask->run($user) &&
            $this->createProfileTask->run($profile) &&
            $this->sendActivationEmailTask->run($user, $profile, $userPassword)) {

            return [
                'user'    => $user,
                'profile' => $profile
            ];
        }

        return false;
    }

    /**
     * @param RegisterRequest $request
     * @param $userUuid
     * @param $userPassword
     *
     * @return array
     */
    private function newUser(RegisterRequest $request, $userUuid, $userPassword): array
    {
        return [
            'uuid'             => $userUuid,
            'created_uuid'     => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'updated_uuid'     => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'disabled_at'      => now(),
            'disabled_uuid'    => $request->has('disabled') ? $request->user()->uuid : $userUuid,
            'username'         => $request->post('username'),
            'password'         => Hash::make($userPassword),
            'activation_token' => Str::random(20),
            'regip'            => $request->ip(),
            'lastip'           => $request->ip(),
        ];
    }

    /**
     * @param RegisterRequest $request
     * @param $userUuid
     *
     * @return array
     * @throws Exception
     */
    private function newProfile(RegisterRequest $request, $userUuid): array
    {
        return [
            'uuid'            => Uuid::uuid4(),
            'created_uuid'    => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'updated_uuid'    => auth()->check() && $request->user()->isAdmin() ? $request->user()->uuid : $userUuid,
            'race_uuid'       => $request->post('race'),
            'email_hashed'    => hash('sha512', $request->post('email')),
            'email_encrypted' => encrypt($request->post('email')),
        ];
    }
}
