<?php

namespace App\Console;

use App\Console\Commands\LamodaUpdate;
use App\Schedules\LamodaStockUpdate;
use App\Schedules\MyskladStockUpdate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        LamodaUpdate::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(new LamodaStockUpdate())
            ->description('Update Lamoda items from Mysklad')
            ->everySixHours();

        /*$schedule->call(new MyskladStockUpdate())
            ->description('Update Mysklad orders from Lamoda')
            ->everySixHours();*/
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
