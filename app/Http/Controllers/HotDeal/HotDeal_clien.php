<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_clien;

class HotDeal_clien extends HotDeal
{
    public function getNewItem()
    {
        return Deal_clien::query()->where('is_new', true)->get();
    }

    public function insertItemToDB($item)
    {
        if ($item['is_changed'] == true){
            $changeRes = Combine_hotdeal::query()->where('num', $item['num'])->get()->first();

            $changeRes->update([
                'title'  => $item['title'],
            ]);
        }
        elseif ($item['is_new'] == true){
            $ch = new Combine_hotdeal();

            $ch->site_name = '클리앙';
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
        if($category == '상품정보' || $category == '공동구매정보'){
            return '클리앙';
        }
        elseif ($category == '이벤트정보'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '해외구매정보'){
            return '해외';
        }
        elseif ($category == '오프라인정보'){
            return '기타';
        }
        else {
            return '기타';
        }
    }


}
