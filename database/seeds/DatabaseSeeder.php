<?php

use Illuminate\Database\Seeder;
use PostTypesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostTypesTableSeeder::class);
    }
}
