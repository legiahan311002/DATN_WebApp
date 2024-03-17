<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('order_detail')->insert([
            [
                'id_order' => '1',
                'id_product_detail' => '7', 
                'quantity' => '1',
                'size' => 'M',
                'price' => '315000.00',
                'status' => 'Đã nhận hàng',
                'voucher_code' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => '2', 
                'id_product_detail' => '6', 
                'quantity' => '1',
                'size' => 'M',
                'price' => '259000.00',
                'status' => 'Đã nhận hàng',
                'voucher_code' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => '3', 
                'id_product_detail' => '5', 
                'quantity' => '1',
                'size' => 'S',
                'price' => '299000.00',
                'status' => 'Đã nhận hàng',
                'voucher_code' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => '4', 
                'id_product_detail' => '4', 
                'quantity' => '1',
                'size' => 'M',
                'price' => '289000.00',
                'status' => 'Đã nhận hàng',
                'voucher_code' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
