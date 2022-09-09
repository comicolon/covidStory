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
use App\Models\Combine_best_12h;
use App\Models\Combine_best_24h;
use App\Models\Combine_best_4h;
use App\Models\Combine_best_8h;
use App\Service\BigFunctions;
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
        $beforeH = 4;
        $totalArr = (new BigFunctions)->insertTotalArr($beforeH);

        $dbname = Combine_best_4h::class;
        (new BigFunctions)->insertTotalArrToDB($totalArr, $dbname);

        //8시간 베스트
        $beforeH = 8;
        $totalArr = (new BigFunctions)->insertTotalArr($beforeH);

        $dbname = Combine_best_8h::class;
        (new BigFunctions)->insertTotalArrToDB($totalArr, $dbname);

        //12시간 베스트
        $beforeH = 12;
        $totalArr = (new BigFunctions)->insertTotalArr($beforeH);

        $dbname = Combine_best_12h::class;
        (new BigFunctions)->insertTotalArrToDB($totalArr, $dbname);

        //24시간 베스트
        $beforeH = 24;
        $totalArr = (new BigFunctions)->insertTotalArr($beforeH);

        $dbname = Combine_best_24h::class;
        (new BigFunctions)->insertTotalArrToDB($totalArr, $dbname);

        //주간 베스트

        //월간 베스트

        return 0;
    }
}
