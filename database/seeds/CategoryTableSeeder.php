<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->truncate();
//        factory(App\Category::class, 5)->create();
        DB::table('categories')->truncate();
        Category::create(['name' => 'Новости']);
        Category::create(['name' => 'Обзоры']);
        Category::create(['name' => 'Статьи']);
        Category::create(['name' => 'Гаджеты']);
        Category::create(['name' => 'Софт']);
        Category::create(['name' => 'Игры']);
    }
}
