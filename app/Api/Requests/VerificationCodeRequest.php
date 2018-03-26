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
            'captcha_key' => 'required|string',
            'captcha_code' => 'required|string',
        ];
    }
    public function attributes()
    {
        return [
            'captcha_key' => '图片验证码 key',
            'captcha_code' => '图片验证码',
        ];
    }
}
