<?php

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
        $this->call(OffersTableSeederFactory::class);
        $this->call(ArticlesTableSeederFactory::class);
    }
}
