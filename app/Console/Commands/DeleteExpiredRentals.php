<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rental;

class DeleteExpiredRentals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rentals:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete rentals where the return date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
{
    // Get current date
    $currentDate = now();

    // Find and delete rentals with a return date in the past, eager load the car relationship
    $rentalsToDelete = Rental::where('return_date', '<', $currentDate)
                             ->with('car') // Eager load the car relationship
                             ->get();

    // Update the availability of the corresponding cars
    foreach ($rentalsToDelete as $rental) {
        if ($rental->car) { // Check if the car exists
            // Update the car's availability to true
            $rental->car->available = true;
            $rental->car->save();
        }
    }

    // Delete the rentals after updating car availability
    Rental::where('return_date', '<', $currentDate)->delete();

    // Step 2: Delete rentals that are "canceled" for more than 24 hours
     Rental::where('status', 'canceled')
    ->where('updated_at', '<', $currentDate) // 24 hours ago
    ->delete();

    

    $this->info('Expired rentals deleted successfully and car availability updated.');
}

}
