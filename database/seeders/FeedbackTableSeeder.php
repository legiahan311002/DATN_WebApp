<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('feedback')->insert([
            [
                'id_order_detail' => '1', 
                'message' => 'Mình nhận được hàng rồi nhé shop, giao hàng hơi chậm, hàng rất chất lượng mẫu mã đẹp, nhãn mác đầy đủ', 
                'star' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order_detail' => '2', 
                'message' => 'Shop giao hàng nhanh, gói hàng kỹ. Size chuẩn - Mẫu đẹp - Màu đúng. Sẽ ủng hộ shop tiếp', 
                'star' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order_detail' => '3', 
                'message' => 'Giao hàng nhanh, shipper thân thiện nhưng sai màu huhu :(( mình đặt be mà giao đen.', 
                'star' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order_detail' => '4', 
                'message' => 'Giao hàng nhanh, đúng mẫu, sẽ tiếp tục ủng hộ shop.', 
                'star' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
