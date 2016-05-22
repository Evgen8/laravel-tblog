<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create Models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text(),
        'category_id' => $faker->randomDigit,
        'image' => str_random(10),
        'link' => $faker->text(),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(20),
    ];
});
