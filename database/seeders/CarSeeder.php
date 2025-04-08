<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'photo' => 'images/images gclass.jpeg',
            'brand' => 'cls63s',
            'model' => 2019,
            'fuel_type' => "gas",
            'price'=>600,
            'gearbox' => "manual",
            'available'=>true,

        ]);
    }
}
