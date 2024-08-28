<?php

namespace App\Admin\Actions;

use OpenAdmin\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ShowAction extends RowAction
{
    public $name = 'Show';

    public function handle(Model $model)
    {
        // Logika untuk menunjukkan item
    }

    public function dialog()
    {
        $this->confirm('Are you sure you want to show this item?');
    }

    public function icon()
    {
        return 'fa fa-eye'; // Ikon untuk action
    }
}
