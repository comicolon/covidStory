<?php

namespace App\Console;

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
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('10:30');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('11:30');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->dailyAt('23:30');
        $schedule->command('covidInfo:stackHistory')->timezone('Asia/Seoul')->everyMinute();
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
        '\App\Console\Commands\MakeCovidHistory',
    ];
}
