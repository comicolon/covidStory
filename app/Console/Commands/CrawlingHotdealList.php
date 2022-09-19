<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;


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
//        require_once $_SERVER['DOCUMENT_ROOT'].'/../app/Service/simple_html_dom.php';
        //상수선언
        $sleepTimeM = 1200000;

        $client = new Client();

        $client->setServerParameter('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36');


//        //뽐뿌
//        $page = $client->request('GET', 'https://www.ppomppu.co.kr/zboard/zboard.php?id=ppomppu');
//
//        $resArr = $page->filter('.list1, .list0')->each( function ($node, $i){
//            $ppArr = array();
//
//            if ($i >= 0 && $i < 20){
//                try {
//                        $dt1 = $node->filter('td')->eq(2);
//                        $title = trim($dt1->filter('.list_title')->text());
//                        $category = trim($dt1->filter('span[style="color:#999;font-size:11px;"]')->text());
//                        $url = trim($dt1->filter('a[onfocus="blur()"]')->attr('href'));
//                        $url = 'https://www.ppomppu.co.kr/zboard/'.$url;
//                        $writer = trim($node->filter('td')->eq(1)->text());
//                        $num = trim($node->filter('td')->eq(0)->text());
//
//                        $arr = array(
//                            'title' => $title,
//                            'category' => $category,
//                            'url' => $url,
//                            'writer' => $writer,
//                            'num' => $num,
//                        );
//                        array_push($ppArr, $arr);
//
//                    }
//                  catch (\Exception $e) {
//                    Log::info('뽐뿌 딜 가져오기 실패', ['error :'=> $e]);
//                }
//            }
//
//            return $ppArr;
//        });


        //클리앙




//        //쿨엔조이
//        $page = $client->request('GET', 'https://coolenjoy.net/bbs/jirum');
//
//        $resArr = $page->filter('tbody > tr')->each(function ($node, $i){
//            $cnjArr = array();
//
//            if ($i >= 1){
//
//                try {
//                    $title = $node->filter('.td_subject > a')->text();
//                    $pos = mb_strpos($title, '댓글');
//                    $title = trim(mb_substr($title, 0, $pos));
//                    $url = $node->filter('.td_subject > a')->attr('href');
//                    $category = trim($node->filter('.td_num')->text());
//                    $writer = trim($node->filter('.td_name.sv_use')->text());
//                    $pos = strpos($url, 'jirum/');
//                    $num = substr($url, $pos + 6);
//                    $arr = array(
//                        'title' => $title,
//                        'category' => $category,
//                        'url' => $url,
//                        'writer' => $writer,
//                        'num' => $num,
//                    );
//                    array_push($cnjArr, $arr);
//                } catch (\Exception $e) {
//                    Log::info('쿨엔조이 딜 가져오기 실패', ['error : '=>$e]);
//                }
//
//            }
//            return $cnjArr;
//        });


//        // 에펨코리아
//        $page = $client->request('GET', 'https://www.fmkorea.com/hotdeal');
//
//        $resArr = $page->filter('.fm_best_widget._bd_pc > ul > li')->each(function ($node, $i){
//           $fmArr = array();
//
//            try {
//                $title = $node->filter('div > h3 > a')->text();
//                $title = trim(preg_replace('/\[\d+\]/', '', $title));
//                $url = $node->filter('div > h3 > a')->attr('href');
//                $url = 'https://www.fmkorea.com' . $url;
//                $category = $node->filter('.category')->text();
//                $category = trim(str_replace(' /', '', $category));
//                $writer = $node->filter('.author')->text();
//                $writer = trim(str_replace('/ ', '', $writer));
//                $pos = strpos($url, 'com/');
//                $num = substr($url, $pos + 4);
//                $arr = array(
//                    'title' => $title,
//                    'category' => $category,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'num' => $num,
//                );
//                array_push($fmArr, $arr);
//            } catch (\Exception $e) {
//                Log::info('펨코 딜 가져오기 실패', ['error : '=> $e]);
//            }
//
//            return $fmArr;
//        });


        //루리웹



        //퀘이사존
        $nodeJsPath = __DIR__;
        $res = exec('cd '.$nodeJsPath.' && node quasarzone.js');

        return 0;
    }
}

