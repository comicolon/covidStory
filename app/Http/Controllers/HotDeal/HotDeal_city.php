<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Deal_city;

class HotDeal_city extends HotDeal
{
    public function getNewItem()
    {
        return Deal_city::query()->where('is_new', true)->get();
    }

    public function insertItemToDB($item)
    {
        $title = $item['title'];
        $url = $item['url'];
        $category = $this->selectCategory($item['category']);
        $writer = $item['writer'];
        $num = $item['num'];
    }

    public function selectCategory($category)
    {

    }


}
