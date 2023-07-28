<?php

namespace App\Admin\Controllers\Platform;

use App\Admin\Repositories\Platform\Platform;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models\Devops\Platform\Platform as PlatformModel;

class PlatformController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Platform(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('remark');
            $grid->column('status', '状态');
            $grid->column('created_ts', '创建时间');
            $grid->column('updated_ts', '更新建时间');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Platform(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('remark');
            $show->field('status');
            $show->field('created_ts');
            $show->field('updated_ts');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Platform(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('remark');
            $form->select('status', '状态')->options(PlatformModel::STATUS_MAP);
        });
    }
}
