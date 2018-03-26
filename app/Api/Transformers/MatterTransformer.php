<?php

namespace App\Api\Transformers;
use App\Models\Matter;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class MatterTransformer extends TransformerAbstract
{
    public function transform(Matter $matter){
        return [
            'id'=>$matter['ID'],
            'main_id'=>$matter['MAIN_ID'],
            'sort_name'=>$matter['MAIN_NAME'],
            'type'=>$matter['SQ_TYPE'],
            'state'=>$matter['SQ_STATE'],
            'user_id'=>$matter['USER_ID'],
            'prcs_id'=>$matter['PRCS_ID'],
            'prcs_time'=>$matter['PRCS_TIME'],
            'extension_time'=>$matter['EXTENSION_TIME'],
            'over_time'=>$matter['over_time'],
            'deliver_time'=>$matter['DELIVER_TIME'],
            'content'=>$matter['CONTENT'],
            'gis'=>$matter['gis'],
            'files'=>$matter['files'],
            'images'=>$matter['images'],
            'videos'=>$matter['videos'],
            'created_at'=>$matter['create_at'],
            'updated_at'=>$matter['update_at'],
        ];
    }
}
