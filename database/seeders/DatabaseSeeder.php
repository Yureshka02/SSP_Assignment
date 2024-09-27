<?php

namespace Database\Seeders;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Facilities;
use App\Models\Products;
use App\Models\Services;
use App\Models\Suppliers;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role'=> 1
        ]);
        $this->call([
            CategorySeeder::class,
//            ProductSeeder::class,
//            ServiceSeeder::class,
//            FacilitySeeder::class,
//            SupplierSeeder::class,
//            CustomerSeeder::class,
//            BookingSeeder::class,
        ]);

        User::factory(100)->create();

        Products::factory(100)->create();
        Bookings::factory(50)->create();
        Facilities::factory(50)->create();
        Suppliers::factory(50)->create();
        Customers::factory(20)->create();
    }
}
