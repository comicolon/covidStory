<?php

namespace App\Console\Commands;

use App\Http\Controllers\HotDeal\HotDeal_city;
use App\Http\Controllers\HotDeal\HotDeal_clien;
use App\Http\Controllers\HotDeal\HotDeal_coolenjoy;
use App\Http\Controllers\HotDeal\HotDeal_fmkorea;
use App\Http\Controllers\HotDeal\HotDeal_ppomppu;
use App\Http\Controllers\HotDeal\HotDeal_quasarzone;
use App\Http\Controllers\HotDeal\HotDeal_ruliweb;

use App\Models\Deal_city;
use App\Models\Deal_clien;
use App\Models\Deal_coolenjoy;
use App\Models\Deal_fmkorea;
use App\Models\Deal_ppomppu;
use App\Models\Deal_ruliweb;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class CrawlingHotdealList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hotdeal:CrawlingHotdeal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '웹사이트를 돌면서 핫딜 리스트를 가져오는 커맨드';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //파일 정보 가져오기 설정
        ini_set("allow_url_fopen",1);
        //심플 파서 로드
//        require $_SERVER['DOCUMENT_ROOT'].'app/lib/simple_html_dom.php';
        //상수선언
        $sleepTimeM = 1200000;

        $client = new Client();

        $client->setServerParameter('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36');


        //뽐뿌
        $page = $client->request('GET', 'https://www.ppomppu.co.kr/zboard/zboard.php?id=ppomppu');

        $resArr = $page->filter('.list1, .list0')->each( function ($node, $i){
            $ppArr = array();

            if ($i >= 0 && $i < 20){
                try {
                        $dt1 = $node->filter('td')->eq(2);
                        $title = trim($dt1->filter('.list_title')->text());
                        $category = trim($dt1->filter('span[style="color:#999;font-size:11px;"]')->text());
                        $url = trim($dt1->filter('a[onfocus="blur()"]')->attr('href'));
                        $url = 'https://www.ppomppu.co.kr/zboard/'.$url;
                        $writer = trim($node->filter('td')->eq(1)->text());
                        if ($writer == ''){
                            $writer = 'ppomppu';
                        }
                        $num = trim($node->filter('td')->eq(0)->text());

                        $arr = array(
                            'title' => $title,
                            'category' => $category,
                            'url' => $url,
                            'writer' => $writer,
                            'num' => $num,
                        );
                        array_push($ppArr, $arr);

                    }
                  catch (\Exception $e) {
                    Log::info('뽐뿌 딜 가져오기 실패', ['error :'=> $e]);
                }
            }

            return $ppArr;
        });

        $this->insertHotDealToDB('뽐뿌', $resArr, Deal_ppomppu::class);


        //쿨엔조이
        $page = $client->request('GET', 'https://coolenjoy.net/bbs/jirum');

        $resArr = $page->filter('tbody > tr')->each(function ($node, $i){
            $cnjArr = array();

            if ($i >= 1){

                try {
                    $title = $node->filter('.td_subject > a')->text();
                    $pos = mb_strpos($title, '댓글');
                    $title = trim(mb_substr($title, 0, $pos));
                    $url = $node->filter('.td_subject > a')->attr('href');
                    $category = trim($node->filter('.td_num')->text());
                    $writer = trim($node->filter('.td_name.sv_use')->text());
                    $pos = strpos($url, 'jirum/');
                    $num = substr($url, $pos + 6);
                    $arr = array(
                        'title' => $title,
                        'category' => $category,
                        'url' => $url,
                        'writer' => $writer,
                        'num' => $num,
                    );
                    array_push($cnjArr, $arr);
                } catch (\Exception $e) {
                    Log::info('쿨엔조이 딜 가져오기 실패', ['error : '=>$e]);
                }

            }
            return $cnjArr;
        });

        $this->insertHotDealToDB('쿨엔조이', $resArr, Deal_coolenjoy::class);


        // 에펨코리아
        $page = $client->request('GET', 'https://www.fmkorea.com/hotdeal');

        $resArr = $page->filter('.fm_best_widget._bd_pc > ul > li')->each(function ($node, $i){
           $fmArr = array();

            try {
                $title = $node->filter('div > h3 > a')->text();
                $title = trim(preg_replace('/\[\d+\]/', '', $title));
                $url = $node->filter('div > h3 > a')->attr('href');
                $url = 'https://www.fmkorea.com' . $url;
                $category = $node->filter('.category')->text();
                $category = trim(str_replace(' /', '', $category));
                $writer = $node->filter('.author')->text();
                $writer = trim(str_replace('/ ', '', $writer));
                $pos = strpos($url, 'com/');
                $num = substr($url, $pos + 4);
                $arr = array(
                    'title' => $title,
                    'category' => $category,
                    'url' => $url,
                    'writer' => $writer,
                    'num' => $num,
                );
                array_push($fmArr, $arr);
            } catch (\Exception $e) {
                Log::info('펨코 딜 가져오기 실패', ['error : '=> $e]);
            }

            return $fmArr;
        });

        $this->insertHotDealToDB('펨코', $resArr, Deal_fmkorea::class);


        //루리웹
        $page = $client->request('GET', 'https://bbs.ruliweb.com/market/board/1020');

        $resArr = $page->filter('div.board_main.theme_default.theme_white > table > tbody > tr.table_body.blocktarget')->each(function ($node, $i){
            $rlwArr = array();

            try {
                $title = null;
                $url = null;
                $category = null;
                $writer = null;
                $num = null;
                if ($node->filter('.id')->text() != '') {

                    $title = trim($node->filter('.subject')->text());
                    $url = $node->filter('.deco')->attr('href');
                    $category = trim($node->filter('.divsn.text_over')->text());
                    $writer = trim($node->filter('.writer.text_over > a')->text());
                    $num = trim($node->filter('.id')->text());
                }
                $arr = array(
                    'title' => $title,
                    'category' => $category,
                    'url' => $url,
                    'writer' => $writer,
                    'num' => $num,
                );
                array_push($rlwArr, $arr);
            } catch (\Exception $e) {
                Log::info('루리웹 딜 가져오기 실패', ['error : '=> $e]);
            }

            return $rlwArr;

        });

        $this->insertHotDealToDB('루리', $resArr, Deal_ruliweb::class);


        //씨티
        $page = $client->request('GET', 'https://www.city.kr/ln');

        $resArr = $page->filter('#bd_16532954_0 > div.bd_lst_wrp > table > tbody > tr')->each(function ($node, $i){
            $ctArr = array();

            try {
                $title = null;
                $url = null;
                $category = null;
                $writer = null;
                $num = null;
                if ($i > 0) {
                    $title = trim($node->filter('.title > a')->text());
                    $url = $node->filter('.title > a')->attr('href');
                    $category = trim($node->filter('.cate > span')->text());
                    $writer = trim($node->filter('.author')->text());
                    if ($writer == null) {
                        $writer = 'city';
                    }
                    $num = trim($node->filter('.no')->text());
                }
                $arr = array(
                    'title' => $title,
                    'category' => $category,
                    'url' => $url,
                    'writer' => $writer,
                    'num' => $num,
                );
                array_push($ctArr, $arr);
            } catch (\Exception $e) {
                Log::info('씨티 딜 가져오기 실패', ['error : '=> $e]);
            }


            return $ctArr;
        });

        $this->insertHotDealToDB('씨티', $resArr, Deal_city::class);


        //클리앙
        $page = $client->request('GET', 'https://www.clien.net/service/board/jirum');

        $resArr = $page->filter('#div_content > div.list_content > div > div')->each(function ($node, $i){
            $claArr = array();

            $title = trim($node->filter('.list_subject')->text());
            $url = $node->filter('.list_subject > a')->first()->attr('href');
            $url = 'https://www.clien.net'.$url;
            $category = trim($node->filter('.icon_keyword')->text());
            $writer = $node->filter('.nickname')->text();
            if ($writer == null) {
                        $writer = 'clien';
                    }
            $pos1 = strpos($url, 'jirum/');
            $pos2 = strpos($url, '?od=');
            $num = substr($url, $pos1+6, $pos2-$pos1-6 );

            $arr = array(
                    'title' => $title,
                    'category' => $category,
                    'url' => $url,
                    'writer' => $writer,
                    'num' => $num,
                );
                array_push($claArr, $arr);

                return $claArr;

        });

        $this->insertHotDealToDB('클리앙', $resArr, Deal_clien::class);


//        퀘이사존
//         노드js 사용으로 실행만 시켜줌
        $nodeJsPath = __DIR__;
        $res = exec('cd '.$nodeJsPath.' && node quasarzone.js');

        //디버그용 - 주석처리
//        $this->sortHotDealInDB();

        return 0;
    }

    // 각사이트의 딜을 디비로 넣어주는 펑션
    public function insertHotDealToDB ($siteName, $dealArr, $classInstance){

        //먼저 들어와 있는 것들의 뉴를 없애준다.
        $res = $classInstance::query()->where('is_new',true)->get();
        foreach ($res as $re){
            $re->is_new = false;
            $re->update([
                'is_new' => $re->is_new,
            ]);
        }

        $res2 = $classInstance::query()->where('is_changed',true)->get();
        foreach ($res2 as $re){
            $re->is_changed = false;
            $re->update([
                'is_changed' => $re->is_changed,
            ]);
        }

        foreach ($dealArr as $item){

            if ($item != null){
                try {

                    //먼저 들어와 있던것 중 중복 처리
                    $beforeBe = $classInstance::where('num', $item[0]['num'])->first();
                    if ($beforeBe != null) {

                        if ($item[0]['title'] != $beforeBe->title){
                            $beforeBe->update([
                                'title' => $item[0]['title'],
                                'is_changed' => true,
    //                            'is_new' => true,
                            ]);
                        }
                    }
                    else {                            // 새로운 딜 아이템
                        $deal = new $classInstance();

                        $deal->title = $item[0]['title'];
                        $deal->url = $item[0]['url'];
                        $deal->category = $item[0]['category'];
                        $deal->writer = $item[0]['writer'];
                        $deal->num = $item[0]['num'];
                        $deal->is_new = true;

                        $deal->save();

                    }
                } catch (\Exception $e) {
                    Log::info($siteName.' 핫딜 디비넣기 실패',['error : '=>$e]);
                }
            }
        }
    }

    public function sortHotDealInDB()
    {

        $dealArr = [HotDeal_city::class,
                    HotDeal_clien::class,
                    HotDeal_coolenjoy::class,
                    HotDeal_fmkorea::class,
                    HotDeal_ppomppu::class,
                    HotDeal_quasarzone::class,
                    HotDeal_ruliweb::class];

        foreach ($dealArr as $item){
            $hd = new $item();
            $res = $hd->getNewItem();

            foreach ($res as $re) {
                $hd->insertItemToDB($re);
            }
        }

    }

}

