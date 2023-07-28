<?php

namespace App\Console;

use App\Console\Commands\Apps\AppNoticeError;
use App\Console\Commands\Apps\AppNoticeHealth;
use App\Console\Commands\Test\Test;
use App\Console\Commands\Test\TestSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * 注册命令
     * The Artisan commands provided by your application.
     * @var array
     */
    protected $commands = [
        Test::class,
        TestSchedule::class,
        AppNoticeError::class, //应用错误预警
        AppNoticeHealth::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //每分钟执行
        $schedule->command(TestSchedule::class)->everyMinute()->withoutOverlapping()->runInBackground();

        //应用错误预警
        $schedule->command(AppNoticeError::class)->everyMinute()->withoutOverlapping()->runInBackground();
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
