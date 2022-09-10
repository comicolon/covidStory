<?php
namespace App\Service;

use App\Models\Best_bbdream;
use App\Models\Best_clien;
use App\Models\Best_dcinside;
use App\Models\Best_fmkorea;
use App\Models\Best_huniv;
use App\Models\Best_instiz;
use App\Models\Best_inven;
use App\Models\Best_natepann;
use App\Models\Best_ppomppu;
use App\Models\Best_ruliweb;
use App\Models\Best_slrclub;
use App\Models\Best_theqoo;
use App\Models\Combine_best_4h;
use App\Models\Combine_best_8h;
use App\Models\Combine_best_12h;
use App\Models\Combine_best_24h;
use App\Models\CovidHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class BigFunctions
{
    public function changeInfoToJson (CovidHistory $history){
        //1차 배열 요소
        $apiArr =
            array
            (
                "updateTime" => $history->counting_date,
            );
        $koreaArr =
            array
            (
                'totalCnt'  => $history->korea_totalCnt,
                'incDec'    => $history->korea_incDec,
                'recCnt'    => $history->korea_recCnt,
                'deathCnt'  => $history->korea_deathCnt,
                'isolCnt'   => $history->korea_isolCnt,
                'qurRate'   => $history->korea_qurRate
            );

        $seoulArr =
            array
            (
                 'totalCnt'  => $history->seoul_totalCnt,
                 'incDec'    => $history->seoul_incDec,
                 'recCnt'    => $history->seoul_recCnt,
                 'deathCnt'  => $history->seoul_deathCnt,
                 'isolCnt'   => $history->seoul_isolCnt,
                 'qurRate'   => $history->seoul_qurRate
            );

        $busanArr =
            array
            (
                 'totalCnt'  => $history->busan_totalCnt,
                 'incDec'    => $history->busan_incDec,
                 'recCnt'    => $history->busan_recCnt,
                 'deathCnt'  => $history->busan_deathCnt,
                 'isolCnt'   => $history->busan_isolCnt,
                 'qurRate'   => $history->busan_qurRate
            );

        $daeguArr =
            array
            (
                 'totalCnt'  => $history->daegu_totalCnt,
                 'incDec'    => $history->daegu_incDec,
                 'recCnt'    => $history->daegu_recCnt,
                 'deathCnt'  => $history->daegu_deathCnt,
                 'isolCnt'   => $history->daegu_isolCnt,
                 'qurRate'   => $history->daegu_qurRate
            );

        $incheonArr =
            array
            (
                 'totalCnt'  => $history->incheon_totalCnt,
                 'incDec'    => $history->incheon_incDec,
                 'recCnt'    => $history->incheon_recCnt,
                 'deathCnt'  => $history->incheon_deathCnt,
                 'isolCnt'   => $history->incheon_isolCnt,
                 'qurRate'   => $history->incheon_qurRate
            );

        $gwangjuArr =
            array
            (
                 'totalCnt'  => $history->gwangju_totalCnt,
                 'incDec'    => $history->gwangju_incDec,
                 'recCnt'    => $history->gwangju_recCnt,
                 'deathCnt'  => $history->gwangju_deathCnt,
                 'isolCnt'   => $history->gwangju_isolCnt,
                 'qurRate'   => $history->gwangju_qurRate
            );

        $daejeonArr =
            array
            (
                 'totalCnt'  => $history->daejeon_totalCnt,
                 'incDec'    => $history->daejeon_incDec,
                 'recCnt'    => $history->daejeon_recCnt,
                 'deathCnt'  => $history->daejeon_deathCnt,
                 'isolCnt'   => $history->daejeon_isolCnt,
                 'qurRate'   => $history->daejeon_qurRate
            );

        $ulsanArr =
            array
            (
                 'totalCnt'  => $history->ulsan_totalCnt,
                 'incDec'    => $history->ulsan_incDec,
                 'recCnt'    => $history->ulsan_recCnt,
                 'deathCnt'  => $history->ulsan_deathCnt,
                 'isolCnt'   => $history->ulsan_isolCnt,
                 'qurRate'   => $history->ulsan_qurRate
            );

        $sejongArr =
            array
            (
                 'totalCnt'  => $history->sejong_totalCnt,
                 'incDec'    => $history->sejong_incDec,
                 'recCnt'    => $history->sejong_recCnt,
                 'deathCnt'  => $history->sejong_deathCnt,
                 'isolCnt'   => $history->sejong_isolCnt,
                 'qurRate'   => $history->sejong_qurRate
            );

        $gyeonggiArr =
            array
            (
                 'totalCnt'  => $history->gyeonggi_totalCnt,
                 'incDec'    => $history->gyeonggi_incDec,
                 'recCnt'    => $history->gyeonggi_recCnt,
                 'deathCnt'  => $history->gyeonggi_deathCnt,
                 'isolCnt'   => $history->gyeonggi_isolCnt,
                 'qurRate'   => $history->gyeonggi_qurRate
            );

        $gangwonArr =
            array
            (
                 'totalCnt'  => $history->gangwon_totalCnt,
                 'incDec'    => $history->gangwon_incDec,
                 'recCnt'    => $history->gangwon_recCnt,
                 'deathCnt'  => $history->gangwon_deathCnt,
                 'isolCnt'   => $history->gangwon_isolCnt,
                 'qurRate'   => $history->gangwon_qurRate
            );

        $chungbukArr =
            array
            (
                 'totalCnt'  => $history->chungbuk_totalCnt,
                 'incDec'    => $history->chungbuk_incDec,
                 'recCnt'    => $history->chungbuk_recCnt,
                 'deathCnt'  => $history->chungbuk_deathCnt,
                 'isolCnt'   => $history->chungbuk_isolCnt,
                 'qurRate'   => $history->chungbuk_qurRate
            );

        $chungnamArr =
            array
            (
                 'totalCnt'  => $history->chungnam_totalCnt,
                 'incDec'    => $history->chungnam_incDec,
                 'recCnt'    => $history->chungnam_recCnt,
                 'deathCnt'  => $history->chungnam_deathCnt,
                 'isolCnt'   => $history->chungnam_isolCnt,
                 'qurRate'   => $history->chungnam_qurRate
            );

        $jeonbukArr =
            array
            (
                 'totalCnt'  => $history->jeonbuk_totalCnt,
                 'incDec'    => $history->jeonbuk_incDec,
                 'recCnt'    => $history->jeonbuk_recCnt,
                 'deathCnt'  => $history->jeonbuk_deathCnt,
                 'isolCnt'   => $history->jeonbuk_isolCnt,
                 'qurRate'   => $history->jeonbuk_qurRate
            );

        $jeonnamArr =
            array
            (
                 'totalCnt'  => $history->jeonnam_totalCnt,
                 'incDec'    => $history->jeonnam_incDec,
                 'recCnt'    => $history->jeonnam_recCnt,
                 'deathCnt'  => $history->jeonnam_deathCnt,
                 'isolCnt'   => $history->jeonnam_isolCnt,
                 'qurRate'   => $history->jeonnam_qurRate
            );

        $gyeongbukArr =
            array
            (
                 'totalCnt'  => $history->gyeongbuk_totalCnt,
                 'incDec'    => $history->gyeongbuk_incDec,
                 'recCnt'    => $history->gyeongbuk_recCnt,
                 'deathCnt'  => $history->gyeongbuk_deathCnt,
                 'isolCnt'   => $history->gyeongbuk_isolCnt,
                 'qurRate'   => $history->gyeongbuk_qurRate
            );

        $gyeongnamArr =
            array
            (
                 'totalCnt'  => $history->gyeongnam_totalCnt,
                 'incDec'    => $history->gyeongnam_incDec,
                 'recCnt'    => $history->gyeongnam_recCnt,
                 'deathCnt'  => $history->gyeongnam_deathCnt,
                 'isolCnt'   => $history->gyeongnam_isolCnt,
                 'qurRate'   => $history->gyeongnam_qurRate
            );

        $jejuArr =
            array
            (
                 'totalCnt'  => $history->jeju_totalCnt,
                 'incDec'    => $history->jeju_incDec,
                 'recCnt'    => $history->jeju_recCnt,
                 'deathCnt'  => $history->jeju_deathCnt,
                 'isolCnt'   => $history->jeju_isolCnt,
                 'qurRate'   => $history->jeju_qurRate
            );


        $arrBefore = array
        (
            'API' => $apiArr,
            'korea' => $koreaArr,
            'seoul' => $seoulArr,
            'busan' => $busanArr,
            'daegu' => $daeguArr,
            'incheon' => $incheonArr,
            'gwangju' => $gwangjuArr,
            'daejeon' => $daejeonArr,
            'ulsan' => $ulsanArr,
            'sejong' => $sejongArr,
            'gyeonggi' => $gyeonggiArr,
            'gangwon' => $gangwonArr,
            'chungbuk' => $chungbukArr,
            'chungnam' => $chungnamArr,
            'jeonbuk' => $jeonbukArr,
            'jeonnam' => $jeonnamArr,
            'gyeongbuk' => $gyeongbukArr,
            'gyeongnam' => $gyeongnamArr,
            'jeju' => $jejuArr,
        );

        return $arrBefore;
    }

    //모바일 체크
    public function isMobileCk(){
        $sAgent = $_SERVER['HTTP_USER_AGENT'];
        $sMobile = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/i';
        if(preg_match($sMobile, $sAgent)){
            //모바일일경우.
            return true;
        }
        else{
            //PC인경우
            return false;
        }
    }

    public function insertTotalArr($beforeH){

        $totalArr = array();
        $now = Carbon::now();
        $to = $now->toDateTimeString();
        $nowBefore4h = $now->subHours($beforeH);
        $from = $nowBefore4h->toDateTimeString();

        $from = date($from);
        $to = date($to);

        $bbdrArr    = Best_bbdream::whereBetween('write_datetime', [$from, $to])->get();
        $clienArr   = Best_clien::whereBetween('write_datetime', [$from, $to])->get();
        $dcArr      = Best_dcinside::whereBetween('write_datetime', [$from, $to])->get();
        $fmkArr     = Best_fmkorea::whereBetween('write_datetime', [$from, $to])->get();
        $huArr      = Best_huniv::whereBetween('write_datetime', [$from, $to])->get();
        $istzArr    = Best_instiz::whereBetween('write_datetime', [$from, $to])->get();
        $ivArr      = Best_inven::whereBetween('write_datetime', [$from, $to])->get();
        $npArr      = Best_natepann::whereBetween('write_datetime', [$from, $to])->get();
        $ppArr      = Best_ppomppu::whereBetween('write_datetime', [$from, $to])->get();
        $rrwArr     = Best_ruliweb::whereBetween('write_datetime', [$from, $to])->get();
        $slrArr     = Best_slrclub::whereBetween('write_datetime', [$from, $to])->get();
        $tqArr      = Best_theqoo::whereBetween('write_datetime', [$from, $to])->get();

        //전체 배열에 넣어준다

        foreach ($bbdrArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);


        }

        foreach ($clienArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($dcArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($fmkArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($huArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($istzArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($ivArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($npArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($ppArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($rrwArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($slrArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        foreach ($tqArr as $item){

            array_push($totalArr, [
                'site_name'         => $item->site_name,
                'title'             => $item->title,
                'url'               => $item->url,
                'writer'            => $item->writer,
                'write_datetime'    => $item->write_datetime,
                'views'             => $item->views,
                'num'               => $item->num,
            ]);
        }

        // 조회순서대로 소팅
        $viewsArr = array();
        foreach ($totalArr as $key => $row)
        {
            $viewsArr[$key] = $row['views'];
        }
        array_multisort($viewsArr, SORT_DESC, $totalArr);

        return $totalArr;
    }

    public function insertTotalArrToDB($totalArr, $dbName){

        // 디비에 넣어준다
//        Combine_best_4h::truncate();      // 아이디 값까지 초기화
        $dbName::query()->delete(); // 디비를 비워준다.

        $idx = 1;
        foreach ($totalArr as $item){

            $com_best_db = new $dbName();

            $com_best_db->rating = $idx;

            $site_name = null;
            if ($item['site_name'] == 'bbdream'){
                $site_name = '보배';
            }
            elseif ($item['site_name'] == 'clien'){
                $site_name = '클량';
            }
            elseif ($item['site_name'] == 'dcinside'){
                $site_name = '디씨';
            }
            elseif ($item['site_name'] == 'fmkorea'){
                $site_name = '펨코';
            }
            elseif ($item['site_name'] == 'huniv'){
                $site_name = '웃대';
            }
            elseif ($item['site_name'] == 'instiz'){
                $site_name = '인티';
            }
            elseif ($item['site_name'] == 'inven'){
                $site_name = '인벤';
            }
            elseif ($item['site_name'] == 'natepann'){
                $site_name = '넷판';
            }
            elseif ($item['site_name'] == 'ppomppu'){
                $site_name = '뽐뿌';
            }
            elseif ($item['site_name'] == 'ruliweb'){
                $site_name = '루리';
            }
            elseif ($item['site_name'] == 'slrclub'){
                $site_name = '에세랄';
            }
            elseif ($item['site_name'] == 'theqoo'){
                $site_name = '더쿠';
            }

            $com_best_db->site_name = $site_name;
            $com_best_db->title = $item['title'];
            $com_best_db->url = $item['url'];
            $com_best_db->writer = $item['writer'];
            $com_best_db->write_datetime = $item['write_datetime'];
            $com_best_db->views = $item['views'];
            $com_best_db->num = $item['num'];

            $com_best_db->save();

            $idx++;
        }

        return null;
    }

    //사이트 이름과 번호를 입력하여 베스트글 하나를 얻는 함수
    public function getBestItem($site_name, $num){

        $bestDB = null;
        if ($site_name == '보배'){$bestDB = Best_bbdream::class;}
        if ($site_name == '클량'){$bestDB = Best_clien::class;}
        if ($site_name == '디씨'){$bestDB = Best_dcinside::class;}
        if ($site_name == '펨코'){$bestDB = Best_fmkorea::class;}
        if ($site_name == '웃대'){$bestDB = Best_huniv::class;}
        if ($site_name == '인티'){$bestDB = Best_instiz::class;}
        if ($site_name == '인벤'){$bestDB = Best_inven::class;}
        if ($site_name == '넷판'){$bestDB = Best_natepann::class;}
        if ($site_name == '뽐뿌'){$bestDB = Best_ppomppu::class;}
        if ($site_name == '루리'){$bestDB = Best_ruliweb::class;}
        if ($site_name == '에세랄'){$bestDB = Best_slrclub::class;}
        if ($site_name == '더쿠'){$bestDB = Best_theqoo::class;}

        $resItem = $bestDB::where('num',$num)->get()->first();

        return $resItem;
    }
}
