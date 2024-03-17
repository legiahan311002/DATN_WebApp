<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_size')->insert([
            [
                'id_product_detail' => 1,
                'size' => 'S',
                'product_number' => '50',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 1,
                'size' => 'M',
                'product_number' => '25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 1,
                'size' => 'L',
                'product_number' => '33',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 2,
                'size' => 'S',
                'product_number' => '52',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 2,
                'size' => 'M',
                'product_number' => '27',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 2,
                'size' => 'L',
                'product_number' => '38',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 3,
                'size' => 'L',
                'product_number' => '112',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 4,
                'size' => 'S',
                'product_number' => '56',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 4,
                'size' => 'M',
                'product_number' => '45',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 5,
                'size' => 'S',
                'product_number' => '299',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 5,
                'size' => 'M',
                'product_number' => '158',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 6,
                'size' => 'S',
                'product_number' => '147',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 6,
                'size' => 'M',
                'product_number' => '25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 7,
                'size' => 'S',
                'product_number' => '147',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 7,
                'size' => 'M',
                'product_number' => '95',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 8,
                'size' => 'S',
                'product_number' => '123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 8,
                'size' => 'M',
                'product_number' => '47',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 8,
                'size' => 'L',
                'product_number' => '47',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 9,
                'size' => 'M',
                'product_number' => '147',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 10,
                'size' => '36',
                'product_number' => '147',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 10,
                'size' => '37',
                'product_number' => '74',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 10,
                'size' => '38',
                'product_number' => '49',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 10,
                'size' => '39',
                'product_number' => '77',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 11,
                'size' => '36',
                'product_number' => '23',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 11,
                'size' => '37',
                'product_number' => '79',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 11,
                'size' => '38',
                'product_number' => '28',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 12,
                'size' => '37',
                'product_number' => '159',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 12,
                'size' => '38',
                'product_number' => '48',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 13,
                'size' => '38',
                'product_number' => '43',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 14,
                'size' => '36',
                'product_number' => '147',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 14,
                'size' => '37',
                'product_number' => '74',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 14,
                'size' => '38',
                'product_number' => '49',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 14,
                'size' => '39',
                'product_number' => '77',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 15,
                'size' => '38',
                'product_number' => '68',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 15,
                'size' => '39',
                'product_number' => '28',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 15,
                'size' => '38',
                'product_number' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 15,
                'size' => '39',
                'product_number' => '46',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 16,
                'size' => '38',
                'product_number' => '127',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 17,
                'size' => '38',
                'product_number' => '152',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
