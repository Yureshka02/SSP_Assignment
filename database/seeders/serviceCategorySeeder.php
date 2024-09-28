<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class serviceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $serviceCategories = [
            'Maintenance Services' => [
                'Oil Change',
                'Fluid Checks & Top-Offs',
                'Tire Inspection & Rotation',
                'Brake Inspection',
            ],
            'Repair Services' => [
                'Engine Repair',
                'Transmission Repair',
                'Exhaust System Repair',
                'Suspension Repair',
            ],
            'Diagnostic Services' => [
                'Check Engine Light Diagnostic',
                'Electrical System Diagnostic',
                'Battery & Charging System Check',
                'Cooling System Diagnostic',
            ],
            'Body & Interior Services' => [
                'Dent Repair',
                'Interior Cleaning & Detailing',
                'Windshield Replacement',
                'Headlight Replacement',
            ],
            'Performance Services' => [
                'Performance Tuning',
                'Turbocharger Installation',
                'Cold Air Intake Installation',
                'Suspension Upgrades',
            ],
            'Custom Services' => [
                'Custom Paint Jobs',
                'Window Tinting',
                'Audio System Installation',
                'Body Kit Installation',
            ],
            'Emergency Services' => [
                'Towing Service',
                'Flat Tire Repair',
                'Lockout Service',
                'Jumpstart Service',
            ]
        ];
        foreach ($serviceCategories as $category => $items) {
            $category = \App\Models\serviceCategory::create([
                'name' => $category,
                'description' => 'Category description',
                'sort_order' => 0,
                'status' => true,
            ]);
            foreach ($items as $item) {
                \App\Models\serviceCategory::create([
                    'name' => $item,
                    'description' => 'Service description',
                    'sort_order' => 0,
                    'status' => true,
                    'parent_id' => $category->id,
                ]);
            }
        }

    }
}
