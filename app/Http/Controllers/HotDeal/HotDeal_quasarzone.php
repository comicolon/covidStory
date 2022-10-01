<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_quasarzone;

class HotDeal_quasarzone extends HotDeal
{
    public function getNewItem()
    {
        return Deal_quasarzone::query()->where('is_new', true)->get();
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
        if ($category == 'PC/하드웨어' || $category == '가전/TV' || $category == '노트북/모바일'){
            return 'PC/가전/가구';
        }
        elseif ($category == '상품권/쿠폰'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '게임/SW'){
            return '디지털SW';
        }
        elseif ($category == '생활/식품'){
            return '식품/생활';
        }
        elseif ($category == '패션/의류'){
            return '의류/잡화';
        }
        elseif ($category == '기타'){
            return '기타';
        }
        else{
            return '기타';
        }
    }


}
