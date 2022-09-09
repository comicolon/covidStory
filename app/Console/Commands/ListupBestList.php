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
use App\Models\Combine_best_4h;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ListupBestList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bestList:ListupBestWriting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '각 사이트에서 가져온 글들에 순위를 매겨 디비에 저장하는 작업';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //4시간 베스트
        $totalArr = array();
        $now = Carbon::now();
        $to = $now->toDateTimeString();
        $nowBefore4h = $now->subHours(4);
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

        echo count($totalArr);

        // 디비에 넣어준다
//        Combine_best_4h::truncate();
        Combine_best_4h::query()->delete(); // 디비를 비워준다.

        $idx = 1;
        foreach ($totalArr as $item){

            $com_best_4h = new Combine_best_4h();

            $com_best_4h->rating = $idx;
            $com_best_4h->site_name = $item['site_name'];
            $com_best_4h->title = $item['title'];
            $com_best_4h->url = $item['url'];
            $com_best_4h->writer = $item['writer'];
            $com_best_4h->write_datetime = $item['write_datetime'];
            $com_best_4h->views = $item['views'];
            $com_best_4h->num = $item['num'];

            $com_best_4h->save();

            $idx++;
        }

        return 0;
    }
}
