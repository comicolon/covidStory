<?php

namespace App\Console\Commands;

use App\Models\Best_bbdream;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
//        //4시간 베스트
//        $totalArr = array();
//        $now = Carbon::now();
//        $nowBefore4h = $now->subHours(4);
//        $nowBefore4h = $nowBefore4h-
//
////        $bbdrArr = Best_bbdream::where('write_datetime', '>=', $nowBefore4h )->get();
//        $bbdrArr = Best_bbdream::where('write_datetime', '<', $nowBefore4h )->get();
////        dd($bbdrArr);
//
//        foreach ($bbdrArr as $item){
//            var_dump($item->write_datetime);
//        }
//
//

        return 0;
    }
}
