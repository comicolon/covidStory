<?php

namespace App\Console;

use App\Console\Commands\CrawlingBestList;
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
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(26);
        $schedule->command('bestList:crawlingBestSite')->timezone('Asia/Seoul')->hourlyAt(51);

        //베스트글 정리 작업
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(01);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(16);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(31);
        $schedule->command('bestList:ListupBestWriting')->timezone('Asia/Seoul')->hourlyAt(46);
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
