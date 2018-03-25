<?php

namespace App\Api\Transformers;
use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 *
 * @package \App\Api\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id'=>$user['UID'],
            'user_id'=>$user['USER_ID'],//用户名
            'user_name'=>$user['USER_NAME'],//姓名
            'mobil_no'=>$user['MOBIL_NO'],//手机号
            'email'=>$user['EMAIL'],//邮箱
            'dept_id'=>$user['DEPT_ID'],//部门id
            'user_priv'=>$user['USER_PRIV'],//角色ID
            'user_priv_name'=>$user['USER_PRIV_NAME']//角色名称
        ];
    }
}
