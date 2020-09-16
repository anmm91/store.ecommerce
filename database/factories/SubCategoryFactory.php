<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $categories_id=Category::parent()->pluck('id')->toArray();
    $random_ids=array_rand($categories_id);
    return [

        'name'=>$faker->word(),
        'is_active'=>$faker->boolean(),
        'slug'=>$faker->slug(),
        'parent_id'=>$categories_id[$random_ids]
    ];
});
