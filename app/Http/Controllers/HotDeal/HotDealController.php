<?php

namespace App\Http\Controllers\HotDeal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Panther\Client as PantherClient;
use Illuminate\Support\Facades\Log;


class HotDealController extends Controller
{
    public function index (Request $request){

        $path = $this->getPath($request);

        //파일 정보 가져오기 설정
        ini_set("allow_url_fopen",1);
        //심플 파서 로드
        require_once $_SERVER['DOCUMENT_ROOT'].'/../app/Service/simple_html_dom.php';
        //상수선언
        $sleepTimeM = 1200000;

//        $client = new Client();
        $client = new Client(HttpClient::create(['timeout' => 90]));
//        $client->setClient(new \GuzzleHttp\Client([ 'timeout' => 90, 'verify' => false, 'cookie'=>true ]));




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

//        $path = $_SERVER['DOCUMENT_ROOT'].'/chromedriver.exe';
//        echo $path;


        $client = PantherClient::createChromeClient($_SERVER['DOCUMENT_ROOT'].'../drivers/chromedriver.exe');
// Or, if you care about the open web and prefer to use Firefox
//        $client = PantherClient::createFirefoxClient();

        $page = $client->request('GET', 'https://quasarzone.com/bbs/qb_saleinfo'); // Yes, this website is 100% written in JavaScript
//        $client->clickLink('Get started');

// Wait for an element to be present in the DOM (even if hidden)
//        $crawler = $client->waitFor('#installing-the-framework');
// Alternatively, wait for an element to be visible
//        $crawler = $client->waitForVisibility('#installing-the-framework');



//        echo $crawler->filter('#installing-the-framework')->text();
        echo $page->filterXPath('html/head/title')->text()."\n";
        $client->takeScreenshot('screen.png'); // Yeah, screenshot!





//        $cookies  =  $client->getCookieJar()->all();    // 쿠키를 얻고,
//
//        $client2 = new Client(); // 새로운 클라이언트
//        $client2->getCookieJar()->updateFromSetCookie($cookies); // 쿠키를 설정
//        $crawler2 = $client2->request('GET', $url);
//
//        echo $crawler2->filterXPath('html/head/title')->text()."\n";
//        echo $crawler2->getUri()."\n";




        //퀘이사존
//        $page = $client->request('GET', 'https://quasarzone.com/bbs/qb_saleinfo');

//        echo $page->filterXPath('html/head/title')->text()."\n";
//        echo $page->getUri()."\n";




//        $resArr = $page->filter('.market-type')->each(function ($node, $i){
//           $qszArr = array();
//
//           dd($node);
//
//           $title = $node->text();
//
//           echo $i;
//           echo "<br>";
//           echo $title;
//           echo "<br>";
//
//        });


//                    echo $i;
//                    echo "<br>";
//                    echo $title;
//                    echo "<br>";
//                    echo $category;
//                    echo "<br>";
//                    echo $url;
//                    echo "<br>";
//                    echo $num;
//                    echo "<br>";
//                    echo $writer;
//                    echo "<br>";
//        echo "<pre>";
//        print_r($resArr);
//        echo "</pre>";



        return view('hotdeal.hotdeal',[
            'path' => $path,
        ]);





    }
}
