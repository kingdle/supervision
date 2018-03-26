<?php

namespace App\Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class UserRequest
 *
 * @package \App\Api\Requests
 */
class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'C_PROCESS' => 'required|string',
            'MAIN_ID' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'content' => '进展提报错误',
            'main_id' => '主任务ID错误',
        ];
    }
}
