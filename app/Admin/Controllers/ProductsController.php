<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends CommonProductsController
{
    /**
     *
     *
     * @return mixed|string
     */
    public function getProductType()
    {
        return Product::TYPE_NORMAL;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '普通商品';

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
        $show->field('title', __('商品名称'));
        $show->field('image', __('封面图片'))->image();
        $show->field('description', __('商品描述'));
        $show->field('on_sale', __('上架'))->as(
            function ($on_sale) {
                if ($on_sale) {
                    return '是';
                } else {
                    return '否';
                }
            }
        );
        $show->field('rating', __('评分'));
        $show->field('sold_count', __('销量'));
        $show->field('review_count', __('评价数量'));
        $show->field('price', __('价格'));
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
        $grid->model()->with(['category']);
        $grid->id('ID')->sortable();
        $grid->title('商品名称');
        $grid->column('category.name', '类目');
        $grid->on_sale('已上架')->display(
            function ($value) {
                return $value ? '是' : '否';
            }
        );
        $grid->price('价格');
        $grid->rating('评分');
        $grid->sold_count('销量');
        $grid->review_count('评论数');
    }

    /**
     * @param Form $form
     */
    protected function customForm(Form $form)
    {
        // 普通商品没有额外字段，隐藏这里不需要写任何代码
    }
}
