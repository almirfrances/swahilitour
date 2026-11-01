<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 11; $i++) {
            $destination = new Destination();
            $destination->name = $faker->city;
            $destination->description = $faker->paragraph;
            $destination->country = $faker->country;
            $destination->visa_requirements = $faker->sentence;
            $destination->language_spoken = $faker->languageCode;
            $destination->currency_used = $faker->currencyCode;
            $destination->area = $faker->numberBetween(100, 10000); // in square kilometers

            // Handle images using Lorem Picsum
            $images = [];
            for ($j = 0; $j < 3; $j++) {
                $imageUrl = 'https://picsum.photos/640/480';
                $contents = file_get_contents($imageUrl);
                $filename = 'destination_' . $i . '_image_' . $j . '.jpg';
                $path = Storage::disk('public')->put('images/' . $filename, $contents);
                $images[] = 'images/' . $filename;
            }
            $destination->images = $images;

            // Handle FAQs
            $destination->faq = json_encode([
                ['question' => $faker->sentence, 'answer' => $faker->paragraph],
                ['question' => $faker->sentence, 'answer' => $faker->paragraph]
            ]);

            $destination->save();
        }
    }
}