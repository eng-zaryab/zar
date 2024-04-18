<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecord = [
            [
                'id' => 2,
                'name' => 'Hamid',
                'type' => 'vendor',
                'vendor_id' => 1,
                'mobile' => 2064966331,
                'email' => 'vendors@gmail.com',
                'password' => '$2y$12$W4SLmbTpcc3rFdglBThS2u52Qiq92Lod.IDY9ObAOgbK2VcB7WMrO',
                'image' => '',
                'status' => 0
            ],
        ];
        Admin::insert($adminRecord);
    }
}
