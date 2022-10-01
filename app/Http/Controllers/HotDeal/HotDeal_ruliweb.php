<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_ruliweb;

class HotDeal_ruliweb extends HotDeal
{
    public function getNewItem()
    {
        return Deal_ruliweb::query()->where('is_new', true)->get();
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

            $ch->site_name = '루리';
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
        if($category == '게임S/W'){
            return '디지털SW';
        }
        elseif ($category == '게임H/W' || $category == 'PC/가전' || $category == 'A/V' || $category == '인테리어'){
            return 'PC/가전/가구';
        }
        elseif ($category == '음식' || $category == '생활용품'){
            return '식품/생활';
        }
        elseif ($category == '의류'){
            return '의류/집화';
        }
        elseif ($category == '취미용품' || $category == '레저용품'){
            return '취미/레저';
        }
        elseif ($category == '육아용품'){
            return '육아';
        }
        elseif ($category == '휴대폰'){
            return '휴대폰';
        }
        elseif ($category == '도서'){
            return '서적';
        }
        elseif ($category == '화장품'){
            return '화장품';
        }
        elseif ($category == '상품권'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '기타'){
            return '기타';
        }
        else {
            return '기타';
        }
    }


}
