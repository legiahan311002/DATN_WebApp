<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop_profile')->insert([
            [
                'approved' => 1,
                'name_shop' => 'Thời trang nam Seaside',
                'username' => 'hongkhanh',
                'address' => '41 Cao Thắng, Hải Châu, Đà Nẵng',
                'cover_image' => 'https://img.danhsachcuahang.com/image/2019/05/undefined-1556899015-5ccc64c7cba28.jpg',
                'avt' => 'https://tamanh.net/wp-content/uploads/2022/08/mo-cua-hang-quan-ao-nam.jpg',
                'approved'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'approved' => 1,
                'name_shop' => 'GIÀY UMI',
                'username' => 'thaonguyet',
                'address' => '50 Lê Duẩn, Thanh Khê, Đà Nẵng',
                'cover_image' => 'https://standboothvietnam.com/wp-content/uploads/2023/09/thiet-ke-shop-giay-dep.jpg',
                'avt' => 'https://down-bs-vn.img.susercontent.com/2153b0f9c25fc516ca0ba291f8ba35f1_tn',
                'approved'=> 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
