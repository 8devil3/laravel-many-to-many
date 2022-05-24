<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FakerGenerator $faker)
    {
      $faker = FakerFactory::create('it_IT');

      for ($i=0; $i<15; $i++) {

         $name = $faker->firstName();
         User::create([
            'name' => $name,
            'email' => strtolower($name) . '@' . $faker->domainName(),
            'password' => Hash::make('qwerty')
         ]);
      }
    }
}
