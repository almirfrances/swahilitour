<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Type;
use App\Models\Amenity;
use App\Models\Pricing;
use App\Models\Destination;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TourSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get existing type and destination IDs
        $types = Type::pluck('id')->all();
        $destinations = Destination::pluck('id')->all();
        $amenities = Amenity::pluck('id')->all();

        for ($i = 1; $i <= 10; $i++) {

                $tour = Tour::create([
                    'name' => $faker->unique()->sentence(3),
                    'duration' => $faker->randomElement(['3 days', '5 days', '7 days']),
                    'min_age' => $faker->numberBetween(10, 18),
                    'type_id' => $faker->randomElement($types),
                    'destination_id' => $faker->randomElement($destinations),
                    'overview' => $faker->paragraph,
                    'includes' => [$faker->sentence, $faker->sentence], // Store as array
                'excludes' => [$faker->sentence, $faker->sentence], // Store as array
                'tour_plan' => json_encode([
    [
        'title' => $faker->sentence(3), // Example title for Day 1
        'description' => $faker->paragraph, // Example description for Day 1
    ],
    [
        'title' => $faker->sentence(3), // Example title for Day 2
        'description' => $faker->paragraph, // Example description for Day 2
    ],
]), // Store as array of objects
                'images' => json_encode($this->generateImages($i)), // Encode images array
                'slug' => \Illuminate\Support\Str::slug($faker->sentence(3)),
                    'amenities' => json_encode(array_map('strval', $faker->randomElements($amenities, 3))), // Store as JSON
                ]);

                $tour->amenities()->attach($faker->randomElements($amenities, 3));


                // Generate Pricing Data
                Pricing::create([
                    'package_type' => Tour::class,
                    'package_id' => $tour->id,
                    'jan_resident_price' => $faker->randomFloat(2, 100, 500),
                    'jan_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'jan_discount' => $faker->numberBetween(5, 20),
                    'feb_resident_price' => $faker->randomFloat(2, 100, 500),
                    'feb_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'feb_discount' => $faker->numberBetween(5, 20),
                    'mar_resident_price' => $faker->randomFloat(2, 100, 500),
                    'mar_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'mar_discount' => $faker->numberBetween(5, 20),
                    'apr_resident_price' => $faker->randomFloat(2, 100, 500),
                    'apr_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'apr_discount' => $faker->numberBetween(5, 20),
                    'may_resident_price' => $faker->randomFloat(2, 100, 500),
                    'may_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'may_discount' => $faker->numberBetween(5, 20),
                    'jun_resident_price' => $faker->randomFloat(2, 100, 500),
                    'jun_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'jun_discount' => $faker->numberBetween(5, 20),
                    'jul_resident_price' => $faker->randomFloat(2, 100, 500),
                    'jul_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'jul_discount' => $faker->numberBetween(5, 20),
                    'aug_resident_price' => $faker->randomFloat(2, 100, 500),
                    'aug_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'aug_discount' => $faker->numberBetween(5, 20),
                    'sep_resident_price' => $faker->randomFloat(2, 100, 500),
                    'sep_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'sep_discount' => $faker->numberBetween(5, 20),
                    'oct_resident_price' => $faker->randomFloat(2, 100, 500),
                    'oct_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'oct_discount' => $faker->numberBetween(5, 20),
                    'nov_resident_price' => $faker->randomFloat(2, 100, 500),
                    'nov_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'nov_discount' => $faker->numberBetween(5, 20),
                    'dec_resident_price' => $faker->randomFloat(2, 100, 500),
                    'dec_foreign_price' => $faker->randomFloat(2, 150, 700),
                    'dec_discount' => $faker->numberBetween(5, 20),
                ]);

                DB::commit();

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
            $filename = 'tour_' . $index . '_image_' . $j . '.jpg';
            $contents = file_get_contents($imageUrl);
            Storage::disk('public')->put('images/' . $filename, $contents);
            $images[] = 'images/' . $filename;
        }
        return $images;
    }
}