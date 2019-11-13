<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
      'title'=> $faker->text(50),
      'author'=> $faker->text(50),
      'image'=> 'https://images-na.ssl-images-amazon.com/images/I/51vCIGf3n2L._SX327_BO1,204,203,200_.jpg',
      'description'=>$faker->text(200),
      'link'=>$faker->text(50) ,
      'category_id'=> 3,
    ];
});
