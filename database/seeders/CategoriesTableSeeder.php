<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = now();

        $categories = [
            ['active' => 1, 'category_name' => 'GENERAL', 'category_description' => 'test', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['active' => 1, 'category_name' => 'POSTMAN',  'category_description' => 'test 2', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['active' => 1, 'category_name' => 'SQL', 'category_description' => 'test', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['active' => 1, 'category_name' => 'GIT', 'category_description' => null, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['active' => 1, 'category_name' => 'DEV TOOLS', 'category_description' => 'test 3', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['active' => 1, 'category_name' => 'HTTP', 'category_description' => null, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ];

        DB::table('categories')->insert($categories);
    }
}
