<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Member::class, function (Faker $faker) {
    return [
        'inviter_id' => rand(1, 20),
        'unionid' => str_random(30),
        'openid' => str_random(30),
        'nickname' => $faker->name,
        'subscribe' => rand(0, 2),
        'sex' => rand(0, 2),
        'credit1' => rand(0, 1000),
        'credit2' => rand(0, 1000),
        'headimgurl' => $faker->imageUrl(100, 100),
    ];
});
