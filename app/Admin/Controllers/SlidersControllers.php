<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Sliders;

class SlidersControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sliders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sliders());

        $grid->column('id', __('Id'));
        $grid->column('Nama slide', __('Nama slide'));
        $grid->column('Brand', __('Brand'));
        $grid->column('gambar', __('Gambar'))->image();
        $grid->column('Deskripsi', __('Deskripsi'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Sliders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Nama slide', __('Nama slide'));
        $show->field('Brand', __('Brand'));
        $show->field('Gambar', __('Gambar'));
        $show->field('Deskripsi', __('Deskripsi'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Sliders());

        $form->text('Nama slide', __('Nama slide'));
        $form->text('Brand', __('Brand'));
        $form->image('gambar', __('Gambar'));
        $form->textarea('Deskripsi', __('Deskripsi'));

        return $form;
    }
}
