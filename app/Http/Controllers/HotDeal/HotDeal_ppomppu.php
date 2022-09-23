<?php

namespace App\Http\Controllers\HotDeal;

use App\Models\Combine_hotdeal;
use App\Models\Deal_ppomppu;

class HotDeal_ppomppu extends HotDeal
{
    public function getNewItem()
    {
        return Deal_ppomppu::query()->where('is_new', true)->get();
    }

    public function insertItemToDB($item)
    {
        $ch = new Combine_hotdeal();

        $ch->site_name = '뽐뿌';
        $ch->title = $item['title'];
        $ch->url = $item['url'];
        $ch->category = $this->selectCategory($item['category']);
        $ch->writer = $item['writer'];
        $ch->num = $item['num'];

        $ch->save();
    }

    public function selectCategory($category)
    {
        if ($category == '[컴퓨터]' || $category == '[디지털]' || $category == '[가전/가구]'){
            return 'PC/가전/가구';
        }
        elseif ($category == '[식품/건강]'){
            return '식품/생활';
        }
        elseif ($category == '[서적]'){
            return '서적';
        }
        elseif ($category == '[육아]'){
            return '육아';
        }
        elseif ($category == '[상품권]'){
            return '상품권/쿠폰/이벤트';
        }
        elseif ($category == '[의류/잡화]'){
            return '의류/잡화';
        }
        elseif ($category == '[화장품]'){
            return '화장품';
        }
        elseif ($category == '[등산/캠핑]'){
            return '취미/레저';
        }
        elseif ($category == '[기타]'){
            return '기타';
        }
        else {
            return '기타';
        }
    }


}
