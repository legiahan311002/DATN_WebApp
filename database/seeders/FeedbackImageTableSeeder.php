<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FeedbackImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('feedback_image')->insert([
            [
                'id_feedback' => '1',
                'url_image' => 'https://product.hstatic.net/200000690725/product/53270166792_50ec588b05_k_85dd51d769a6422b8228c48d3ad037b3_master.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_feedback' => '2',
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lortwohbgfv481',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_feedback' => '3',
                'url_image' => 'https://down-bs-vn.img.susercontent.com/vn-11134103-7qukw-lg0v5omdcmei22.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_feedback' => '4',
                'url_image' => 'https://down-bs-vn.img.susercontent.com/vn-11134103-7qukw-lfvcspjtl46i2d.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
