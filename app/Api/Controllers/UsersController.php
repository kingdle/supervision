<?php

namespace App\Api\Controllers;
use App\Api\Requests\UserRequest;
use App\Api\Transformers\UserTransformer;
use App\Models\User;

/**
 *  * User resource representation.
 *
 * @Resource("User", uri="v1/user")
 */
class UsersController extends BaseController
{
    /**
     * Show all users
     *
     * Get a JSON representation of all the registered users.
     * * @Get("/")
     * * @Versions({"v1"})
     * * @Request("username=&password=", contentType="application/x-www-form-urlencoded")
     * * @Request({"BYNAME": "", "PASSWORD": ""})
     * @Get("/{?page,limit}")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("page", description="The page of results to view.", default=1),
     *      @Parameter("limit", description="The amount of results per page.", default=10)
     * })
     */
    public function index(){
        $users= User::paginate(10);
        if($users->count() == 0){
            return $this->response->errorNotFound('页面不存在');
        }
        return $this->response->paginator($users,new UserTransformer());
    }
    /**
     * Register user
     *
     * Register a new user with a `BYNAME` and `PASSWORD`.
     *
     * @Post("/")
     * @Versions({"v1"})
     * @Request({"BYNAME": "", "PASSWORD": ""}, headers={"X-Custom": "FooBar"})
     * @Response(200, body={"UID": 10, "USER_NAME": "foo"})
     * @Transaction({
     *      @Request({"BYNAME": "foo", "PASSWORD": "bar"}),
     *      @Response(200, body={"id": 10, "username": "foo"}),
     *      @Response(422, body={"error": {"username": {"Username is already taken."}}})
     * })
     */
    public function show($user_id){
        $user =User::where('USER_ID', $user_id)->first();
        if(! $user){
            return $this->response->errorNotFound('用户不存在');
        }
        return $this->item($user,new UserTransformer());
    }

    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        return $this->response->created();
    }
}
