<?php

namespace App\Api\Transformers;
use App\Models\Follower;
use App\Models\Sort;
use League\Fractal\TransformerAbstract;

/**
 * Class SortTransformer
 *
 * @package \App\Api\Transformer
 */
class FollowerTransformer extends TransformerAbstract
{
    public function transform(Follower $follower){
        return [
            'id'=>$follower['id'],
            'user_id'=>$follower['USER_ID'],//关注人
            'project_id'=>$follower['PROJECT_ID'],//关注项目
            'project'=>Sort::find($follower['PROJECT_ID']),
            'created_at'=>$follower['created_at'],//
            'updated_at'=>$follower['updated_at'],//
        ];
    }
}
