<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('user')->insert([
            [
                'username' => 'duchoang',              
                'email' => 'duchoang02@gmail.com', 
                'phone_number' => '0123456789',                 
                'password' => bcrypt('ABC12345'), 
                'createStore' => null,
                'email_verified' => 1,            
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'haily', 
                'email' => 'haily02@gmail.com', 
                'phone_number' => '0223456789', 
                'password' => bcrypt('ABC12345'), 
                'createStore' => null,               
                'email_verified' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'phamdgoon',               
                'email' => 'phamdgoon02@gmail.com', 
                'phone_number' => '0323456789',            
                'password' => bcrypt('ABC12345'),
                'createStore' => null,                
                'email_verified' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'quochung', 
                'email' => 'quochung02@gmail.com', 
                'phone_number' => '0423456789',
                'password' => bcrypt('ABC12345'),
                'createStore' => null,                
                'email_verified' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'hongkhanh', 
                'email' => 'hongkhanh02@gmail.com', 
                'phone_number' => '0523456789', 
                'password' => bcrypt('ABC12345'),
                'createStore' => 1,                
                'email_verified' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'thaonguyet', 
                'email' => 'thaonguyet02@gmail.com', 
                'phone_number' => '0123456789', 
                'password' => bcrypt('ABC12345'),
                'createStore' => 1,                
                'email_verified' => 1,             
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
