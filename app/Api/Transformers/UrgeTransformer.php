<?php

namespace App\Api\Transformers;
use App\Models\Urge;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class UrgeTransformer extends TransformerAbstract
{
    public function transform(Urge $urge){
        return [
            'id'=>$urge['ID'],
            'main_id'=>$urge['MAIN_ID'],//Post主任务ID
            'urge_type'=>$urge['URGE_TYPE'],//提醒类型
            'urge_user'=>$urge['URGE_USER'],//系统提醒用户
            'urge_contents'=>$urge['URGE_CONTENTS'],//提醒内容
            'urge_time'=>$urge['URGE_TIEM'],//提醒日期
        ];
    }
}
