<?php

namespace App\Api\Transformers;
use App\Models\Duty;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class DutyTransformer extends TransformerAbstract
{
    public function transform(Duty $duty){
        return [
            'id'=>$duty['ID'],
            'main_id'=>$duty['MAIN_ID'],//Post主任务ID
            'feedback_time'=>$duty['FEED_BACK_TIME'],//最新反馈时间
            'feedback_content'=>$duty['FEED_BACK_CONTENT'],//最新反馈内容
            'feedback_plan'=>$duty['FEED_BACK_PLAN'],//最新反馈计划
            'feedback_user'=>$duty['FEED_USER'],//反馈人
            'to_user'=>$duty['FEED_TO_USER'],//推送人
            'attachment_id'=>$duty['ATTACTMENT_ID'],//附件id
            'attachment_name'=>$duty['ATTACTMENT_NAME'],//附件名称
            'end_date'=>$duty['PLAN_END_DATE'],//计划完成日期
        ];
    }
}
