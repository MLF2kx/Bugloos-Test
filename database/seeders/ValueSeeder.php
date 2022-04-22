<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Product;
use App\Models\Property;
use App\Models\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            /** @var Option $randomOption */
            /** @var Product $product */
            /** @var Property $propery */
            $faker = Factory::create('fa_IR');
            $optionedTypeIDs = Type::query()
                ->select('id')
                ->whereIn('title', ['DROPDOWN', 'RADIOBUTTON', 'CHECKBOX'])
                ->get()->pluck('id')->toArray();
            foreach (Product::all() as $product) {
                foreach (Property::query()->whereIn('id', $product->modelCategory->getRecursivePropertyIDs())->get() as $propery) {
                    if (in_array($propery->type_id, $optionedTypeIDs)) {
                        $randomOption = Option::query()->where('property_id', $propery->id)->inRandomOrder()->first();
                        DB::table('values')
                            ->insert([
                                'product_id' => $product->id,
                                'property_id' => $propery->id,
                                'option_id' => $randomOption->id,
                            ]);
                    } else {
                        DB::table('values')
                            ->insert([
                                'product_id' => $product->id,
                                'property_id' => $propery->id,
                                'value' => $faker->realText,
                            ]);
                    }
                }
            }
        });
    }
}
