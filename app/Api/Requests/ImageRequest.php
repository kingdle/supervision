<?php

namespace App\Api\Requests;

use Dingo\Api\Http\FormRequest;

/**
 * Class UserRequest
 *
 * @package \App\Api\Requests
 */
class ImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules = [
            'MAIN_ID' => 'required|string',
            'user_id' => 'required|string',
        ];

//        if ($this->type == 'avatar') {
//            $rules['image'] = 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200';
//        } else {
//            $rules['image'] = 'mimes:jpeg,bmp,png,gif';
//        }

        return $rules;
    }

    public function messages()
    {
        return [
            'MAIN_ID.dimensions' => '项目ID不能为空',
            'user_id.dimensions' => '用户不能为空',

        ];
    }
}
