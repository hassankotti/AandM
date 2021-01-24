<?php

use App\Model\OrderDetails;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
        $this->call(ProductSeeder::class);
        $this->call(OrderDetailsSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(RoleSeeder::class);
    }
}