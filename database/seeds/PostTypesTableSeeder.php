<?php

use Illuminate\Database\Seeder;

class PostTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert([
            'name' => 'General',
            'slug' => 'general'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Inspiration',
            'slug' => 'inspiration',
            'des' => 'Share some inspiration.'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Design',
            'slug' => 'design',
            'des' => 'Share design.'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Code',
            'slug' => 'code',
            'des' => 'Share code.'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Product',
            'slug' => 'product',
            'des' => 'Share product.'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Question',
            'slug' => 'question',
            'des' => 'Start a discussion with the community.'
        ]);
    }
}
