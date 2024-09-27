<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Synthetic Oil Change',
                'category' => 'Oil & Lubrication',
                'description' => 'Full synthetic oil change for optimal engine performance and protection.',
                'price' => 75.00,
                'image' => 'https://example.com/images/synthetic-oil-change.jpg'
            ],
            [
                'name' => 'Transmission Fluid Replacement',
                'category' => 'Oil & Lubrication',
                'description' => 'Transmission fluid change to ensure smooth shifting and transmission longevity.',
                'price' => 120.00,
                'image' => 'https://example.com/images/transmission-fluid.jpg'
            ],
            [
                'name' => 'Tire Rotation',
                'category' => 'Tires & Wheels',
                'description' => 'Rotation of all four tires to ensure even wear and extend tire life.',
                'price' => 40.00,
                'image' => 'https://example.com/images/tire-rotation.jpg'
            ],
            [
                'name' => 'Flat Tire Repair',
                'category' => 'Tires & Wheels',
                'description' => 'Repair of punctured or damaged tires to get you back on the road.',
                'price' => 30.00,
                'image' => 'https://example.com/images/flat-tire-repair.jpg'
            ],
            [
                'name' => 'Battery Replacement',
                'category' => 'Batteries & Electrical',
                'description' => 'Installation of a new car battery, including proper disposal of the old battery.',
                'price' => 150.00,
                'image' => 'https://example.com/images/battery-replacement.jpg'
            ],
            [
                'name' => 'Electrical Diagnostics',
                'category' => 'Batteries & Electrical',
                'description' => 'Complete diagnostics of your vehicle\'s electrical system to identify any issues.',
                'price' => 85.00,
                'image' => 'https://example.com/images/electrical-diagnostics.jpg'
            ],
            [
                'name' => 'Brake Pad Replacement',
                'category' => 'Brakes & Suspension',
                'description' => 'Replacement of front and rear brake pads for improved stopping power.',
                'price' => 220.00,
                'image' => 'https://example.com/images/brake-pad-replacement.jpg'
            ],
            [
                'name' => 'Suspension Inspection',
                'category' => 'Brakes & Suspension',
                'description' => 'Thorough suspension inspection to ensure a smooth and safe ride.',
                'price' => 60.00,
                'image' => 'https://example.com/images/suspension-inspection.jpg'
            ],
            [
                'name' => 'AC Recharge',
                'category' => 'AC & Heating',
                'description' => 'Air conditioning recharge service to restore cold air to your vehicle.',
                'price' => 90.00,
                'image' => 'https://example.com/images/ac-recharge.jpg'
            ],
            [
                'name' => 'Headlight Restoration',
                'category' => 'Exterior & Accessories',
                'description' => 'Restore cloudy or yellowed headlights for improved visibility and appearance.',
                'price' => 50.00,
                'image' => 'https://example.com/images/headlight-restoration.jpg'
            ],
            [
                'name' => 'Brake Fluid Flush',
                'category' => 'Brakes & Suspension',
                'description' => 'Complete brake fluid replacement to ensure safe and responsive braking.',
                'price' => 100.00,
                'image' => 'https://example.com/images/brake-fluid-flush.jpg'
            ],
            [
                'name' => 'Air Filter Replacement',
                'category' => 'Engine Services',
                'description' => 'Replacement of the engine air filter for improved engine performance and efficiency.',
                'price' => 40.00,
                'image' => 'https://example.com/images/air-filter-replacement.jpg'
            ],
            [
                'name' => 'Spark Plug Replacement',
                'category' => 'Engine Services',
                'description' => 'Replacement of spark plugs to restore engine performance and fuel efficiency.',
                'price' => 80.00,
                'image' => 'https://example.com/images/spark-plug-replacement.jpg'
            ],
            [
                'name' => 'Windshield Wiper Replacement',
                'category' => 'Exterior & Accessories',
                'description' => 'Installation of new windshield wipers to ensure clear vision during bad weather.',
                'price' => 30.00,
                'image' => 'https://example.com/images/windshield-wiper-replacement.jpg'
            ],
            [
                'name' => 'Heater Core Flush',
                'category' => 'AC & Heating',
                'description' => 'Flushing of the heater core to restore effective heating in your vehicle.',
                'price' => 110.00,
                'image' => 'https://example.com/images/heater-core-flush.jpg'
            ]
        ];
        foreach ($products as $product) {
            $category = \App\Models\Category::where('name', $product['category'])->first();

            $product_object = \App\Models\Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category_id' => $category->id,
                'sort_order' => 0,
                'status' => true
            ]);

            //$product_object->addMediaFromUrl($product['image'])->toMediaCollection('featured');
        }
    }
}
