<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_image')->insert([
            [
                'id_product_detail' => 1,
                'url_image' => 'https://salt.tikicdn.com/cache/550x550/ts/product/f4/8a/ed/d8499bbd3777b84d5df3a21be5236bab.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 2,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-livbppujwcsy48',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 3,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-livbpptq7emq09',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 4,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lichn4tcchjma8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 5,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-lichn4tcnq362b',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 6,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lortwohbgfv481',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 7,
                'url_image' => 'https://down-vn.img.susercontent.com/file/2b566d7950fb92d4319af7e63b011b46',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 8,
                'url_image' => 'https://down-vn.img.susercontent.com/file/5318439e4b4ad54715bf23b00917a7f9',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 9,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7qukw-livf272dnbws97',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 10,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lo58u561ja8bc6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 11,
                'url_image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-23010-aljgce3y1wlva7',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 12,
                'url_image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-22110-jtnk2wje6pjv80',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 13,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-23030-n8670wuvrzov83',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 14,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lnjtei56u2kae5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 15,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-llndc6o55rv3eb',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 16,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lnwyqt8v9xtmc8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_product_detail' => 17,
                'url_image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lmihdfb50vz3ec',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
