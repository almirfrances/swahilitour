<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type; // Ensure this uses the correct namespace for your Type model

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Paragliding', 'icon' => 'icon-paragliding-5'],
            ['name' => 'Group Tour', 'icon' => 'icon-Group'],
            ['name' => 'Adventure', 'icon' => 'icon-hang-gliding-1'],
            ['name' => 'Family', 'icon' => 'icon-happy-Travel'],
            ['name' => 'Luxury', 'icon' => 'icon-star'],
            ['name' => 'Eco Tour', 'icon' => 'icon-wildlife'],
            ['name' => 'Cultural', 'icon' => 'icon-world-1'],
            ['name' => 'Romantic', 'icon' => 'icon-heart'],
            ['name' => 'Business', 'icon' => 'icon-briefcase'],
            ['name' => 'Solo', 'icon' => 'icon-user1'],
            ['name' => 'Budget', 'icon' => 'icon-low-price']
        ];

        foreach ($types as $type) {
            Type::create([
                'name' => $type['name'],
                'icon' => $type['icon']
            ]);
        }
    }
}