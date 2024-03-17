<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_child')->insert([
            [
                'name_category_child' => 'Áo khoác',
                'id_category' => 1,
                'id_shop' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Áo polo',
                'id_category' => 1,
                'id_shop' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Áo thun',
                'id_category' => 1,
                'id_shop' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Quần short',
                'id_category' => 1,
                'id_shop' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Boots',
                'id_category' => 5,
                'id_shop' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Sneaker',
                'id_category' => 5,
                'id_shop' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_category_child' => 'Sandal',
                'id_category' => 5,
                'id_shop' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
