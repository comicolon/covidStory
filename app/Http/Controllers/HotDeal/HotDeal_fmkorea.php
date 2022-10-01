<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_fmkorea;

class HotDeal_fmkorea extends HotDeal
{
    public function getNewItem()
    {
        return Deal_fmkorea::query()->where('is_new', true)->get();
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

            $ch->site_name = '펨코';
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
        if($category == '먹거리' || $category == '생활용품'){
            return '식품/생활';
        }
        elseif ($category == 'SW/게임'){
            return '디지털SW';
        }
        elseif ($category == 'PC제품' || $category == '가전제품'){
            return 'PC/가전/가구';
        }
        elseif ($category == '의류'){
            return '의류/잡화';
        }
        elseif ($category == '세일정보' || $category == '모바일/상품권' || $category == '패키지/이용권'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '화장품'){
            return '화장품';
        }
        elseif ($category == '해외핫딜'){
            return '해외';
        }
        elseif ($category == '기타'){
            return '기타';
        }
        else {
            return '기타';
        }
    }


}
