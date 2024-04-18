<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorBusinessDetails = [
            [
                'id' => 1,
                'vendor_id' =>1,
                'res_name' => 'Kabul Mart',
                'res_address' => '25611 27th PL S, F304',
                'res_city' => 'Kent',
                'res_state' => 'WA',
                'res_zip' => '98032',
                'res_country' => 'USA',
                'res_mobile' => '425887799',
                'res_email' => 'vendors@gmail.com',
                'res_website' => 'https://farimand.com',
                'res_facebook' => 'https://facebook.com',
                'res_whatsapp' => '2064966331',
                'res_address_proof' => 'Passport',
                'address_proof_image' => 'test.jpg',
                'business_licence_number' => '227711',
            ]
        ];
        VendorsBusinessDetail::insert($vendorBusinessDetails);
    }
}
