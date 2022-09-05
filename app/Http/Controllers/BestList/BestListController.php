<?php

namespace App\Http\Controllers\BestList;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Snoopy;

// 파일정보 가져오기 허용설정
ini_set("allow_url_fopen",1);
require_once 'simple_html_dom.php';
//require_once('Snoopy.class.php');


class BestListController extends Controller
{
    public function index ()
    {
        //상수 선언
        $sleepTimeM = 500000;
        $idxMax = 30;

        // 디씨 인사이드 에서 가져오기
        $html = file_get_html('https://www.dcinside.com/');
        $dcArr = Array();
        $idx =0;
        //실시간 베스트 가져오기
        foreach($html->find('.time_best li > a') as $a ){

//            usleep($sleepTimeM);
//            $board_data = file_get_html ($a->href);
//
//            $url = $a->href;
//            $title = $board_data->find('.title_subject', 0);
//            $writer = $board_data->find('.gall_writer .nickname',0);
//            $time = $board_data->find('.gall_date')[0]->plaintext;
//            $views = $board_data->find('.gall_count')[0]->plaintext;
//            $views = preg_replace("/[^0-9]*/s", "", $views);
//            $pos = strpos($url, '&no=');
//            $num = substr($url, $pos+4);
//
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";
//            echo $num;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }


        // slr 클럽 가져오기
        //인기글
        $html = file_get_html('http://www.slrclub.com/bbs/zboard.php?id=hot_article');
        $slrArr = array();
        $idx = 0;

        foreach ($html->find('.bbs_tbl_layout tbody tr') as $item){

//            $a = $item->find('a')[0];
//
//            $url = $a->href;
//            $url = str_replace('amp;','',$url);
//            $url = 'http://www.slrclub.com'.$url;
//
//            $title = $a->plaintext;
//            $writer = $item->find('.list_name .lop')[0]->plaintext;
//            $time = $item->find('.list_date')[0]->plaintext;
//            $views = $item->find('.list_click')[0]->plaintext;
//              $num = $item->find('.list_num')[0]->plaintext;

//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";
            $idx++;
            if($idx==$idxMax)
                break;
        }


        //루리웹 가져오기
        //유머 게시판 베스트 글
        $html = file_get_html('https://bbs.ruliweb.com/community/board/300143?view_best=1');
        $rrwArr = array();
        $idx = 0;

        foreach ($html->find('[class=table_body blocktarget]') as $item){


    //            $num = $item->find('.id')[0]->plaintext;
    //            $url = $item->find('.relative a')[0]->href;
    //            $title = $item->find('.relative a')[0]->plaintext;
    //            $writer = $item->find('.writer a')[0]->plaintext;
    //            $time = $item->find('.time')[0]->plaintext;
    //            $views = $item->find('.hit')[0]->plaintext;
    //
    //            echo $num;
    //            echo "<br>";
    //            echo $url;
    //            echo "<br>";
    //            echo $title;
    //            echo "<br>";
    //            echo $writer;
    //            echo "<br>";
    //            echo $time;
    //            echo "<br>";
    //            echo $views;
    //            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }


        //에펨코리아 가져오기
        $html = file_get_html('https://www.fmkorea.com/index.php?mid=humor&sort_index=pop&order_type=desc&listStyle=list&page=1');
        $fmkArr = array();
        $idx = 0;

        foreach ($html->find('tbody tr') as $item){

            if ($item->class !='notice notice_pop0' && $item->class != 'notice notice_pop0 show_folded_notice')
            {

//            $url = $item->find('a')[0]->href;
//            $url = 'https://www.fmkorea.com'.$url;
//            $url = str_replace('amp;','',$url);
//            $title = $item->find('.title a')[0]->plaintext;
//            $writer = $item->find('.author a')[0]->plaintext;
//            $time = $item->find('.time')[0]->plaintext;
//            $views = $item->find('.m_no')[0]->plaintext;
//            $pos = strpos($url, 'document_srl=');
//            $num = substr($url, $pos+13);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            }

            $idx++;
            if($idx==$idxMax)
                break;
        }


        //네이트 판
        $html = file_get_html('https://pann.nate.com/talk/ranking');
        $ntpArr = array();
        $idx = 0;

        foreach ($html->find('.post_wrap li') as $item){

//            $url = $item->find('dl a')[0]->href;
//            $url = 'https://pann.nate.com'.$url;
//            $title = $item->find('dl a')[0]->title;
//            $writer = 'ㅇㅇ';
//            $time = Carbon::now();
//            $views = $item->find('.count')[0]->plaintext;
//            $views = preg_replace("/[^0-9]*/s", "", $views);
//            $pos = strpos($url, 'talk/');
//            $num = substr($url, $pos+5);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }

        // 인벤 오픈 이슈 갤러리
        $html = file_get_html('https://www.inven.co.kr/board/webzine/2097?iskin=webzine');
        $ivArr = array();
        $idx = 0;

        foreach ($html->find('.open-issue-list li') as $item){

//            $url = $item->find('a')[0]->href;
//            $title = $item->find('a .txt')[0]->plaintext;
//
//            //인벤은 링크를 타고 들어가서 확인
//            $html_dt = file_get_html($url);
//            $writer =substr($html_dt->find('.articleWriter span')[0]->plaintext, 6);
//            $time = $html_dt->find('.articleDate')[0]->plaintext;
//            $views = $html_dt->find('.articleHit')[0]->plaintext;
//            $views = preg_replace("/[^0-9]*/s", "", $views);
//            $num = $html_dt->find('.articleBotUrl a')[1]->href;
//            $pos = strpos($num, '2097/');
//            $num = substr($num, $pos+5);
//            $pos = strpos($num, '?iskin');
//            $num = substr($num, 0, $pos);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }

        //뽐뿌 핫게시글
        $html = file_get_html('https://www.ppomppu.co.kr/hot.php');
        $ppArr = array();
        $idx = 0;

        foreach ($html->find('.line') as $item){

//            $url = $item->find('a')[1]->href;
//            $url = 'https://www.ppomppu.co.kr'.$url;
//            $title = $item->find('a')[1]->plaintext;
//            $writer = $item->find('td')[1]->plaintext;
//            $time = $item->find('.board_date')[0]->plaintext;
//            $views = $item->find('.board_date')[2]->plaintext;
//            $pos = strpos($url,'&no=');
//            $num = substr($url, $pos+4);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }

        //더쿠 핫게시판
        $html = file_get_html('https://theqoo.net/hot');
        $dqArr = array();
        $idx=0;

        $html = $html->find('tbody tr');
        $html2 = array_slice($html, 6);

        foreach ($html2 as $item){

//            $url = $item->find('.title a')[0]->href;
//            $url = 'https://theqoo.net'.$url;
//            $title = $item->find('.title a')[0]->plaintext;
//            $num = $item->find('.no')[0]->plaintext;
//
//            // 더쿠는 링크로 들어가서 확인
//            $html2 = file_get_html($url);
//            $writer = '무명의 더쿠'; // 하드코딩
//            $time = $html2->find('.side')[1];
//            $time = $time->find('span')[0]->plaintext;
//            $views = $html2->find('.count_container')[0]->plaintext;
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }

        // 클리앙
        $html = file_get_html('https://www.clien.net/service/board/park?&od=T33&category=0&po=0');
        $claArr = array();
        $idx = 0;

        foreach ($html->find('.list_content > div') as $item){

//            $url = $item->find('.list_title > .list_subject', 0)->href;
//            $url = 'https://www.clien.net'.$url;
//            $title = $item->find('.list_subject')[0]->plaintext;
//            $writer = $item->find('.nickname')[0]->plaintext;
//            $time = $item->find('.timestamp')[0]->plaintext;
//            //상세페이지로 이동
//            $html2 = file_get_html($url);
//            $views = $html2->find('.view_count')[0]->plaintext;
//            $pos = strpos($url, 'park/');
//            $pos2 = strpos($url, '?od=');
//            $num = substr($url, $pos+5, $pos2 -($pos + 5));
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

            $idx++;
            if($idx==$idxMax)
                break;
        }

//        // 웃긴대학 인기자료
//        // 크롤링이 막혀 있어 우회함
//        $url = 'http://web.humoruniv.com/board/humor/list.html?table=pick';
//        // From https://gist.github.com/fijimunkii/952acac988f2d25bef7e0284bc63c406
//        $user_agents = [
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36",
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36",
//            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
//            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36",
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
//            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Safari/605.1.15",
//            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15",
//            "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0"
//        ];
//
//        // Get random user agent
//        $user_agent = $user_agents[rand(0,count($user_agents)-1)];
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
//        $exec = curl_exec($ch);
//
//        $html = str_get_html($exec);
//        $html2 = $html->find('#post_list tr');
//        $html3 = array();
//
//        for ($i=0; $i < count($html2) -1; $i++){
//            if ($i % 2 == 0){
//                array_push($html3, $html2[$i]);
//            }
//        }
//
////        $html = file_get_html('http://web.humoruniv.com/board/humor/list.html?table=pick');
//        $huArr = array();
//        $idx = 0;
//
//        foreach ($html3 as $item){
//
//            $url = $item->find('a')[1]->href;
//            $url = 'http://web.humoruniv.com/board/humor/'.$url;
//            $title = $item->find('a')[1]->plaintext;
//            $writer = $item->find('.hu_nick_txt')[0]->plaintext;
//            $time = $item->find('.li_date')[0]->plaintext;
//            $views = $item->find('.li_und')[0]->plaintext;
//            $views = preg_replace("/[^0-9]*/s", "", $views);
//            $pos = strpos($url, 'number=');
//            $num = substr($url, $pos+7);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";
//
//
//            $idx++;
//            if($idx==$idxMax)
//                break;
//        }


        // 보배드림
        $html = file_get_html('https://www.bobaedream.co.kr/list?code=best');
        $bbdrArr = array();
        $idx = 0;

        foreach ($html->find('.clistTable02 tbody tr') as $item){

//            $url = $item->find('.pl14 a')[0]->href;
//            $url = 'https://www.bobaedream.co.kr'.$url;
//            $title = $item->find('.pl14 a')[0]->plaintext;
//            $writer = $item->find('.author02')[0]->plaintext;
//            //링크로 상세뷰로 들어감
//            $html2 = file_get_html($url);
//            $toTime = $html2->find('.countGroup')[0]->plaintext;
//            $time = preg_replace("/[^0-9]*/s", "", $toTime);
//            $time = substr($time, -12, 12);
//            $views = $html->find('.count')[0]->plaintext;
//            $pos = strpos($url, '&No=');
//            $num = substr($url, $pos+4, 6);
//
//            echo $num;
//            echo "<br>";
//            echo $url;
//            echo "<br>";
//            echo $title;
//            echo "<br>";
//            echo $writer;
//            echo "<br>";
//            echo $time;
//            echo "<br>";
//            echo $views;
//            echo "<br>";

//            $idx++;
//            if($idx==$idxMax)
//                break;
        }


//        return view('bestList.bestList', [

//        ]);
    }
}
