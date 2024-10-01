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
            ],
            [
                'name' => 'Fluid Checks & Top-Offs',
                'category' => 'Maintenance Services',
                'description' => 'Check and top off all vehicle fluids including coolant, brake, and power steering fluids.',
                'price' => 25.00,
            ],
            [
                'name' => 'Tire Inspection & Rotation',
                'category' => 'Maintenance Services',
                'description' => 'Inspect and rotate tires to promote even wear and extend tire life.',
                'price' => 40.00,
            ],
            [
                'name' => 'Brake Inspection',
                'category' => 'Maintenance Services',
                'description' => 'Inspect brake components to ensure optimal braking performance.',
                'price' => 45.00,
            ],

            // Repair Services
            [
                'name' => 'Engine Repair',
                'category' => 'Repair Services',
                'description' => 'Comprehensive engine repair for vehicles experiencing performance issues.',
                'price' => 500.00,
            ],
            [
                'name' => 'Transmission Repair',
                'category' => 'Repair Services',
                'description' => 'Transmission repair to resolve shifting issues and ensure smooth performance.',
                'price' => 1200.00,
            ],
            [
                'name' => 'Exhaust System Repair',
                'category' => 'Repair Services',
                'description' => 'Repair exhaust systems to fix leaks and improve efficiency.',
                'price' => 300.00,
            ],
            [
                'name' => 'Suspension Repair',
                'category' => 'Repair Services',
                'description' => 'Repair damaged suspension components to restore vehicle handling and ride comfort.',
                'price' => 600.00,
            ],

            // Diagnostic Services
            [
                'name' => 'Check Engine Light Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Diagnostic service to identify the cause of your check engine light.',
                'price' => 80.00,
            ],
            [
                'name' => 'Electrical System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Complete diagnostics of the electrical system to find issues with the battery or alternator.',
                'price' => 90.00,
            ],
            [
                'name' => 'Battery & Charging System Check',
                'category' => 'Diagnostic Services',
                'description' => 'Test the battery and charging system for optimal performance.',
                'price' => 60.00,
            ],
            [
                'name' => 'Cooling System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Inspect and diagnose issues within the cooling system to prevent overheating.',
                'price' => 70.00,
            ],

            // Body & Interior Services
            [
                'name' => 'Dent Repair',
                'category' => 'Body & Interior Services',
                'description' => 'Professional dent repair service to restore your vehicle’s exterior to its original condition.',
                'price' => 150.00,
            ],
            [
                'name' => 'Interior Cleaning & Detailing',
                'category' => 'Body & Interior Services',
                'description' => 'Thorough cleaning and detailing of the interior to refresh your vehicle’s appearance.',
                'price' => 200.00,
            ],
            [
                'name' => 'Windshield Replacement',
                'category' => 'Body & Interior Services',
                'description' => 'Full windshield replacement to ensure a clear and safe view of the road.',
                'price' => 300.00,
            ],
            [
                'name' => 'Headlight Replacement',
                'category' => 'Body & Interior Services',
                'description' => 'Replace damaged or burned-out headlights for improved visibility.',
                'price' => 120.00,
            ],

            // Performance Services
            [
                'name' => 'Performance Tuning',
                'category' => 'Performance Services',
                'description' => 'Maximize your vehicle’s horsepower and torque with performance tuning services.',
                'price' => 350.00,
            ],
            [
                'name' => 'Turbocharger Installation',
                'category' => 'Performance Services',
                'description' => 'Turbocharger installation to increase engine power and performance.',
                'price' => 2000.00,
            ],
            [
                'name' => 'Cold Air Intake Installation',
                'category' => 'Performance Services',
                'description' => 'Improve engine efficiency with a cold air intake installation.',
                'price' => 400.00,
            ],
            [
                'name' => 'Suspension Upgrades',
                'category' => 'Performance Services',
                'description' => 'Upgrade suspension components for improved handling and ride quality.',
                'price' => 800.00,
            ],

            // Custom Services
            [
                'name' => 'Custom Paint Jobs',
                'category' => 'Custom Services',
                'description' => 'Get a unique look for your vehicle with a custom paint job.',
                'price' => 1500.00,
            ],
            [
                'name' => 'Window Tinting',
                'category' => 'Custom Services',
                'description' => 'Professional window tinting to enhance privacy and reduce glare.',
                'price' => 250.00,
            ],
            [
                'name' => 'Audio System Installation',
                'category' => 'Custom Services',
                'description' => 'Install high-quality audio systems for superior sound quality.',
                'price' => 600.00,
            ],
            [
                'name' => 'Body Kit Installation',
                'category' => 'Custom Services',
                'description' => 'Upgrade your vehicle’s appearance and aerodynamics with a body kit.',
                'price' => 1200.00,
            ],

            // Emergency Services
            [
                'name' => 'Towing Service',
                'category' => 'Emergency Services',
                'description' => 'Reliable towing service to get you off the road and to safety.',
                'price' => 150.00,
            ],
            [
                'name' => 'Flat Tire Repair',
                'category' => 'Emergency Services',
                'description' => 'Quick and effective flat tire repair to get you back on the road.',
                'price' => 30.00,
            ],
            [
                'name' => 'Lockout Service',
                'category' => 'Emergency Services',
                'description' => 'Professional lockout service to help you regain access to your vehicle.',
                'price' => 60.00,
            ],
            [
                'name' => 'Jumpstart Service',
                'category' => 'Emergency Services',
                'description' => 'Jumpstart service to get your vehicle running again.',
                'price' => 50.00,
            ],
            [
                'name' => 'Fuel Delivery',
                'category' => 'Emergency Services',
                'description' => 'Fuel delivery service to get you back on the road when you run out of gas.',
                'price' => 40.00,
            ],
            [
                'name' => 'Air Filter Replacement',
                'category' => 'Maintenance Services',
                'description' => 'Replace the air filter to ensure optimal engine performance and fuel efficiency.',
                'price' => 30.00,
            ],
            [
                'name' => 'Wiper Blade Replacement',
                'category' => 'Maintenance Services',
                'description' => 'Replace worn-out wiper blades for clear visibility in inclement weather.',
                'price' => 25.00,
            ],
            [
                'name' => 'Fuel System Cleaning',
                'category' => 'Maintenance Services',
                'description' => 'Clean the fuel system to remove deposits and improve fuel efficiency.',
                'price' => 150.00,
            ],
            [
                'name' => 'Battery Replacement',
                'category' => 'Maintenance Services',
                'description' => 'Replace old or weak batteries to ensure reliable starting and electrical performance.',
                'price' => 120.00,
            ],

            // Repair Services
            [
                'name' => 'Brake Pad Replacement',
                'category' => 'Repair Services',
                'description' => 'Replace worn brake pads to restore braking efficiency and safety.',
                'price' => 150.00,
            ],
            [
                'name' => 'Fuel Pump Replacement',
                'category' => 'Repair Services',
                'description' => 'Replace a failing fuel pump to restore proper fuel delivery to the engine.',
                'price' => 400.00,
            ],
            [
                'name' => 'AC System Repair',
                'category' => 'Repair Services',
                'description' => 'Repair the AC system to ensure optimal cooling performance during hot weather.',
                'price' => 300.00,
            ],
            [
                'name' => 'Timing Belt Replacement',
                'category' => 'Repair Services',
                'description' => 'Replace the timing belt to prevent potential engine damage and maintain performance.',
                'price' => 700.00,
            ],

            // Diagnostic Services
            [
                'name' => 'Oxygen Sensor Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Diagnose and test the oxygen sensor to improve fuel efficiency and reduce emissions.',
                'price' => 75.00,
            ],
            [
                'name' => 'Brake System Diagnostic',
                'category' => 'Diagnostic Services',
                'description' => 'Inspect the brake system to identify issues affecting braking performance.',
                'price' => 85.00,
            ],
            [
                'name' => 'Tire Pressure Monitoring System Check',
                'category' => 'Diagnostic Services',
                'description' => 'Check and diagnose issues with the tire pressure monitoring system (TPMS).',
                'price' => 50.00,
            ],
            [
                'name' => 'Emissions Testing',
                'category' => 'Diagnostic Services',
                'description' => 'Conduct emissions testing to ensure compliance with environmental regulations.',
                'price' => 40.00,
            ],

            // Body & Interior Services
            [
                'name' => 'Scratch Repair',
                'category' => 'Body & Interior Services',
                'description' => 'Remove scratches from the vehicles paint to restore its original appearance.',
                 'price' => 100.00,
    ],
    [
        'name' => 'Leather Seat Repair',
        'category' => 'Body & Interior Services',
        'description' => 'Repair and restore damaged leather seats for improved comfort and aesthetics.',
        'price' => 200.00,
    ],
    [
        'name' => 'Upholstery Repair',
        'category' => 'Body & Interior Services',
        'description' => 'Repair torn or damaged upholstery to restore the interior of your vehicle.',
        'price' => 150.00,
    ],
    [
        'name' => 'Paintless Dent Removal',
        'category' => 'Body & Interior Services',
        'description' => 'Remove dents without affecting the paint finish for a seamless restoration.',
        'price' => 180.00,
    ],

    // Performance Services
    [
        'name' => 'Exhaust Upgrade',
        'category' => 'Performance Services',
        'description' => 'Upgrade the exhaust system to enhance performance and sound.',
        'price' => 600.00,
    ],
    [
        'name' => 'Performance Brake Upgrade',
        'category' => 'Performance Services',
        'description' => 'Install performance brake components for improved stopping power.',
        'price' => 500.00,
    ],
    [
        'name' => 'Nitrous Oxide Installation',
        'category' => 'Performance Services',
        'description' => 'Install a nitrous oxide system for increased engine power on demand.',
        'price' => 1000.00,
    ],
    [
        'name' => 'High-Performance Tire Installation',
        'category' => 'Performance Services',
        'description' => 'Install high-performance tires for improved grip and handling.',
        'price' => 800.00,
    ],

    // Custom Services
    [
        'name' => 'Graphic Decals Installation',
        'category' => 'Custom Services',
        'description' => 'Install custom graphic decals to personalize the look of your vehicle.',
        'price' => 300.00,
    ],
    [
        'name' => 'Custom Rims Installation',
        'category' => 'Custom Services',
        'description' => 'Upgrade your vehicle with custom rims for enhanced style and performance.',
        'price' => 1200.00,
    ],
    [
        'name' => 'LED Lighting Installation',
        'category' => 'Custom Services',
        'description' => 'Install LED lights to improve visibility and add a modern touch.',
        'price' => 250.00,
    ],
    [
        'name' => 'Custom Exhaust Tips Installation',
        'category' => 'Custom Services',
        'description' => 'Install custom exhaust tips for a personalized exhaust look.',
        'price' => 100.00,
    ],

    // Emergency Services
    [
        'name' => 'Roadside Assistance',
        'category' => 'Emergency Services',
        'description' => '24/7 roadside assistance for any vehicle emergency you encounter.',
        'price' => 75.00,
    ],
    [
        'name' => 'Emergency Fuel Delivery',
        'category' => 'Emergency Services',
        'description' => 'Deliver fuel directly to your location if you run out on the road.',
        'price' => 100.00,
    ],
    [
        'name' => 'Battery Testing and Replacement',
        'category' => 'Emergency Services',
        'description' => 'Test battery performance and replace it if necessary on-site.',
        'price' => 150.00,
    ],
    [
        'name' => 'Emergency Lock Replacement',
        'category' => 'Emergency Services',
        'description' => 'Replace locks if keys are lost or stolen for security purposes.',
        'price' => 200.00,
    ],
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
