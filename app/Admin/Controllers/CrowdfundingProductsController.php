<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\CrowdfundingProduct;
use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CrowdfundingProductsController extends CommonProductsController
{
    /**
     * 获取商品类型
     *
     * @return mixed|string
     */
    public function getProductType()
    {
        return Product::TYPE_CROWDFUNDING;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '众筹商品';

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('type', __('类型'));
        $show->field('category_id', __('类目'));
        $show->field('title', __('商品名称'));
        $show->field('description', __('商品描述'));
        $show->field('image', __('封面图片'))->image();
        $show->field('on_sale', __('上架'));
        $show->field('crowdfunding.target_amount', __('众筹目标金额'));
        $show->field('crowdfunding.end_at', __('众筹结束时间'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

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
        $grid->column('crowdfunding.target_amount', '目标金额');
        $grid->column('crowdfunding.end_at', '结束时间');
        $grid->column('crowdfunding.total_amount', '目前金额');
        $grid->column('crowdfunding.status', ' 状态')->display(
            function ($value) {
                return CrowdfundingProduct::$statusMap[$value];
            }
        );
    }

    /**
     * @param Form $form
     * @return mixed|void
     */
    protected function customForm(Form $form)
    {
        // 众筹相关字段
        $form->text('crowdfunding.target_amount', '众筹目标金额')->rules('required|numeric|min:0.01');
        $form->datetime('crowdfunding.end_at', '众筹结束时间')->rules('required|date');
    }
}
