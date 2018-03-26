<?php

namespace App\Api\Transformers;
use App\Models\Image;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 *
 * @package \App\Api\Transformers
 */
class ImageTransformer extends TransformerAbstract
{
    public function transform(Image $image)
    {
        return [
            'id' => $image->id,
            'MAIN_ID' => $image->MAIN_ID,
            'user_id' => $image->user_id,
            'type' => $image->type,
            'filename' => $image->filename,
            'path' => $image->path,
            'created_at' => $image->created_at->toDateTimeString(),
            'updated_at' => $image->updated_at->toDateTimeString(),
        ];
    }
}
