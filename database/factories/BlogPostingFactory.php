<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\BlogPosting;
use Faker\Generator as Faker;

$factory->define(BlogPosting::class, function (Faker $faker) {
    return [
        'headline' => $faker->title,
        'articlebody' => $faker->paragraph,
    ];
});
