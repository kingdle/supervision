<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\ExcelExporter;
use App\Admin\Extensions\Tools\ShowSelected;
use App\Admin\Extensions\Tools\Trashed;
use App\Models\Dept;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('重点工作');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($ID)
    {
        return Admin::content(function (Content $content) use ($ID) {

            $content->header('重点工作');
            $content->description('编辑');

            $content->body($this->form()->edit($ID));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('重点工作');
            $content->description('新建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Post::class, function (Grid $grid) {
            if (request('trashed') == 1) {
                $grid->model()->onlyTrashed();
            }

            $grid->id('ID')->sortable();

            $grid->column('PROJECT_NAME', '一级标题')->ucfirst()->limit(50)->sortable();
            $grid->column('PLAN_NAME', '二级标题')->ucfirst()->limit(50)->sortable();
            $grid->column('BUSINESS_MATTER_NAME', '三级标题')->ucfirst()->limit(50)->sortable();
            $states = [
                'on' => ['value' => 2, 'text' => '是'],
                'off' => ['value' => 0, 'text' => '否'],
            ];
            $grid->column('WORK_STATES', '是否办结')->switch($states);

            $grid->NODE_LEVEL('等级')->display(function ($NODE_LEVEL) {
                $html = "<i class='fa fa-star' style='color:#ff8913'></i>";

                return join('&nbsp;', array_fill(0, min(5, $NODE_LEVEL), $html));
            });

            $grid->PLAN_BEGIN_DATE('开始日期')->display(function ($PLAN_BEGIN_DATE) {
                return str_limit($PLAN_BEGIN_DATE, 10, '');
            })->sortable();
            $grid->PLAN_END_DATE('计划完成日期')->display(function ($PLAN_END_DATE) {
                return str_limit($PLAN_END_DATE, 10, '');
            })->sortable();
            $grid->column('BRANCH_LEADER', '分管领导')->display(function ($BRANCH_LEADER) {
                $username = User::where('USER_ID', $BRANCH_LEADER)->first();
                return $username->USER_NAME;
            });
            $grid->column('DUTY_USER', '责任人')->display(function ($BRANCH_LEADER) {
                $username = User::where('USER_ID', $BRANCH_LEADER)->first();
                return $username->USER_NAME;
            })->sortable();
            $grid->column('UNDER_TAKE_USER', '承办人')->display(function ($BRANCH_LEADER) {
                $username = User::where('USER_ID', $BRANCH_LEADER)->first();
                return $username->USER_NAME;
            })->sortable();
            $grid->column('PRO_PROGRESS', '进展')->ucfirst()->limit(100);


//            $grid->column('float_bar')->floatBar();

//            $grid->rows(function (Grid\Row $row) {
//                if ($row->id % 2) {
//                    $row->setAttributes(['style' => 'color:red;']);
//                }
//            });

            $grid->filter(function (Grid\Filter $filter) {

                $filter->like('PROJECT_ID', '项目ID');

                $filter->like('PROJECT_NAME', '一级标题');
                $filter->like('PLAN_NAME', '二级标题');
                $filter->like('BUSINESS_MATTER_NAME', '三级标题');

                $filter->between('PLAN_BEGIN_DATE', '开始日期')->date();
                $filter->between('PLAN_END_DATE', '计划完成日期')->date();

            });


            $grid->model()->orderBy('PLAN_BEGIN_DATE', 'desc');
            $grid->paginate(15);
            $grid->disableExport();
            $grid->perPages([10, 20, 30, 40, 50, 100]);
            $grid->tools(function ($tools) {
                $tools->batch(function (Grid\Tools\BatchActions $batch) {
                    $batch->add('显示选中项', new ShowSelected());
                });
            });
            $grid->actions(function ($actions) {
                // append一个操作
//                $actions->disableDelete();
//                $actions->disableEdit();
//                $actions->append("<a href='/admin/posts/{$actions->getKey()}/edit'><i class='fa fa-eye'></i></a>");
            });
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Post::class, function (Form $form) {

            $form->display('id', 'ID');

            $states = [
                'on' => ['value' => 2, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ];
            $form->switch('WORK_STATES', '是否办结')->states($states);
            $form->icon('icon', '进度图标');
            $form->multipleImage('images', '图片')->removable();
//            $form->map($latitude, $longitude, $label);
            $form->datetime('release_at', '发布时间')->default(now());
            $form->display('created_at', '创建时间')->default(now());
            $form->display('updated_at', '更新时间')->default(now());
        });
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function users(Request $request)
    {
        $q = $request->get('q');

        return User::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    public function release(Request $request)
    {
        foreach (Post::find($request->get('ids')) as $post) {
            $post->released = $request->get('action');
            $post->save();
        }
    }

    public function restore(Request $request)
    {
        return Post::onlyTrashed()->find($request->get('ids'))->each->restore();
    }
}
