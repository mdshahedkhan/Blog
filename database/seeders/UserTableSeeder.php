<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defaultUser();
        $faker = Factory::create();
        foreach (range(1, 20) as $index) {
            $name = $faker->name;
            User::create([
                'name' => $name,
                'email' => $faker->unique()->email,
                'password' => bcrypt($faker->password),
                'image' => $faker->unique()->imageUrl()
            ]);

        }
    }

    public function defaultUser()
    {
        $faker = Factory::create();
        User::create([
            'name' => 'Shahed Khan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'image' => $faker->imageUrl()
        ]);
    }
}
