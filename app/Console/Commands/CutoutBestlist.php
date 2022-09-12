<?php

namespace App\Console\Commands;

use App\Models\Best_bbdream;
use App\Models\Best_clien;
use App\Models\Best_dcinside;
use App\Models\Best_etoland;
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

class CutoutBestlist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bestList:cutoutBestList';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '기한이 지난 베스트 글들을 디비에서 삭제하는 명령';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bestDBArr = [
            Best_bbdream::class,
            Best_clien::class,
            Best_dcinside::class,
            Best_etoland::class,
            Best_fmkorea::class,
            Best_huniv::class,
            Best_instiz::class,
            Best_inven::class,
            Best_natepann::class,
            Best_ppomppu::class,
            Best_ruliweb::class,
            Best_slrclub::class,
            Best_theqoo::class,
        ];

        foreach ($bestDBArr as $item){

            $now = Carbon::now();
            $nowBefore36h = $now->subHours(36);
            $nowBefore36h = $nowBefore36h->toDateTimeString();

            $item::query()->where('write_datetime','<',$nowBefore36h)->delete();

        }





        return 0;
    }
}
