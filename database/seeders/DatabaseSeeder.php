<?php

namespace Database\Seeders;

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
        $this->call([
            CreateUsersDefaults::class,
            CreateChannels::class,
            CreateClientsDefaults::class,
            CreateStatusOrdersDefaults::class,
            CreateProductsCategoriesDefaults::class,
            CreateOrdersRequestsDefaults::class
        ]);
    }
}
