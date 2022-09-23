<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Deal_quasarzone;

class HotDeal_quasarzone extends HotDeal
{
    public function getNewItem()
    {
        return Deal_quasarzone::query()->where('is_new', true)->get();
    }

    public function insertItemToDB($item)
    {
        parent::insertItemToDB($item); // TODO: Change the autogenerated stub
    }

    public function selectCategory($category)
    {
        return parent::selectCategory($category); // TODO: Change the autogenerated stub
    }


}
