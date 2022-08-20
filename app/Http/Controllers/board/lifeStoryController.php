<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LifeStoryBoard;
use App\Service\baseConfig;
use Illuminate\Support\Facades\DB;

class lifeStoryController extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);
        $page = 1;
        $page = $request->get('page');
        $postPacket = LifeStoryBoard::latest()->take(20)->get();

        //페이징 처리
        $postViewCount = baseConfig::postViewCount;
        $pageViewCount = baseConfig::pageViewCount;
        $countAll = lifeStoryBoard::count();
        $totalPageCount = 1;                             // 페이지 갯수
        $nowPagePaket = 0;                          // 현재 페이지 묶음
        $totalViewPage = 1;                         // 보여질 페이지 총합
        $isFirst = true;                            // 1페이지 인가
        $isEnd = false;                             // 끝페이지 인가
        if ($countAll > $postViewCount)
        {
            //총 페이지수
            $totalPageCount = $countAll / $postViewCount;
            if ($countAll % $postViewCount > 0){
                $totalPageCount++;
            }

            // 한페이지에 보여줄 페이지 묶음 1페이지가 안 넘을때는 기본값이 넘어간다
            if($totalPageCount > 1){
                $nowPagePaket = intdiv($page , $pageViewCount);
                if ($nowPagePaket >= $totalPageCount / $pageViewCount){
                    if (round($page % $pageViewCount, 100) < 1){
                        $nowPagePaket++;
                    }
                }
                if($nowPagePaket == $page / $pageViewCount){
                    $nowPagePaket--;
                }
                // 현재 페이지 묶음이 가득 채워서 보여줘야할때
                if ($nowPagePaket <= floor($totalPageCount / $pageViewCount)){
                    $totalViewPage = $nowPagePaket * $pageViewCount + $pageViewCount;
                    if ( ($totalPageCount / $pageViewCount) - $nowPagePaket < 1){
                        $totalViewPage = ($totalPageCount % $pageViewCount) + ($nowPagePaket * $pageViewCount);
                    }
                }
            }
        }

        if ($page != 1){
            $isFirst = false;
            if ($page >= ceil($totalPageCount) + 1){
                $isEnd = true;
            }
            $postPacket = LifeStoryBoard::latest()->skip(($page -1) * $postViewCount)->take($postViewCount)->get();
        }

            return view('boards.lifeStory.lifeStoryIndex', [
                'path' => $path,
                'postPacket' => $postPacket,
                'page' => $page,
                'nowPagePaket' => $nowPagePaket,
                'totalViewPage' => $totalViewPage,
                'pageViewCount' => $pageViewCount,
                'isFirst' => $isFirst,
                'isEnd' => $isEnd,
            ]);
    }
}
