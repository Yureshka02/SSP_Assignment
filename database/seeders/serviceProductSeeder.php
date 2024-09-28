<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class serviceProductSeeder extends Seeder
{
    public function run(): void
    {
        $serviceProducts = [
            // Maintenance Services
            [
                'name' => 'Oil Change',
                'category' => 'Maintenance Services',
                'description' => 'Complete oil change service to keep your engine running smoothly.',
                'price' => 70.00,
                'image' => 'https://kosttirepa.com/wp-content/uploads/2013/02/m1-oil-filter.png'
            ],
            [
                'name' => 'Fluid Checks & Top-Offs',
                'category' => 'Maintenance Services',
                'description' => 'Check and top off all vehicle fluids including coolant, brake, and power steering fluids.',
                'price' => 25.00,
                'image' => 'https://m.media-amazon.com/images/I/91sI6FBNgJL.jpg'
            ],
            [
                'name' => 'Tire Rotation',
                'category' => 'Maintenance Services',
                'description' => 'Rotate your tires to promote even wear and extend tire life.',
                'price' => 40.00,
                'image' => 'https://m.media-amazon.com/images/I/71sV6GxXZxL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Brake Pad Replacement',
                'category' => 'Maintenance Services',
                'description' => 'Replace worn brake pads to ensure safe stopping power.',
                'price' => 150.00,
                'image' => 'https://m.media-amazon.com/images/I/91G6vhZZudL._AC_UF1000,1000_QL80_.jpg'
            ],

            // Repair Services
            [
                'name' => 'Engine Repair',
                'category' => 'Repair Services',
                'description' => 'Comprehensive engine repair for vehicles experiencing performance issues.',
                'price' => 500.00,
                'image' => 'https://m.media-amazon.com/images/I/71HxzIr3pwL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'name' => 'Transmission Repair',
                'category' => 'Repair Services',
                'description' => 'Transmission repair to resolve shifting issues and ensure smooth performance.',
                'price' => 1200.00,
                'image' => 'https://m.media-amazon.com/images/I/81ZKzN6+LEL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Suspension Repair',
                'category' => 'Repair Services',
                'description' => 'Repair damaged suspension components to restore vehicle handling and ride comfort.',
                'price' => 600.00,
                'image' => 'https://m.media-amazon.com/images/I/71h8qfepHHL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'name' => 'Radiator Replacement',
                'category' => 'Repair Services',
                'description' => 'Replace faulty radiators to prevent engine overheating.',
                'price' => 450.00,
                'image' => 'https://m.media-amazon.com/images/I/71nEjfxMm8L._AC_UF894,1000_QL80_.jpg'
            ],

            // Diagnostic Services
            [
                'name' => 'Check Engine Light Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Diagnostic service to identify the cause of your check engine light.',
                'price' => 80.00,
                'image' => 'https://m.media-amazon.com/images/I/61445vy+pNL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Electrical System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Complete diagnostics of the electrical system to find issues with the battery or alternator.',
                'price' => 90.00,
                'image' => 'https://m.media-amazon.com/images/I/81O4gmmCrBL.jpg'
            ],
            [
                'name' => 'Exhaust System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Diagnose exhaust system problems, including leaks and sensor failures.',
                'price' => 85.00,
                'image' => 'https://m.media-amazon.com/images/I/81nqKr9bEmL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'AC System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Identify issues with the air conditioning system and ensure optimal performance.',
                'price' => 100.00,
                'image' => 'https://m.media-amazon.com/images/I/51RRxr4f5HL._AC_UF1000,1000_QL80_.jpg'
            ],

            // Body & Interior Services
            [
                'name' => 'Dent Repair',
                'category' => 'Body & Interior Services',
                'description' => 'Professional dent repair service to restore your vehicle’s exterior to its original condition.',
                'price' => 150.00,
                'image' => 'https://m.media-amazon.com/images/I/71tnnk1n88L._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'name' => 'Windshield Replacement',
                'category' => 'Body & Interior Services',
                'description' => 'Full windshield replacement to ensure a clear and safe view of the road.',
                'price' => 300.00,
                'image' => 'https://m.media-amazon.com/images/I/618HlQAa+EL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Interior Detailing',
                'category' => 'Body & Interior Services',
                'description' => 'Thorough cleaning and detailing of the interior to refresh your vehicle’s appearance.',
                'price' => 200.00,
                'image' => 'https://m.media-amazon.com/images/I/91sI6FBNgJL.jpg'
            ],
            [
                'name' => 'Paintless Dent Repair',
                'category' => 'Body & Interior Services',
                'description' => 'Repair small dents without the need for repainting your vehicle.',
                'price' => 180.00,
                'image' => 'https://m.media-amazon.com/images/I/71tnnk1n88L._AC_UF894,1000_QL80_.jpg'
            ],

            // Performance Services
            [
                'name' => 'Performance Tuning',
                'category' => 'Performance Services',
                'description' => 'Maximize your vehicle’s horsepower and torque with performance tuning services.',
                'price' => 350.00,
                'image' => 'https://m.media-amazon.com/images/I/81ZKzN6+LEL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Turbocharger Installation',
                'category' => 'Performance Services',
                'description' => 'Turbocharger installation to increase engine power and performance.',
                'price' => 2000.00,
                'image' => 'https://m.media-amazon.com/images/I/71HxzIr3pwL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'name' => 'Exhaust System Upgrade',
                'category' => 'Performance Services',
                'description' => 'Upgrade your exhaust system for improved performance and sound.',
                'price' => 700.00,
                'image' => 'https://m.media-amazon.com/images/I/71H2+pjghfL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'name' => 'Cold Air Intake Installation',
                'category' => 'Performance Services',
                'description' => 'Improve engine efficiency with a cold air intake installation.',
                'price' => 400.00,
                'image' => 'https://m.media-amazon.com/images/I/61RAEzRAAFL._AC_UF894,1000_QL80_.jpg'
            ],

            // Custom Services
            [
                'name' => 'Custom Paint Jobs',
                'category' => 'Custom Services',
                'description' => 'Custom paint jobs to give your car a unique look and shine.',
                'price' => 1500.00,
                'image' => 'https://m.media-amazon.com/images/I/91sI6FBNgJL.jpg'
            ],
            [
                'name' => 'Window Tinting',
                'category' => 'Custom Services',
                'description' => 'Professional window tinting to enhance privacy and reduce glare.',
                'price' => 200.00,
                'image' => 'https://m.media-amazon.com/images/I/71WqxZbtERL.jpg'
            ],
            [
                'name' => 'Custom Interior Upholstery',
                'category' => 'Custom Services',
                'description' => 'Redesign your interior with custom upholstery for a luxurious feel.',
                'price' => 1200.00,
                'image' => 'https://m.media-amazon.com/images/I/61n6mgBSvEL._AC_UF894,1000_QL80_.jpg'
            ],


            // Emergency Services
            [
                'name' => 'Roadside Assistance',
                'category' => 'Emergency Services',
                'description' => 'Get immediate help for breakdowns, flat tires, and other roadside issues.',
                'price' => 100.00,
                'image' => 'https://m.media-amazon.com/images/I/81jjF4tCHlL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Towing Service',
                'category' => 'Emergency Services',
                'description' => 'Fast and reliable towing service to transport your vehicle to a nearby shop.',
                'price' => 150.00,
                'image' => 'https://m.media-amazon.com/images/I/71Hb+SnSopL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Jump Start Service',
                'category' => 'Emergency Services',
                'description' => 'Battery jump start service to get you back on the road quickly.',
                'price' => 50.00,
                'image' => 'https://m.media-amazon.com/images/I/61j2sdcbB9L._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'name' => 'Lockout Assistance',
                'category' => 'Emergency Services',
                'description' => 'Get help to unlock your car if you’ve accidentally locked yourself out.',
                'price' => 75.00,
                'image' => 'https://m.media-amazon.com/images/I/71yNHEnfnUL._AC_UF1000,1000_QL80_.jpg'
            ]

        ];

        foreach ($serviceProducts as $product ) {
            $category = \App\Models\serviceCategory::where('name', $product['category'])->first();

            $serviceProducts_object = \App\Models\serviceProduct::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'service_category_id' => $category->id,
                'sort_order' => 0,
                'status' => true,
            ]);

            //$serviceProducts_object->addMediaFromUrl($product['image'])->toMediaCollection('serviceProduct');
        }
    }
}
