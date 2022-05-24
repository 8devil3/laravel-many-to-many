<?php

use Illuminate\Database\Seeder;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use App\UserInfo;
use App\User;

class UserInfoSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      $users = User::all();

      foreach ($users as $user) {
         UserInfo::create([
            'city' => $faker->state(),
            'address' => $faker->address(),
            'phone' => $faker->phoneNumber(),
            'user_id' => $user->id
         ]);
      }
   }
}
