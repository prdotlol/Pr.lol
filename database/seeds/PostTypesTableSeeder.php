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
            'slug' => 'general',
            'des' => 'Anything goes',
            'color' => '#757575'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Inspiration',
            'slug' => 'inspiration',
            'des' => 'Share some inspiration',
            'color' => '#1085D0'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Design',
            'slug' => 'design',
            'des' => 'Share design',
            'color' => '#FF101D'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Code',
            'slug' => 'code',
            'des' => 'Share code',
            'color' => '#00D636'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Product',
            'slug' => 'product',
            'des' => 'Share useable products',
            'color' => '#33428B'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Question',
            'slug' => 'question',
            'des' => 'Start a discussion with the community',
            'color' => '#E133D3'
        ]);

        DB::table('post_types')->insert([
            'name' => 'Resource',
            'slug' => 'resource',
            'des' => 'Useful resources for the community',
            'color' => '#14C3DC'
        ]);
    }
}
