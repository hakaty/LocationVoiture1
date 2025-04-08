<?php

namespace App\Console;

use App\Models\Rental;
use App\Console\Commands\DeleteExpiredRentals;
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
        // Register the custom command for deleting expired rentals
        DeleteExpiredRentals::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('rentals:delete-expired')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Load the routes for the commands
        $this->load(__DIR__.'/Commands');

        // Register the routes for the console commands
        require base_path('routes/console.php');
    }
}
