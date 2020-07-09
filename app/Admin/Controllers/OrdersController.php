<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        // 只展示已支付的订单，并且默认按支付时间倒序排序
        $grid->model()->whereNotNull('paid_at')->orderBy('paid_at', 'DESC');
        $grid->column('id', __('编号'));
        $grid->column('no', __('订单流水号'));
        $grid->column('user.name', __('卖家'));
        $grid->column('total_amount', __('总金额'))->sortable();
        $grid->column('paid_at', __('支付时间'));
        $grid->column('ship_status', __('物流'))->display(
            function ($value) {
                return Order::$shipStatusMap[$value];
            }
        );
        $grid->column('refund_status', __('退款状态'))->display(
            function ($value) {
                return Order::$refundStatusMap[$value];
            }
        );
        // 禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(
            function ($actions) {
                // 禁用删除和编辑按钮
                $actions->disableDelete();
                $actions->disableEdit();
            }
        );
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
     * 订单详情
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('查看订单')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view('admin.orders.show', ['order' => Order::find($id)]));
    }
}
