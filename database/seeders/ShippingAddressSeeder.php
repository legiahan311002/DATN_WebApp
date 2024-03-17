<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shipping_address')->insert([
            [
                'username' => 'quochung',
                'name' => 'Hùng',
                'phone_number' => '0123458748',
                'address' => '41 Cao Thắng, Hải Châu, Đà Nẵng',
                'default_address' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung',
                'name' => 'Hùng',
                'phone_number' => '0123458748',
                'address' => '50 Lê Duẩn, Hải Châu, Đà Nẵng',
                'default_address' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'haily',
                'name' => 'Ly',
                'phone_number' => '0125478459',
                'address' => '95 Hải Phòng, Hải Châu, Đà Nẵng',
                'default_address' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
