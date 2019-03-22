<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use DB;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        // System
        Commands\ResetAdminPassword::class,
        Commands\ClearFunctionalitiesData::class,
        Commands\CountTransaction::class,
        Commands\CleanCountTransactionData::class,

       /* // Issue
        Commands\MakeIssueListCache::class,*/

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        $schedule->command('count:transaction')->everyMinute();
        $schedule->command('clean:countTransactionData')->dailyAt('03:00');
    }
}
