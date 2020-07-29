<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        // 创建一个列名为 ID 的列，内容是用户的 id 字段
        $grid->column('id', __('编号'));
        // 创建一个列名为 用户名 的列，内容是用户的 name 字段。下面的 email() 和 created_at() 同理
        $grid->column('name', __('用户名'));
        $grid->column('email', __('邮箱'));
        $grid->column('email_verified_at', __('已验证邮箱'))->display(
            function ($value) {
                return $value ? '是' : '否';
            }
        );
        $grid->column('created_at', __('注册时间'));

        // 不在页面显示 `新建` 按钮，因为我们不需要在后台新建用户
        $grid->disableCreateButton();
        // 同时在每一行也不显示 `编辑` 按钮
        $grid->disableActions();

        $grid->tools(
            function ($tools) {
                // 禁用批量删除按钮
                $tools->batch(
                    function ($batch) {
                        $batch->disableDelete();
                    }
                );
            }
        );

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('用户名'));
        $show->field('email', __('邮箱'));
        $show->field('email_verified_at', __('已验证邮箱'));
        $show->field('created_at', __('注册时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('用户名'));
        $form->email('email', __('邮箱'));
        $form->datetime('email_verified_at', __('已验证邮箱'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('密码'));
        $form->text('remember_token', __('记住我'));

        return $form;
    }
}
