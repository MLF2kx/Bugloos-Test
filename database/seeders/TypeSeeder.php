<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            DB::table('types')
                ->insert([
                    'title' => 'TEXT',
                    'description' => 'داده‌های رشته‌ای',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'INTEGER',
                    'description' => 'داده‌های عددی',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'DOUBLE',
                    'description' => 'داده‌های اعشاری',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'DATETIME',
                    'description' => 'داده‌های تاریخی',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'DROPDOWN',
                    'description' => 'لیست بازشونده',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'RADIOBUTTON',
                    'description' => 'دکمه رادیویی',
                ]);
            DB::table('types')
                ->insert([
                    'title' => 'CHECKBOX',
                    'description' => 'جعبه انتخاب',
                ]);
        });
    }
}
