<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            ['name' => 'Free WiFi', 'icon' => 'icon-wifi'],
            ['name' => 'Swimming Pool', 'icon' => 'icon-swimming-pool'],
            ['name' => 'Parking', 'icon' => 'icon-parking'],
            ['name' => 'Gym', 'icon' => 'icon-gym'],
            ['name' => 'Spa', 'icon' => 'icon-spa'],
            ['name' => 'Restaurant', 'icon' => 'icon-restaurant'],
            ['name' => 'Bar', 'icon' => 'icon-bar'],
            ['name' => 'Room Service', 'icon' => 'icon-room-service'],
            ['name' => 'Airport Shuttle', 'icon' => 'icon-airport-shuttle'],
            ['name' => 'Pet Friendly', 'icon' => 'icon-pet-friendly'],
            ['name' => 'Laundry Service', 'icon' => 'icon-laundry']
        ];

        foreach ($amenities as $amenity) {
            Amenity::create([
                'name' => $amenity['name'],
                'icon' => $amenity['icon']
            ]);
        }
    }
}