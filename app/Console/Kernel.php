<?php

namespace App\Console;

use App\Jobs\CronDetailJob;
use App\Jobs\CronJob;
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
        $schedule->job(new CronJob)->everyMinute()->between('1:00', "3:00");
        $schedule->job(new CronDetailJob)->everyFiveMinutes()->between('1:00', "3:00");;
        $schedule->command('telescope:prune --hours=24')->dailyAt('00:01');
        $schedule->command('minio:move')->everyThirtyMinutes();

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
}
