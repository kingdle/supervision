<?php

namespace App\Api\Transformers;
use App\Models\Leader;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class LeaderTransformer extends TransformerAbstract
{
    public function transform(Leader $leader){
        return [
            'id'=>$leader['ID'],
            'main_id'=>$leader['MAIN_ID'],//Post主任务ID
            'reply_time'=>$leader['REPLY_TIME'],//批示时间
            'reply_user'=>$leader['PEPLY_USER'],//批示用户名
            'reply_content'=>$leader['REPLAY_CONTENTS'],//批示内容
            'from_meeting'=>$leader['FROM_MEETING'],//会议名
            'meeting_time'=>$leader['MEETING_TIME'],//会议时间
            'reply_to_user'=>$leader['PEPLY_TO_USER'],//推送用户名
        ];
    }
}
