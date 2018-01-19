<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Dept;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Http\Request;

class ScreenController extends Controller {
    public function index()
    {
        $posts = Post::latest('release_at')->paginate(15);
        return view('admin.screen.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.screen.show', compact('posts'));
    }
    public function lists()
    {
        return Admin::content(function (Content $content) {
            $content->header('重点工作督查指挥平台');
            $content->description('勤奋 创新 卓越');

            $content->row(function (Row $row) {

            });
            $content->row(function (Row $row) {
                $lists = Post::latest('release_at');//任务总数
                $finish = Post::latest('release_at')->whereRaw('WORK_STATES != 2');//办理完成
                $lags = Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and PLAN_END_DATE < now()')->paginate(2000000);//进展滞后
                $slows = Post::latest('release_at')->whereRaw('WORK_STATES != 2 and WORK_STATES != 0 and progress=2')->paginate(2000000);//进展缓慢
                $depts = Dept::all('DEPT_NAME','DEPT_ID' );
                $users = User::all('USER_NAME','USER_ID' );
                $row->column(12, view('admin.screen.lists', compact('lists','lags','slows','finish')));
                $row->column(7, view('admin.screen.lists-lag', compact('lags','users','depts')));
                $row->column(5, view('admin.screen.lists-slow', compact('slows','users','depts')));
            });

        });

    }
}
