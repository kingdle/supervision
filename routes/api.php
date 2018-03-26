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
    $lists = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES != 0')->count();//任务总数
    $normal = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES = 1 and PLAN_END_DATE >= now()')->count();//进展正常
    $finish = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES = 2')->count();//办理完成
    $lags = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES = 1 and PLAN_END_DATE < now()')->count();//进展滞后
    $slowly = App\Models\Post::latest('release_at')->whereRaw('WORK_STATES = 4')->count();//延期
    $workChart = [
        'lists' => $lists,
        'normal' => $normal,
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

        //进展
        $api->get('v1/news', 'NewsController@index');
        $api->get('v1/news/{main_id}', 'NewsController@show');
        $api->post('v1/news', 'NewsController@store');

        //问题、办结、延期
        $api->get('v1/matter', 'MattersController@index');
        $api->get('v1/matter/{main_id}', 'MattersController@show');
        $api->post('v1/matter', 'MattersController@store');

        //流转表
        $api->get('v1/flow', 'FlowsController@index');
        $api->get('v1/flow/{user_id}', 'FlowsController@show');
        $api->post('v1/flow', 'FlowsController@store');

        // 图片资源
        $api->get('v1/images', 'ImagesController@index');
        $api->get('v1/images/{user_id}', 'ImagesController@show');
        $api->post('images', 'ImagesController@store')
            ->name('api.images.store');

        //关注表
        $api->get('v1/follower', 'FollowersController@index');
        $api->get('v1/follower/{id}', 'FollowersController@show');

        $api->get('v1/sort', 'SortsController@index');
        $api->get('v1/sort/{id}', 'SortsController@show');
        $api->get('v1/user', 'UsersController@index');
        $api->get('v1/user/{user_id}', 'UsersController@show');
        $api->get('v1/dept', 'DeptsController@index');
        $api->get('v1/dept/{dept_id}', 'DeptsController@show');
        $api->get('v1/escalation', 'EscalationsController@index');
        $api->get('v1/escalation/{main_id}', 'EscalationsController@show');
        $api->get('v1/duty', 'DutiesController@index');
        $api->get('v1/duty/{main_id}', 'DutiesController@show');
        $api->get('v1/leader', 'LeadersController@index');
        $api->get('v1/leader/{main_id}', 'LeadersController@show');
        $api->get('v1/over', 'OversController@index');
        $api->get('v1/over/{main_id}', 'OversController@show');
        $api->get('v1/urge', 'UrgesController@index');
        $api->get('v1/urge/{main_id}', 'UrgesController@show');

        // 短信验证码
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCodes.store');
        // 用户注册
        $api->post('users', 'UsersController@store')
            ->name('api.users.store');
        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');


        // 第三方登录
        $api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
            ->name('api.socials.authorizations.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
        // 删除token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');
    });
});




