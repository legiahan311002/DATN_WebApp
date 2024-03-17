<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_detail')->insert([
            [
                'id_product' => 1,
                'name_product_detail' => 'Đen',
                'price' => '199000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 1,
                'name_product_detail' => 'Trắng',
                'price' => '189000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 1,
                'name_product_detail' => 'Xanh',
                'price' => '189000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 2,
                'name_product_detail' => 'Đen',
                'price' => '289000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 2,
                'name_product_detail' => 'Be',
                'price' => '299000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 3,
                'name_product_detail' => 'Áo khoác gió bomber nam cao cấp',
                'price' => '259000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 4,
                'name_product_detail' => 'Đen',
                'price' => '315000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 4,
                'name_product_detail' => 'Xám',
                'price' => '315000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 5,
                'name_product_detail' => 'Áo Thun T-Shirt Nam túi ngực',
                'price' => '109000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 6,
                'name_product_detail' => 'Đen',
                'price' => '145000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 6,
                'name_product_detail' => 'Nâu',
                'price' => '145000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 7,
                'name_product_detail' => 'Giày Bốt Cao Cổ Da Mềm Cao gót',
                'price' => '149000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 8,
                'name_product_detail' => 'Đen',
                'price' => '199000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 8,
                'name_product_detail' => 'Trắng',
                'price' => '199000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 8,
                'name_product_detail' => 'Caro',
                'price' => '199000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 9,
                'name_product_detail' => 'Giày Thể Thao Nữ MOCNHO đế cao 4cm retro basic',
                'price' => '159000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product' => 10,
                'name_product_detail' => 'Giày Thể Thao Nữ HIHI Màu Trắng Đế Bằng nâu',
                'price' => '159000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
