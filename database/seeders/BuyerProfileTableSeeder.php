<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BuyerProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('buyer_profile')->insert([
            [
                'username' => 'duchoang',
                'account_name' => 'Đức Hoàng',
                'gender' => 'Nam',
                'birth_day' => '2002-08-11',
                'avt' => 'https://inkythuatso.com/uploads/thumbnails/800/2023/03/6-anh-dai-dien-trang-inkythuatso-03-15-26-36.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'haily',
                'account_name' => 'Hải Ly',
                'gender' => 'Nữ',
                'birth_day' => '2002-08-23',
                'avt' => 'https://cdn.sforum.vn/sforum/wp-content/uploads/2023/10/avatar-facebook-mac-dinh-52.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'phamdgoon',
                'account_name' => 'Phạm Dgoon',
                'gender' => 'Nam',
                'birth_day' => '2002-02-15',
                'avt' => 'https://i.9mobi.vn/cf/Images/tt/2021/3/15/hinh-anh-dai-dien-dep-dung-cho-facebook-instagram-zalo-2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung',
                'account_name' => 'Quốc Hùng',
                'gender' => 'Nam',
                'birth_day' => '2002-08-30',
                'avt' => 'https://toigingiuvedep.vn/wp-content/uploads/2021/01/avatar-cho-con-trai-cuc-chat.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'hongkhanh',
                'account_name' => 'Hồng Khánh',
                'gender' => 'Nữ',
                'birth_day' => '2002-08-11',
                'avt' => 'https://tse4.mm.bing.net/th?id=OIP.tS4o_QzG25ntuI90jWWWXQHaHa&pid=Api&P=0&h=180',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'thaonguyet',
                'account_name' => 'Thảo Nguyệt',
                'gender' => 'Nữ',
                'birth_day' => '2002-02-02',
                'avt' => 'https://taytou.com/wp-content/uploads/2022/08/Anh-Avatar-dai-dien-mac-dinh-nu-nen-hong.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
