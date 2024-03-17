<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('voucher')->insert([
            [
                'code' => 'SEASIDE2024123',
                'id_shop' => 1,
                'discountPercentage' => null,
                'discountAmount' => 20000,
                'validFrom' => '2023/12/11 00:00:00',
                'validTo' => '2024/1/11 00:00:00',
                'usageLimit' => '15',
                'platformVoucher' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => 'SEASIDE2024',
                'id_shop' => 1,
                'discountPercentage' => null,
                'discountAmount' => 20000,
                'validFrom' => '2023/12/18 00:00:00',
                'validTo' => '2024/1/18 00:00:00',
                'usageLimit' => '10',
                'platformVoucher' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => 'SEASIDE1212',
                'id_shop' => 1,
                'discountPercentage' => null,
                'discountAmount' => 15000,
                'validFrom' => '2023/12/10 00:00:00',
                'validTo' => '2023/12/13 00:00:00',
                'usageLimit' => '10',
                'platformVoucher' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => 'SEASIDE2512',
                'id_shop' => 1,
                'discountPercentage' => null,
                'discountAmount' => 10000,
                'validFrom' => '2023/12/24 00:00:00',
                'validTo' => '2023/12/26 00:00:00',
                'usageLimit' => '10',
                'platformVoucher' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => 'UMI123',
                'id_shop' => 2,
                'discountPercentage' => null,
                'discountAmount' => 15000,
                'validFrom' => '2023/12/18 00:00:00',
                'validTo' => '2024/1/18 00:00:00',
                'usageLimit' => '15',
                'platformVoucher' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => 'SS112024',
                'id_shop' => null,
                'discountPercentage' => null,
                'discountAmount' => 20000,
                'validFrom' => '2023/12/15 00:00:00',
                'validTo' => '2024/1/5 00:00:00',
                'usageLimit' => '20',
                'platformVoucher' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
