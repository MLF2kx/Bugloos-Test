<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            /** @var Property $property */
            $faker = Factory::create('fa_IR');
            $optionedTypeIDs = Type::query()
                ->select('id')
                ->whereIn('title', ['DROPDOWN', 'RADIOBUTTON', 'CHECKBOX'])
                ->get()->pluck('id')->toArray();
            foreach (Property::query()->select('id')->whereIn('type_id', $optionedTypeIDs)->get() as $property) {
                for ($i = 0; $i < 5; $i++) {
                    DB::table('options')
                        ->insert([
                            'property_id' => $property->id,
                            'value' => $faker->name,
                            'is_new' => rand(0, 1),
                        ]);
                }
            }
        });
    }
}
