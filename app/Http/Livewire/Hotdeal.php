<?php

namespace App\Http\Livewire;

use App\Models\Combine_hotdeal;
use App\Service\BigFunctions;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Controllers\Controller;
use Livewire\WithPagination;

class Hotdeal extends Component
{
    use WithPagination;

    public $category = 'full';
    public $page = 1;

    public function mount(){
    }

    public function render()
    {
        $cvcate = $this->conversionCategory($this->category);

        if ($cvcate == '전체' || $cvcate == ''){
            $deals = Combine_hotdeal::query()->orderBy('created_at','desc')->paginate(20);
        }
        else{
            $deals =  Combine_hotdeal::query()->where('category',$cvcate)->orderBy('created_at','desc')->paginate(20);
        }

        return view('livewire.hotdeal',[
            'deals' => $deals,
            'cvcate' => $cvcate,
        ]);
    }

    public function setCategory($cate){
        $this->category = $cate;
    }

    private function conversionCategory($cate = ''){

        if ($cate == 'full' || $cate == ''){return '전체';}
        elseif ($cate == 'etc'){return '기타';}
        elseif ($cate == 'clien'){return '클리앙';}
        elseif ($cate == 'dgtsw'){return '디지털SW';}
        elseif ($cate == 'pchafn'){return 'PC/가전/가구';}
        elseif ($cate == 'fdlf'){return '식품/생활';}
        elseif ($cate == 'cos'){return '화장품';}
        elseif ($cate == 'clo'){return '의류/잡화';}
        elseif ($cate == 'prt'){return '육아';}
        elseif ($cate == 'gccp'){return '상품권/쿠폰/이벤트';}
        elseif ($cate == 'book'){return '서적';}
        elseif ($cate == 'hv'){return '취미/레저';}
        elseif ($cate == 'cell'){return '휴대폰';}
        elseif ($cate == 'osea'){return '해외';}
        else{return '전체';}
    }
}
