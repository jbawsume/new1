<?php

use Illuminate\Database\Seeder;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Factory(App\Book::class, 6)->create([
          'category_id' => 2,
      ]);
      Factory(App\Book::class, 6)->create([
        'category_id' => 3,
        'image'=>'https://images-na.ssl-images-amazon.com/images/I/51Kdp-z4qaL._SX374_BO1,204,203,200_.jpg'
    ]);
    Factory(App\Book::class, 6)->create([
      'category_id' => 1,
      'image'=>'https://images-na.ssl-images-amazon.com/images/I/71MTgEEjNVL._AC_UL160_.jpg'
  ]);

    }
}
