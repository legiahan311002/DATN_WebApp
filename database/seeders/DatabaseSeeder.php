<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserTableSeeder::class,
            PermissionTableSeeder::class,            
            UserPermissionTableSeeder::class,
            BuyerProfileTableSeeder::class,
            ShopProfileSeeder::class,
            CategorySeeder::class,
            CategoryChildSeeder::class,
            ProductSeeder::class,
            ProductDetailSeeder::class,
            ProductSizeSeeder::class,
            ProductImageSeeder::class,
            ShippingAddressSeeder::class,
            OrderTableSeeder::class,
            CartTableSeeder::class,
            VoucherTableSeeder::class,
            OrderDetailTableSeeder::class,
            VoucherOrderTableSeeder::class,
            FeedbackTableSeeder::class,
            FeedbackImageTableSeeder::class
            
        ]);
    }
}
