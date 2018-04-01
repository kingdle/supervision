<?php

namespace App\Api\Controllers;

use App\Api\Requests\NewsRequest;
use App\Api\Transformers\NewTransformer;
use App\Models\News;
use App\Models\Post;
use Dingo\Api\Contract\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class FlowsController
 *
 * @package \App\Api\Controllers
 */
class NewsController extends BaseController
{
    public function index()
    {
        $news = News::paginate(10);
        if ($news->count() == 0) {
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($news, new NewTransformer());
    }

    public function show($main_id)
    {
        $news = News::where('MAIN_ID', $main_id)->paginate(10);
        if ($news->count() == 0) {
            return $this->response->errorNotFound('消息不存在');
        }
        return $this->response->paginator($news, new NewTransformer());

    }

    public function store(Request $request, News $news)
    {
        $news->fill($request->all());
        $news->C_TIME=now();


//        $file = $request->file('images');
//        $filePath = [];
//        if($file){
//            foreach ($file as $key => $value) {
//                if (!$value->isValid()) {
//                    return $this->response->errorNotFound('图片上传失败，请重试');
//                }
//                if (!empty($value)) {
//                    $allowed_extensions = ["png", "jpg", "jpeg", "gif"];
//                    if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
//                        return $this->response->errorNotFound('您只能上传PNG、JPG或GIF格式的图片！');
//                    }
//                    $destinationPath = '/uploads/images/project/' . date("Ym", time()) . '/' . date("d", time());
//                    $extension = $value->getClientOriginalExtension();
//                    $fileName = date('YmdHis') . mt_rand(100, 999) . '.' . $extension;
//                    $value->move(public_path() . $destinationPath, $fileName);
//                    $filePath[] = $destinationPath . '/' . $fileName;
//
//                }
//            }
//        }
//
//        $news->images = json_encode($filePath);

        Post::where('id', '=', $request->MAIN_ID)->update(['images' => $request->images, 'PRO_PROGRESS' => $request->C_PROCESS, 'news_at' => now()]);
        $news->save();

        return $this->response->item($news, new NewTransformer())->setStatusCode(201);

        // 返回上传图片路径，用于保存到数据库中

//        单图上传写法
//        $file = $request->images;
//        $folder_name = "uploads/images/project/" . date("Ym", time()) . '/'.date("d", time()).'/';
//        $filename= time().str_random(10).'.'.$file->getClientOriginalExtension();
//        $file->move(public_path($folder_name),$filename);
//        $images=$folder_name.$filename;
    }

}
