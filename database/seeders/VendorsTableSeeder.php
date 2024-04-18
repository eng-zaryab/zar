<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorsRecord = [
            [
                'id' => 1,
                'name' => 'Hamid',
                'last_name' => 'Zaryab',
                'address' => '25611 27th PL S F304',
                'city' => 'Kent',
                'state' => 'WA',
                'zip_code' => '98032',
                'country' => 'USA',
                'mobile' => '425887799',
                'email' => 'vendors@gmail.com',
                'whatsapp' => '2064966331',
                'facebook_page' => 'https://facebook.com',
                'status' => 0,
            ]
        ];

        Vendor::insert($vendorsRecord);
    }
}
