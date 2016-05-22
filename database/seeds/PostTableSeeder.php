<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 50)->create();
        /*DB::table('posts')->insert([
            'title' => str_random(10),
            'content' => str_random(10).'@gmail.com',
            'category_id' => 22,
            'image' => 'published',
            'link' => 'The Name',
        ]);*/
    }
}
