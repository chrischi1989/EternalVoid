<?php

namespace EternalVoid\User\UI\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package EternalVoid\User\UI\Web\Requests
 */
class LoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Bitte gebe deinen Benutzername ein!',
            'password.required' => 'Bitte gebe dein Passwort ein!',
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function success()
    {
        return redirect()->route('planet');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function failed()
    {
        return redirect()->route('index')->with([
            'error' => 'Unbekannter Nutzer',
        ]);
    }
}
