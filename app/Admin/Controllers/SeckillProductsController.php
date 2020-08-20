<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class SeckillProductsController extends CommonProductsController
{

    /**
     * 获取商品类型
     *
     * @return mixed|string
     */
    public function getProductType()
    {
        return Product::TYPE_SECKILL;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '秒杀商品';

    /**
     * @param Grid $grid
     * @return mixed|void
     */
    protected function customGrid(Grid $grid)
    {
        $grid->id('ID')->sortable();
        $grid->title('商品名称');
        $grid->on_sale('已上架')->display(
            function ($value) {
                return $value ? '是' : '否';
            }
        );
        $grid->price('价格');
        $grid->column('seckill.start_at', '开始时间');
        $grid->column('seckill.end_at', '结束时间');
        $grid->column('sold_count', '销量');
    }

    /**
     * @param Form $form
     * @return mixed|void
     */
    protected function customForm(Form $form)
    {
        // 众筹相关字段
        $form->datetime('seckill.start_at', '秒杀开始时间')->rules('required|date');
        $form->datetime('seckill.end_at', '秒杀结束时间')->rules('required|date');
    }
}
