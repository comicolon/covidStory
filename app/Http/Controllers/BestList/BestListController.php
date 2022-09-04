<?php

namespace App\Http\Controllers\BestList;

use App\Http\Controllers\Controller;
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
        $SLEEP = 1;
        $idxMax = 30;

        // 디씨 인사이드 에서 가져오기
        $html = file_get_html('https://www.dcinside.com/');
        $dcArr = Array();
        $idx =0;
        //실시간 베스트 가져오기
        foreach($html->find('.time_best li > a') as $a ){

//            sleep($SLEEP);
//            $board_data = file_get_html ($a->href);
//
//            $url = $a->href;
//            $title = $board_data->find('.title_subject', 0);
//            $writer = $board_data->find('.gall_writer .nickname',0);
//            $time = $board_data->find('.time', 0);

//            echo $title;
//            echo "<br>";
//            echo $time;

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

//            echo $item->class;
//            echo "<br>";

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




//        return view('bestList.bestList', [

//        ]);
    }
}
