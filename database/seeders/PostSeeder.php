<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 20) as $index) {
            $name = $faker->name;
            Post::create([
                'user_id' => rand(1, 20),
                'category_id' => rand(1, 20),
                'title' => $name,
                'sub_title' => $faker->paragraph,
                'description' => $faker->paragraph,
                'image' => $faker->unique()->imageUrl(),
                'status' => $this->status()
            ]);

        }
    }

    public function status()
    {
        $data = ['active' => 'active', 'inactive' => 'inactive'];
        return array_rand($data);
    }
}
