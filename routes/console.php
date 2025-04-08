<?php


use Illuminate\Foundation\Inspiring;
use App\Models\Rental;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();


Artisan::command('rentals:delete-expired', function(){
    $currentDate = now();


    $rentalsToDelete = Rental::where('return_date', '<', $currentDate)
                             ->with('car') 
                             ->get();


    foreach ($rentalsToDelete as $rental) {
        if ($rental->car) {
            $rental->car->available = true;
            $rental->car->save();
        }
    }

    // Delete the rentals after updating car availability
    Rental::where('return_date', '<', $currentDate)->delete();
})->everyMinute();
