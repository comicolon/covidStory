<?php

namespace App\Http\Controllers\BestList;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

// 파일정보 가져오기 허용설정
ini_set("allow_url_fopen",1);
require_once 'simple_html_dom.php';

class BestListController extends Controller
{
    public function index (Request $request){

        $path = $this->getPath($request);

        $totalListNormal = array();





        return view('bestList.bestList',[
            'path' => $path,
            'totalListNormal' => $totalListNormal,
        ]);
    }
}
