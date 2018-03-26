<?php

namespace App\Api\Transformers;

use App\Models\Flow;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class FlowTransformer extends TransformerAbstract
{
    public function transform(Flow $flow)
    {
        return [
            'id'=>$flow['id'],
            'matter_id'=>$flow['matter_id'],
            'work_states'=>$flow['work_states'],
            'duty_user'=>$flow['duty_user'],
            'content'=>$flow['content'],
            'reply_time'=>$flow['reply_time'],
            'reply_user'=>$flow['reply_user'],
            'project_id'=>$flow['project_id'],
            'plan_id'=>$flow['plan_id'],
            'sort_id'=>$flow['sort_id'],
            'source1'=>$flow['source1'],
            'source2'=>$flow['source2'],
            'source3'=>$flow['source3'],
            'source4'=>$flow['source4'],
            'main_id'=>$flow['main_id'],
            'created_at'=>$flow['created_at'],
            'updated_at'=>$flow['updated_at'],
        ];
    }
}
