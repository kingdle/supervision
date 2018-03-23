<?php

namespace App\Api\Transformers;
use App\Models\Message;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class MessageTransformer extends TransformerAbstract
{
    public function transform(Message $message){
        return [
            'id'=>$message['ID'],
            'main_id'=>$message['MAIN_ID'],//Post主任务ID
            'user_id'=>$message['C_USER_ID'],//提报用户名
            'feedback_content'=>$message['C_PROCESS'],//最新反馈内容
            'feedback_plan'=>$message['C_PLAN'],//最新反馈计划
            'to_user_id'=>$message['TO_USER_ID'],//推送用户名
            'feedback_time'=>$message['C_TIME'],//反馈时间
            'user_state'=>$message['C_USER_STATE'],//自己推送自己的标识0推送责任人，1责任人自己给自己发信
        ];
    }
}
