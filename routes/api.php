<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts',function (){
    $posts = App\Models\Post::all();
    return $posts;
})->middleware('api','cors');

Route::get('/post/{id}',function ($id){
    $posts = App\Models\Post::find($id);
    return $posts;
})->middleware('api','cors');


Route::get('work',function(){
    $posts = App\Models\Post::latest('release_at')->paginate(2);
    return json_encode($posts);
});
Route::get('user',function (){
    $users = App\Models\User::get(['USER_ID','USER_NAME','MOBIL_NO']);
    return json_encode($users);
});
Route::get('workChart',function (){
    $lists = App\Models\Post::latest('release_at')->count();//任务总数
    $finish = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and NODE_LEVEL != 3')->count();//办理完成
    $lags = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and NODE_LEVEL != 3 and PLAN_END_DATE < now()')->count();//进展滞后
    $slowly = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and NODE_LEVEL != 3 and progress=2')->count();//进展缓慢
    $workChart = [
        'lists'=>$lists,
        'finish'=>$finish,
        'lags'=>$lags,
        'slowly'=>$slowly
    ];
    return json_encode($workChart);
});

Route::group(['prefix'=>'v1'],function (){
    Route::resource('post','PostController');

});






