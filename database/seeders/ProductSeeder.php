<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Property;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            /** @var Category $randomCategory */
            /** @var Property $property */
            $faker = Factory::create('fa_IR');
            for ($i = 0; $i < 100; $i++) {
                $randomCategory = Category::query()->select('id')->inRandomOrder()->first();
                $propertyIds = $randomCategory->getRecursivePropertyIDs();
                DB::table('products')
                    ->insertGetId([
                        'category_id' => $randomCategory->id,
                        'title' => $faker->company,
                        'description' => $faker->realText,
                        'price' => rand(1, 1000) * 1000,
                        'quantity' => rand(0, 1000),
                    ]);
            }
        });
    }
}
