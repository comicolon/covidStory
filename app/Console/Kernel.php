<?php

namespace App\Console;

use App\Console\Commands\CrawlingBestList;
use App\Console\Commands\CrawlingHotdealList;
use App\Console\Commands\MakeCovidHistory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //코로나 히스토리 업데이트
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('10:05');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('10:15');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('10:30');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('10:45');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('11:00');

        //베스트글 크롤링
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(06)->runInBackground();
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(21)->runInBackground();
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(36)->runInBackground();
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(51)->runInBackground();

        //베스트글 정리 작업
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(15);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(30);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(45);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(00);

        // 시간이 지난 베스트글을 삭제
        $schedule->command('bestList:cutoutBestList')->timezone('Asia/Seoul')->dailyAt('04:01');
        $schedule->command('bestList:cutoutBestList')->timezone('Asia/Seoul')->dailyAt('17:01');

        // 핫딜 크롤링
        $schedule->command('hotdeal:CrawlingHotdeal')->timezone('Asia/Seoul')->hourlyAt(05)->after(function (){
            (new Commands\CrawlingHotdealList)->sortHotDealInDB();});
        $schedule->command('hotdeal:CrawlingHotdeal')->timezone('Asia/Seoul')->hourlyAt(20)->after(function (){
            (new Commands\CrawlingHotdealList)->sortHotDealInDB();});
        $schedule->command('hotdeal:CrawlingHotdeal')->timezone('Asia/Seoul')->hourlyAt(35)->after(function (){
            (new Commands\CrawlingHotdealList)->sortHotDealInDB();});
        $schedule->command('hotdeal:CrawlingHotdeal')->timezone('Asia/Seoul')->hourlyAt(50)->after(function (){
            (new Commands\CrawlingHotdealList)->sortHotDealInDB();});

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }

    protected $commands = [
        MakeCovidHistory::class,
        CrawlingBestList::class,
    ];
}
