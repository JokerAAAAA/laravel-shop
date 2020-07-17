<?php

namespace App\Admin\Controllers;

use App\Models\CouponCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponCodesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '优惠券';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponCode());

        // 默认按创建时间倒序排序
        $grid->model()->orderBy('created_at', 'DESC');
        $grid->column('id', __('编号'))->sortable();
        $grid->column('name', __('名称'));
        $grid->column('code', __('优惠码'));
        $grid->column('description', __('描述'));
        $grid->column('usage', __('总量'))->display(
            function ($value) {
                return "{$this->used} / {$this->total}";
            }
        );
        $grid->column('enabled', __('是否启动'))->display(
            function ($value) {
                return $value ? '是' : '否';
            }
        );
        $grid->actions(
            function ($actions) {
                $actions->disableView();
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
        $show = new Show(CouponCode::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('code', __('优惠码'));
        $show->field('type', __('类型'))->using(['fixed' => '固定金额', 'percent' => '比例']);
        $show->field('value', __('折扣'));
        $show->field('total', __('总量'));
        $show->field('used', __('用量'));
        $show->field('min_amount', __('最低金额'));
        $show->field('not_before', __('开始时间'));
        $show->field('not_after', __('结束时间'));
        $show->field('enabled', __('启用'));
        $show->field('created_at', __('创建时间'));
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
        $form = new Form(new CouponCode());

        $form->display('id', __('编号'));
        $form->text('name', __('名称'))->rules('required');
        $form->text('code', __('优惠码'))->rules(
            function ($form) {
                // 如果 $form->model()->id 不为空，代表是编辑操作
                if ($id = $form->model()->id) {
                    return 'nullable|unique:coupon_codes,code,'.$id.',id';
                } else {
                    return 'nullable|unique:coupon_codes';
                }
            }
        );
        $form->radio('type', __('类型'))->options(CouponCode::$typeMap)->rules('required')->default(CouponCode::TYPE_FIXED);
        $form->text('value', __('折扣'))->rules(
            function ($form) {
                if (request()->input('type') === CouponCode::TYPE_PERCENT) {
                    // 如果选择了百分比折扣类型，那么折扣范围只能是 1~99
                    return 'required|numeric|between:1,99';
                } else {
                    // 否则只要大于 0.01 即可
                    return 'required|numeric|min:0.01';
                }
            }
        );
        $form->number('total', __('总量'))->rules('required|numeric|min:0');
        $form->text('min_amount', __('最低金额'))->rules('required|numeric|min:0');
        $form->datetime('not_before', __('开始时间'));
        $form->datetime('not_after', __('结束时间'));
        $form->radio('enabled', __('启用'))->options(['1' => '是', '0' => '否']);

        $form->saving(
            function (Form $form) {
                if (!$form->code) {
                    $form->code = CouponCode::findAvailableCode();
                }
            }
        );

        return $form;
    }
}
