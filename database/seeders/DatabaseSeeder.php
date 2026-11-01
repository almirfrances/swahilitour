<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TourSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\HotelSeeder;
use Database\Seeders\AmenitySeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\SettingsSeeder;
use Database\Seeders\DestinationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(TourSeeder::class);
        $this->call(HotelSeeder::class);


    }
}