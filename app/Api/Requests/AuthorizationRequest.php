<?php

namespace App\Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class AuthorizationRequest
 *
 * @package \App\Api\Requests
 */
class AuthorizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }
}
