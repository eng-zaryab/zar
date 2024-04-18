<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this -> call(AdminsTableSeeder::class);
        //$this -> call(VendorsTableSeeder::class);
        //$this -> call(VendorsBusinessDetailsTableSeeder::class);
        $this -> call (VendorsBankDetailsTableSeeder::class);
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
    }
}
