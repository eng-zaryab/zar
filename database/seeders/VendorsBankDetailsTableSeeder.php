<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorsBankDetails = [
            [
                'id' => 1,
                'vendor_id' => 1,
                'account_holder_name' => 'Hamidullah',
                'bank_name' => 'Chase Bank',
                'account_number' => '123456789',
                'cvv_code' => '1234',
            ]
        ];
        VendorsBankDetails::insert($vendorsBankDetails);
    }
}
