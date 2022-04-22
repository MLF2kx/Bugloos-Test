<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            /** @var Category $category */
            /** @var Type $randomType */
            $faker = Factory::create('fa_IR');
            foreach (Category::all() as $category) {
                for ($i = 0; $i < 5; $i++) {
                    $randomType = Type::query()->select('id')->inRandomOrder()->first();
                    DB::table('properties')
                        ->insert([
                            'category_id' => $category->id,
                            'type_id' => $randomType->id,
                            'title' => $faker->company,
                            'description' => $faker->realText,
                            'weight' => rand(0, 10),
                            'is_required' => rand(0, 1),
                            'is_expandable' => rand(0, 1),
                            'is_filter' => rand(0, 1),
                            'is_sortable' => rand(0, 1),
                        ]);
                }
            }
        });
    }
}
