<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_coolenjoy;

class HotDeal_coolenjoy extends HotDeal
{
    public function getNewItem()
    {
        return Deal_coolenjoy::query()->where('is_new', true)->orWhere('is_changed', true)->get();
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

            $ch->site_name = '쿨엔조이';
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
        if ($category == 'PC관련' || $category == '가전' || $category == '모바일'){
            return 'PC/가전/가구';
        }
        elseif ($category == '게임'){
            return '디지털SW';
        }
        elseif ($category == '식품'){
            return '식품/생활';
        }
        elseif ($category == '인터넷' || $category == '이벤트' || $category == '쿠폰'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '의류/잡화'){
            return '의류/잡화';
        }
        elseif ($category == '화장품'){
            return '화장품';
        }
        elseif ($category == '기타'){
            return '기타';
        }
        else {
            return '기타';
        }
    }

}
