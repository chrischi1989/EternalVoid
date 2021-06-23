<?php

namespace EternalVoid\User\UI\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 * @package EternalVoid\User\UI\Web\Requests
 */
class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'present|max:0',
            'username' => 'required|unique:users,username',
            'email'    => 'required|email|unique:users_profiles,email_hashed',
            'planet'   => 'required',
            'race'     => 'required|exists:races,uuid',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function success()
    {
        return redirect()->route('index')->with([
            'success' => 'Dein Benutzerkonto wurde erfolgreich erstellt.',
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function failed()
    {
        return redirect()->route('index')->with([
            'error' => 'Dein Benutzerkonto konnte aufgrund einer technischen Störung nicht erstellt werden.',
        ]);
    }
}
