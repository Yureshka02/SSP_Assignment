<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {

        $categories = [
            'Oil & Lubrication' => [
                'Synthetic Oil Change',
                'High-Mileage Oil Change',
                'Transmission Fluid Replacement',
                'Brake Fluid Replacement'
            ],
            'Tires & Wheels' => [
                'Tire Rotation',
                'Tire Replacement',
                'Wheel Alignment',
                'Flat Tire Repair'
            ],
            'Batteries & Electrical' => [
                'Battery Replacement',
                'Battery Testing',
                'Alternator Replacement',
                'Electrical Diagnostics'
            ],
            'Brakes & Suspension' => [
                'Brake Pad Replacement',
                'Brake Fluid Flush',
                'Suspension Inspection',
                'Shock Absorber Replacement'
            ],
            'Engine Services' => [
                'Engine Diagnostics',
                'Spark Plug Replacement',
                'Timing Belt Replacement',
                'Air Filter Replacement'
            ],
            'AC & Heating' => [
                'AC Recharge',
                'Heater Core Flush',
                'AC Compressor Replacement',
                'Cabin Air Filter Replacement'
            ],
            'Exterior & Accessories' => [
                'Windshield Wiper Replacement',
                'Headlight Restoration',
                'Car Wash & Detailing',
                'Paint Touch-Up'
            ]
        ];
        foreach ($categories as $category => $items) {
            $category = \App\Models\Category::create([
                'name' => $category,
                'description' => 'Category description',
                'sort_order' => 0,
                'status' => true
            ]);

            foreach ($items as $item) {
                \App\Models\Category::create([
                    'name' => $item,
                    'description' => 'Item description',
                    'sort_order' => 0,
                    'status' => true,
                    'parent_id' => $category->id
                ]);

            }
        }
    }
}
