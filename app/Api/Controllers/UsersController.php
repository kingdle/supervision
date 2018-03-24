<?php

namespace App\Api\Controllers;
use App\Api\Transformers\UserTransformer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
}
