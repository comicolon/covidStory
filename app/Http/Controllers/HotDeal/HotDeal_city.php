<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_city;

class HotDeal_city extends HotDeal
{
    public function getNewItem()
    {
        return Deal_city::query()->where('is_new', true)->get();
    }

    public function insertItemToDB($item)
    {
        if ($item['is_changed'] == true){
            $changeRes = Combine_hotdeal::query()->where('num', $item['num'])->get()->first();

            $changeRes->update([
               'title'  => $item['title'],
            ]);
        }
        else{
            $ch = new Combine_hotdeal();

            $ch->site_name = '씨티';
            $ch->title = $item['title'];
            $ch->url = $item['url'];
            $ch->category = $this->selectCategory($item['category']);
            $ch->writer = $item['writer'];
            $ch->num = $item['num'];

            $ch->save();
        }
    }

    public function selectCategory($category)
    {
        if ($category == '디지털'){
            return '디지털SW';
        }
        elseif ($category == 'PC관련' || $category == '전자제품'){
            return 'PC/가전/가구';
        }
        elseif ($category == '음식'){
            return '식품/생활';
        }
        elseif ($category == '도서'){
            return '도서';
        }
        elseif ($category == '의류/잡화'){
            return '의류/잡화';
        }
        elseif ($category == '뷰티/미용'){
            return '화장품';
        }
        elseif ($category == '애완용품' || $category == '기타'){
            return '기타';
        }
        else{
            return '기타';
        }
    }


}
