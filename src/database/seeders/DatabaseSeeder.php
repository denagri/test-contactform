<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ContactTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
