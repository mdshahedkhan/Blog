<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 50) as $index) {
            $name = $faker->name;
            Category::create([
                'user_id' => rand(1, 20),
                'name' => $name,
                'slug' => strtolower(str_replace(' ', '-', $name)),
                'status' => $this->Status()
            ]);
        }
    }

    protected function Status()
    {
        $data = array('active' => 'active', 'inactive' => 'active');
        return array_rand($data);
    }
}
