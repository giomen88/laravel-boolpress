<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'Giorgia';
        $user->email = 'giorgia@boolean.it';
        $user->password = bcrypt('boolean');
        $user->save();

        for($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = $faker->username() ;
            $user->email = $faker-> email();
            $user->password = $faker->password();
            $user->save();
        }
    }
}
