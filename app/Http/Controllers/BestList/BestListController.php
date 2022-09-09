<?php

namespace App\Http\Controllers\BestList;

use App\Http\Controllers\Controller;
use App\Models\Combine_best_12h;
use App\Models\Combine_best_24h;
use App\Models\Combine_best_4h;
use App\Models\Combine_best_8h;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BestListController extends Controller
{
    public function index (Request $request){

        $path = $this->getPath($request);

        $before = 4;
        if ($request->get('before') != null){
            $before = $request->get('before');
        }

        $totalList = null;
        if ($before == 4){
            $totalList = Combine_best_4h::query()->limit(200)->get();
        }
        elseif ($before == 8){
            $totalList = Combine_best_8h::query()->limit(200)->get();
        }
        elseif ($before == 12){
            $totalList = Combine_best_12h::query()->limit(200)->get();
        }
        elseif ($before == 24){
            $totalList = Combine_best_24h::query()->limit(200)->get();
        }





        return view('bestList.bestList',[
            'path' => $path,
            'totalList' => $totalList,
        ]);
    }
}
