<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('order')->insert([
            [
                'username' => 'haily',
                'id_shipping_address' => '3',
                'payment_methods' => 'Thanh toán qua ví VNPay',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung',
                'id_shipping_address' => '2',
                'payment_methods' => 'Thanh toán khi nhận hàng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'haily',
                'id_shipping_address' => '3',
                'payment_methods' => 'Thanh toán khi nhận hàng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung',
                'id_shipping_address' => '1',
                'payment_methods' => 'Thanh toán qua PayPal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung',
                'id_shipping_address' => '1',
                'payment_methods' => 'Thanh toán khi nhận hàng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ]);
    }
}
