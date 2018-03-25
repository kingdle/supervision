<?php

namespace App\Api\Requests;
use Dingo\Api\Http\FormRequest;
/**
 * Class VerificationCodeRequest
 *
 * @package \App\Api\Requests
 */
class VerificationCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required|regex:/^1[34578]\d{9}$/|unique:users',
        ];
    }
}
