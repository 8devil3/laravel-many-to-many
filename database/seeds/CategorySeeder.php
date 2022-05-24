<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $categories = [
         [
            'name' => 'Sport',
            'description' => 'This category is about sport.'
         ],
         [
            'name' => 'Politic',
            'description' => 'This category is about politic.'
         ],
         [
            'name' => 'Movies',
            'description' => 'This category is about movies.'
         ],
         [
            'name' => 'Education',
            'description' => 'This category is about education.'
         ],
         [
            'name' => 'Economy',
            'description' => 'This category is about economy.'
         ]
      ];

      foreach ($categories as $category) {
         Category::create([
            'name' => $category['name'],
            'description' => $category['description']
         ]);
      }
   }
}
