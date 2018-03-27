<?php

namespace App\Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class UserRequest
 *
 * @package \App\Api\Requests
 */
class FollowersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
