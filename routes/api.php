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

Route::get('work', function () {
    $posts = App\Models\Post::latest('release_at')->paginate(2);
    return json_encode($posts);
});
Route::get('user', function () {
    $users = App\Models\User::get(['USER_ID', 'USER_NAME', 'MOBIL_NO']);
    return json_encode($users);
});
Route::get('workChart', function () {
    $lists = App\Models\Post::latest('release_at')->count();//任务总数
    $finish = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and NODE_LEVEL != 3')->count();//办理完成
    $lags = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and NODE_LEVEL != 3 and PLAN_END_DATE < now()')->count();//进展滞后
    $slowly = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and NODE_LEVEL != 3 and progress=2')->count();//进展缓慢
    $workChart = [
        'lists' => $lists,
        'finish' => $finish,
        'lags' => $lags,
        'slowly' => $slowly
    ];
    return json_encode($workChart);
});

//Route::group(['prefix'=>'v1'],function (){
//    Route::resource('post','PostController');
//
//});
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->get('v1/post', 'PostsController@index');
        $api->get('v1/post/{id}', 'PostsController@show');
        $api->get('v1/sort', 'SortsController@index');
        $api->get('v1/sort/{id}', 'SortsController@show');
        $api->get('v1/user', 'UsersController@index');
        $api->get('v1/user/{user_id}', 'UsersController@show');
        $api->get('v1/dept', 'DeptsController@index');
        $api->get('v1/dept/{dept_id}', 'DeptsController@show');
        $api->get('v1/flow', 'FlowsController@index');
        $api->get('v1/flow/{user_id}', 'FlowsController@show');
        $api->get('v1/follower', 'FollowersController@index');
        $api->get('v1/follower/{id}', 'FollowersController@show');
        $api->get('v1/escalation', 'EscalationsController@index');
        $api->get('v1/escalation/{main_id}', 'EscalationsController@show');
        $api->get('v1/duty', 'DutiesController@index');
        $api->get('v1/duty/{main_id}', 'DutiesController@show');
        $api->get('v1/leader', 'LeadersController@index');
        $api->get('v1/leader/{main_id}', 'LeadersController@show');
        $api->get('v1/message', 'MessagesController@index');
        $api->get('v1/message/{main_id}', 'MessagesController@show');
        $api->get('v1/extension', 'ExtensionsController@index');
        $api->get('v1/extension/{main_id}', 'ExtensionsController@show');
        $api->get('v1/urge', 'UrgesController@index');
        $api->get('v1/urge/{main_id}', 'UrgesController@show');
    });
});




