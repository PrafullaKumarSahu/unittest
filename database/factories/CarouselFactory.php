<?php

use Faker\Generator as Faker;
use App\Carousel;

$factory->define(Carousel::class, function (Faker $faker) {
    return [
        'title' => $this->faker->word,
        'link' => $this->faker->url,
        'src' => $this->faker->url
    ];
});
