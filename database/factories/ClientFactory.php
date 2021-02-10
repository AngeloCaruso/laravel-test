<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'code' => Str::uuid(),
        'name' => "$faker->name",
        'cities_id' => City::inRandomOrder()->first()->id
    ];
});
