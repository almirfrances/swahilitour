<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room; // Import the Room model
use App\Models\Amenity;
use App\Models\Destination;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get existing destination IDs and amenity IDs
        $destinations = Destination::pluck('id')->all();
        $amenities = Amenity::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {
            // Create a hotel
            $hotel = Hotel::create([
                'name' => $faker->unique()->sentence(3),
                'destination_id' => $faker->randomElement($destinations), // Make sure to use existing destination IDs
                'slug' => \Illuminate\Support\Str::slug($faker->sentence(3)),
                'images' => $this->generateImages($i), // Store images as an array
                'overview' => $faker->paragraph,
                'amenities' => $faker->randomElements($amenities, 3), // Store as an array
                'status' => $faker->randomElement(['active', 'inactive', 'under_maintenance']),
                'starting_price' => $faker->randomFloat(2, 50, 500),
                'featured' => $faker->boolean,
            ]);

            // Attach amenities (many-to-many relationship)
            $hotel->amenities()->attach($faker->randomElements($amenities, 3)); // Attach random amenities

            // Create rooms for the hotel
            $this->createRooms($hotel, $faker);
        }
    }

    /**
     * Generate random images using Lorem Picsum.
     *
     * @param int $index
     * @return array
     */
    private function generateImages($index)
{
    $images = [];
    for ($j = 0; $j < 3; $j++) {
        $imageUrl = 'https://picsum.photos/640/480?random=' . $index . $j; // Unique URL for different images
        $filename = 'hotel_' . $index . '_image_' . $j . '.jpg';
        $contents = file_get_contents($imageUrl);
        // Store the image in the public/hotel_images directory
        Storage::disk('public')->put('hotel_images/' . $filename, $contents);
        $images[] = 'hotel_images/' . $filename; // Store the path to the image
    }
    return $images; // Return the array of image paths
}

    /**
     * Create rooms for the given hotel.
     *
     * @param Hotel $hotel
     * @param \Faker\Generator $faker
     */
    private function createRooms(Hotel $hotel, $faker)
    {
        for ($j = 0; $j < 5; $j++) { // Create 5 rooms per hotel
            $hotel->rooms()->create([
                'room_name' => 'Room ' . ($j + 1),
                'price' => $faker->randomFloat(2, 50, 300),
                'capacity' => $faker->randomFloat(2, 5),
                'room_type' => $faker->randomElement(['single', 'double', 'suite', 'family']),
                'is_available' => $faker->boolean,
                'status' => $faker->randomElement(['available', 'booked', 'under_maintenance']),
            ]);
        }
    }
}