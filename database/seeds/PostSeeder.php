<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use App\Category;
// use Illuminate\Foundation\Auth\User;


class PostSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      for ($i=0; $i<500; $i++) {

         $title = $faker->words(rand(1, 4), true);

         Post::create([
            'title' => $title,
            'content' => $faker->paragraph(rand(2,6)),
            'date' => $faker->date(),
            'slug' => Post::genSlug($title),
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id
         ]);
      }
   }
}
