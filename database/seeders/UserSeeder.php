<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('fa_IR');
        DB::transaction(function () use ($faker) {
            for ($i = 0; $i < 100; $i++) {
                do {
                    $userName = $faker->userName;
                } while (User::query()->where('username', $userName)->exists());
                DB::table('users')
                    ->insert([
                        'id' => Str::uuid(),
                        'name' => $faker->name,
                        'username' => $userName,
                        'password' => Hash::make('12345678'),
                        'ts_register' => time() + rand(-86400, 86400),
                        'is_active' => rand(0, 1),
                    ]);
            }
            /** @var User $user */
            $user = User::query()->first();
            $user->id = '00000000-0000-0000-0000-000000000000';
            $user->name = 'Administrator';
            $user->username = 'admin';
            $user->is_active = 1;
            $user->save();
        });
    }
}
