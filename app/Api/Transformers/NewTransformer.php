<?php

namespace App\Api\Transformers;
use App\Models\News;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class NewTransformer extends TransformerAbstract
{
    public function transform(News $news){
        return [
            'id'=>$news['ID'],
            'main_id'=>$news['MAIN_ID'],
            'user_id'=>$news['C_USER_ID'],
            'content'=>$news['C_PROCESS'],
            'plan'=>$news['C_PLAN'],
            'to_user_id'=>$news['TO_USER_ID'],
            'feedback_time'=>$news['C_TIME'],
            'user_state'=>$news['C_USER_STATE'],
            'role_type'=>$news['role_type'],
            'images'=>$news['images'],
            'videos'=>$news['videos'],
            'create_at'=>$news['create_at'],
            'update_at'=>$news['update_at'],
            'source1'=>$news['source1'],
            'source2'=>$news['source2'],
            'source3'=>$news['source3'],
            'source4'=>$news['source4'],
        ];
    }
}
