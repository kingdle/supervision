<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\Api\Requests\ImageRequest;
use App\Api\Transformers\ImageTransformer;
use App\Handlers\ImageUploadHandler;
use App\Models\Image;

/**
 *  * User resource representation.
 *
 * @Resource("Images", uri="v1/iamges")
 */
class ImagesController extends BaseController
{
    public function index()
    {
        $images = Image::paginate(10);
        if ($images->count() == 0) {
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($images, new ImageTransformer());
    }

    public function show($main_id)
    {
        $images = Image::where('MAIN_ID', $main_id)->paginate(10);
        if ($images->count() == 0) {
            return $this->response->errorNotFound('图片不存在');
        }
        return $this->response->paginator($images, new ImageTransformer());

    }
    public function store(ImageRequest $request)
    {
        $file = $request->image;
        $folder_name = "uploads/images/project/" . date("Ym", time()) . '/'.date("d", time()).'/';
//        $size = $request->type == 'avatar' ? 362 : 1024;
        $filename= time().str_random(10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path($folder_name),$filename);
//        $result = $uploader->save($request->image, str_plural($request->type), $MAIN_ID, $size);
        $image = new Image();
        $image->filename= $file->getClientOriginalName();
        $image->path = $folder_name.$filename;
        $image->type = $file->getClientOriginalExtension();
        $image->MAIN_ID= $request->MAIN_ID;
        $image->user_id= $request->user_id;
        $image->save();

        return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }
}

