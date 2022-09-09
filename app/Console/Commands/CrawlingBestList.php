<?php

namespace App\Console\Commands;

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
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;


class CrawlingBestList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bestList:crawlingBestSite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '각 사이트를 돌아다니면서 베스트 리스트를 뽑아와 db에 저장하는 커맨드 이다.';

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
        require_once 'simple_html_dom.php';

        //상수 선언
        $sleepTimeM = 1500000;
        $idxMax = 30;

//        // 디씨 인사이드 에서 가져오기
//
//        $html = file_get_html('https://www.dcinside.com/');
//        $dcArr = array();
//        $idx = 0;//실시간 베스트 가져오기
//        foreach ($html->find('.time_best li > a') as $a) {
//
//            try {
//                usleep($sleepTimeM);
//                $board_data = file_get_html($a->href);
//                $url = $a->href;
//                $title = $board_data->find('.title_subject', 0)->plaintext;
//                $writer = $board_data->find('.gall_writer .nickname', 0)->plaintext;
//                $time = $board_data->find('.gall_date')[0]->plaintext;
//                $datetime = date_create_from_format('Y.m.d H:i:s', $time);
//                $views = $board_data->find('.gall_count')[0]->plaintext;
//                $views = preg_replace("/[^0-9]*/s", "", $views);
//                $pos = strpos($url, '&no=');
//                $num = substr($url, $pos + 4);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($dcArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('디씨인사이드 가져오기 실패',['error : '=>$e]);
//            }
//        }
//        //디비에 넣어준다.
//        foreach ($dcArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_dcinside::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_dcinside();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('디씨인사이드 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        // slr 클럽 가져오기
//        //인기글
//
//
//        $html = file_get_html('http://www.slrclub.com/bbs/zboard.php?id=hot_article');
//        $slrArr = array();
//        $idx = 0;
//        foreach ($html->find('.bbs_tbl_layout tbody tr') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $a = $item->find('a')[0];
//                $url = $a->href;
//                $url = str_replace('amp;', '', $url);
//                $url = 'http://www.slrclub.com' . $url;
//                $title = $a->plaintext;
//                $writer = $item->find('.list_name .lop')[0]->plaintext;
//                $html2 = file_get_html($url);
//                $time = trim($html2->find('.date')[0]->plaintext);
//                $datetime = date_create_from_format('Y/m/d H:i:s', $time);
//                $views = $item->find('.list_click')[0]->plaintext;
//                $num = $item->find('.list_num')[0]->plaintext;
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($slrArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('에세랄클럽 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($slrArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_slrclub::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_slrclub();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('에세랄클럽 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //루리웹 가져오기
//        //유머 게시판 베스트 글
//
//
//        $html = file_get_html('https://bbs.ruliweb.com/community/board/300143?view_best=1');
//        $rrwArr = array();
//        $idx = 0;
//        foreach ($html->find('[class=table_body blocktarget]') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $num = trim($item->find('.id')[0]->plaintext);
//                $url = $item->find('.relative a')[0]->href;
//                $title = trim($item->find('.relative a')[0]->plaintext);
//                $writer = trim($item->find('.writer a')[0]->plaintext);
//                $html2 = file_get_html($url);
//                $time = $html2->find('.regdate')[0]->plaintext;
//                $time = preg_replace("/[^0-9]*/s", "", $time);
//                $datetime = date_create_from_format('YmdHis', $time);
//                $views = $item->find('.hit')[0]->plaintext;
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($rrwArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('루리웹 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($rrwArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_ruliweb::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_ruliweb();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('루리웹 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //에펨코리아 가져오기
//
//
//        $html = file_get_html('https://www.fmkorea.com/index.php?mid=humor&sort_index=pop&order_type=desc&listStyle=list&page=1');
//        $fmkArr = array();
//        $idx = 0;
//        foreach ($html->find('tbody tr') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                if ($item->class != 'notice notice_pop0' && $item->class != 'notice notice_pop0 show_folded_notice') {
//
//                    $url = $item->find('a')[0]->href;
//                    $url = 'https://www.fmkorea.com' . $url;
//                    $url = str_replace('amp;', '', $url);
//                    $title = trim($item->find('.title a')[0]->plaintext);
//                    $writer = trim($item->find('.author a')[0]->plaintext);
//                    $html2 = file_get_html($url);
//                    $time = $html2->find('.date')[0]->plaintext;
//                    $datetime = date_create_from_format('Y.m.d H:i', $time);
//                    $views = $item->find('.m_no')[0]->plaintext;
//                    $pos = strpos($url, 'document_srl=');
//                    $num = trim(substr($url, $pos + 13));
//                }
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($fmkArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('에펨코리아 가져오기 실패',['error : '=>$e]);
//            }
//        }
//        //디비에 넣어준다.
//        foreach ($fmkArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_fmkorea::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_fmkorea();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('에펨코리아 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //네이트 판
//
//
//        $html = file_get_html('https://pann.nate.com/talk/ranking');
//        $ntpArr = array();
//        $idx = 0;
//        foreach ($html->find('.post_wrap li') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('dl a')[0]->href;
//                $url = 'https://pann.nate.com' . $url;
//                $title = $item->find('dl a')[0]->title;
//                $writer = 'ㅇㅇ';
//                $html2 = file_get_html($url);
//                $time = trim($html2->find('.date')[0]->plaintext);
//                $datetime = date_create_from_format('Y.m.d H:i', $time);
//                $views = $item->find('.count')[0]->plaintext;
//                $views = preg_replace("/[^0-9]*/s", "", $views);
//                $pos = strpos($url, 'talk/');
//                $num = substr($url, $pos + 5);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($ntpArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('네이트판 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($ntpArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_natepann::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_natepann();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('네이트판 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        // 인벤 오픈 이슈 갤러리
//
//        $html = file_get_html('https://www.inven.co.kr/board/webzine/2097?iskin=webzine');
//        $ivArr = array();
//        $idx = 0;
//        foreach ($html->find('.open-issue-list li') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('a')[0]->href;
//                $title = $item->find('a .txt')[0]->plaintext;
//                $html_dt = file_get_html($url);
//                $writer = substr($html_dt->find('.articleWriter span')[0]->plaintext, 6);
//                $time = $html_dt->find('.articleDate')[0]->plaintext;
//                $datetime = date_create_from_format('Y-m-d H:i', $time);
//                $views = $html_dt->find('.articleHit')[0]->plaintext;
//                $views = preg_replace("/[^0-9]*/s", "", $views);
//                $num = $html_dt->find('.articleBotUrl a')[1]->href;
//                $pos = strpos($num, '2097/');
//                $num = substr($num, $pos + 5);
//                $pos = strpos($num, '?iskin');
//                $num = substr($num, 0, $pos);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($ivArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('인벤 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($ivArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_inven::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_inven();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('인벤 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //뽐뿌 핫게시글
//
//
//        $html = file_get_html('https://www.ppomppu.co.kr/hot.php');
//        $ppArr = array();
//        $idx = 0;
//        foreach ($html->find('.line') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('a')[1]->href;
//                $url = 'https://www.ppomppu.co.kr' . $url;
//                $url = str_replace('zboard.php', 'view.php', $url);
//                $title = $item->find('a')[1]->plaintext;
//                $writer = $item->find('td')[1]->plaintext;
//                $html2 = file_get_html($url);
//                $timeText = $html2->find('.han')[1]->plaintext;
//                $pos = mb_strpos($timeText, '등록일: ');
//                $time = trim(mb_substr($timeText, $pos + 5, 21));
//                $time = preg_replace("/[^0-9]*/s", "", $time);
//                $datetime = date_create_from_format('YmdHi', $time);
//                $views = $item->find('.board_date')[2]->plaintext;
//                $pos = strpos($url, '&no=');
//                $num = substr($url, $pos + 4);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($ppArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('뽐뿌 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($ppArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_ppomppu::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_ppomppu();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('뽐뿌 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //더쿠 핫게시판
//
//
//        $html = file_get_html('https://theqoo.net/hot');
//        $dqArr = array();
//        $idx = 0;
//        $html = $html->find('tbody tr');
//        $html2 = array_slice($html, 6);
//        foreach ($html2 as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('.title a')[0]->href;
//                $url = 'https://theqoo.net' . $url;
//                $title = $item->find('.title a')[0]->plaintext;
//                $num = $item->find('.no')[0]->plaintext;// 더쿠는 링크로 들어가서 확인
//                $html2 = file_get_html($url);
//                $writer = '무명의 더쿠';// 하드코딩
//                $time = $html2->find('.side')[1];
//                $time = $time->find('span')[0]->plaintext;
//                $datetime = date_create_from_format('Y.m.d H:i', $time);
//                $views = trim($html2->find('.count_container')[0]->plaintext);
//                $pos = strpos($views, '  ');
//                $views = substr($views, 0, $pos);
//                $views = preg_replace("/[^0-9]*/s", "", $views);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($dqArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('더쿠 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($dqArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_theqoo::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_theqoo();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('더쿠 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        // 클리앙
//
//
//        $html = file_get_html('https://www.clien.net/service/board/park?&od=T33&category=0&po=0');
//        $claArr = array();
//        $idx = 0;
//        foreach ($html->find('.list_content > div') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('.list_title > .list_subject', 0)->href;
//                $url = 'https://www.clien.net' . $url;
//                $title = trim($item->find('.list_subject')[0]->plaintext);
//                $writer = trim($item->find('.nickname')[0]->plaintext);
//                $time = $item->find('.timestamp')[0]->plaintext;
//                $datetime = date_create_from_format('Y-m-d H:i:s', $time);//상세페이지로 이동
//                $html2 = file_get_html($url);
//                $views = $html2->find('.view_count')[0]->plaintext;
//                $views = preg_replace("/[^0-9]*/s", "", $views);
//                $pos = strpos($url, 'park/');
//                $pos2 = strpos($url, '?od=');
//                $num = substr($url, $pos + 5, $pos2 - ($pos + 5));
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($claArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('클리앙 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($claArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_clien::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_clien();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('클리앙 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
////
////        // 웃긴대학 인기자료
////	try {
////            // 크롤링이 막혀 있어 우회함
////            $url = 'http://web.humoruniv.com/board/humor/list.html?table=pick';
////            // From https://gist.github.com/fijimunkii/952acac988f2d25bef7e0284bc63c406
////            $user_agents = [
////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36"
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36",
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0",
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36",
//////                "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36",
//////                "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36",
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
//////                "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Safari/605.1.15",
//////                "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15",
//////                "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0"
////            ];
////            // Get random user agent
////            $user_agent = $user_agents[rand(0, count($user_agents) - 1)];
////            $ch = curl_init();
////            curl_setopt($ch, CURLOPT_URL, $url);
////            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
////            $exec = curl_exec($ch);
////            $html = str_get_html($exec);
////
////            $huArr = array();
////	        $idx = 0;
////
////            for ($i=0; $i < count($htmlTitle); $i++) {
////
//////                usleep($sleepTimeM);
//////                $url = $item->find('a')[1]->href;
//////                $url = 'http://web.humoruniv.com/board/humor/' . $url;
//////                $title = trim($item->find('a')[1]->plaintext);
//////                $title =  preg_replace('/\[\d+\]/','',$title);
//////                $title = trim($title);
//////                $writer = $item->find('.hu_nick_txt')[0]->plaintext;
//////                $time = trim($item->find('.li_date')[0]->plaintext);
//////                $datetime = date_create_from_format('Y-m-d H:i', $time);
//////                $views = $item->find('.li_und')[0]->plaintext;
//////                $views = preg_replace("/[^0-9]*/s", "", $views);
//////                $pos = strpos($url, 'number=');
//////                $num = substr($url, $pos + 7);
//////
//////
//////
//////                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//////                $arr = array(
//////                    'title' => $title,
//////                    'url' => $url,
//////                    'writer' => $writer,
//////                    'datetime' => $datetime,
//////                    'views' => $views,
//////                    'num' => $num,
//////                );
//////                array_push($huArr, $arr);
//////
//////                $idx++;
//////                if ($idx == $idxMax)
//////                    break;
////            }
////            //디비에 넣어준다.
//////            foreach ($huArr as $item) {
//////
//////                //먼저 있는것과 비교해서 있으면 업데이트 해준다.
//////                $beforeBe = Best_huniv::where('num', $item['num'])->first();
//////                if ($beforeBe != null) {
//////
//////                    $beforeBe->views = $item['views'];
//////                    $beforeBe->save();
//////                } else {
//////                    $nowBest = new Best_huniv();
//////
//////                    $nowBest->title = $item['title'];
//////                    $nowBest->url = $item['url'];
//////                    $nowBest->writer = $item['writer'];
//////                    $nowBest->write_datetime = $item['datetime'];
//////                    $nowBest->views = $item['views'];
//////                    $nowBest->num = $item['num'];
//////
//////                    $nowBest->save();
//////                }
//////            }
////        } catch (\Exception $e) {
////            Log::info('웃긴대학 가져오기 실패',['error : '=>$e]);
////        }
//
//
//        // 보배드림
//
//
//        $html = file_get_html('https://www.bobaedream.co.kr/list?code=best');
//        $bbdrArr = array();
//        $idx = 0;
//        foreach ($html->find('.clistTable02 tbody tr') as $item) {
//
//            try {
//                usleep($sleepTimeM);
//                $url = $item->find('.pl14 a')[0]->href;
//                $url = 'https://www.bobaedream.co.kr' . $url;
//                $title = trim($item->find('.pl14 a')[0]->plaintext);
//                $writer = trim($item->find('.author02')[0]->plaintext);
//                $views = $item->find('.count')[0]->plaintext;//링크로 상세뷰로 들어감
//                $html2 = file_get_html($url);
//                $toTime = $html2->find('.countGroup')[0]->plaintext;
//                $time = preg_replace("/[^0-9]*/s", "", $toTime);
//                $time = substr($time, -12, 12);
//                $datetime = date_create_from_format('YmdHi', $time);
//                $pos = strpos($url, '&No=');
//                $num = substr($url, $pos + 4, 6);
//
//                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
//                $arr = array(
//                    'title' => $title,
//                    'url' => $url,
//                    'writer' => $writer,
//                    'datetime' => $datetime,
//                    'views' => $views,
//                    'num' => $num,
//                );
//                array_push($bbdrArr, $arr);
//                $idx++;
//                if ($idx == $idxMax)
//                    break;
//            } catch (\Exception $e) {
//                Log::info('보배드림 가져오기 실패',['error : '=>$e]);
//            }
//        }//디비에 넣어준다.
//        foreach ($bbdrArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_bbdream::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_bbdream();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('보배드림 디비넣기 실패',['error : '=>$e]);
//            }
//        }
//
//
//
//        //인스티즈
        $html = file_get_html('https://www.instiz.net/pt?&srd=1&srt=3&k=&stype=&stype2=&stype3=');
        $istzArr = array();
        $idx = 0;

        $html2 = $html->find('tr');

        for ($i = 0; $i < count($html2)-1; $i++) {

            try {
                if ($i < 20) {
                    continue;
                }
                usleep($sleepTimeM);
                $title = trim($html2[$i]->find('.listsubject')[0]->plaintext);
                $url = $html2[$i]->find('a')[0]->href;
                $url = substr($url , 2);
                $url = 'https://www.instiz.net' . $url;
                $writer = trim($html2[$i]->find('.minitext2')[0]->plaintext);
                $views = $html2[$i]->find('.listno')[1]->plaintext;
                $pos = strpos($url, '/pt/');
                $pos2 = strpos($url, '?page=');
                $num = substr($url, $pos + 4, $pos2 - $pos - 4);
                $time = $html2[$i]->find('.regdate')[0]->plaintext;
                $nowTime = Carbon::now();
                if (preg_match('/분 전/', $time)) {
                    $timeDiff = preg_replace("/[^0-9]*/s", "", $time);
                    $time = $nowTime->subMinutes($timeDiff);
                    $datetime = $time->toDateTime();
                } elseif (preg_match('/시간 전/', $time)) {
                    $timeDiff = preg_replace("/[^0-9]*/s", "", $time);
                    $time = $nowTime->subHours($timeDiff);
                    $datetime = $time->toDateTime();
                }

                //중첩 배열로 만들어 준다 한번에 디비에 넣기 위함
                $arr = array(
                    'title' => $title,
                    'url' => $url,
                    'writer' => $writer,
                    'datetime' => $datetime,
                    'views' => $views,
                    'num' => $num,
                );
                array_push($istzArr, $arr);
            } catch (\Exception $e) {
                Log::info('인스티즈 가져오기 실패',['error : '=>$e]);
            }

        }
//
//        //디비에 넣어준다.
//        foreach ($istzArr as $item) {
//
//            try {//먼저 있는것과 비교해서 있으면 업데이트 해준다.
//                $beforeBe = Best_instiz::where('num', $item['num'])->first();
//                if ($beforeBe != null) {
//
//                    $beforeBe->views = $item['views'];
//                    $beforeBe->save();
//                } else {
//                    $nowBest = new Best_instiz();
//
//                    $nowBest->title = $item['title'];
//                    $nowBest->url = $item['url'];
//                    $nowBest->writer = $item['writer'];
//                    $nowBest->write_datetime = $item['datetime'];
//                    $nowBest->views = $item['views'];
//                    $nowBest->num = $item['num'];
//
//                    $nowBest->save();
//                }
//            } catch (\Exception $e) {
//                Log::info('인스티즈 디비넣기 실패',['error : '=>$e]);
//            }
//        }

        return 0;
    }
}
