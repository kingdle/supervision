<?php

namespace App\Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class SocialAuthorizationRequest
 *
 * @package \App\Api\Requests
 */
class SocialAuthorizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'code' => 'required_without:access_token|string',
            'access_token' => 'required_without:code|string',
        ];

        if ($this->social_type == 'weixin' && !$this->code) {
            $rules['openid']  = 'required|string';
        }

        return $rules;
    }
}
