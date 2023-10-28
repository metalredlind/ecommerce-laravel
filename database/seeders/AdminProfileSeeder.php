<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/2434.jpg';
        $vendor->phone = '081234567890';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'Jakarta, Indonesia';
        $vendor->description = 'Shop Descriptions';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
