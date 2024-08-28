<?php

namespace App\Admin\Actions;

use OpenAdmin\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class NotShowAction extends RowAction
{
    public $name = 'Not Show';

    public function handle(Model $model)
    {
        $model->status = 0; // Atur status untuk menyembunyikan item
        $model->save();

        return $this->response()->success('disembunyikan')->refresh();
    }

    public function dialog()
    {
        $this->confirm('Anda yakin untuk menyembunyikannya?');
    }

    public function icon()
    {
        return 'fa fa-toggle-off'; // Ikon toggle off
    }
}
