<?php

namespace App\Http\Controllers\HotDeal;

use App\Http\Controllers\Controller;
use App\Service\BigFunctions;
use Illuminate\Http\Request;


class HotDealController extends Controller
{
    public function index (Request $request)
    {

        $path = $this->getPath($request);


        return view('hotdeal.hotdeal', [
            'path' => $path,
        ]);

    }

    public function itemClick(Request $request){
        $num = $request->get('num');
        $site_name = $request->get('site_name');

        $dealItem = (new BigFunctions)->getHotdealItem($site_name, $num);

        //내부적인 조회수를 올려준다.
        $dealItem->views_on_local++;
        $dealItem->update([
            'views_on_local' => $dealItem->views_on_local,
        ]);
    }
}
