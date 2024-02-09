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
            ['category_name' => 'GENERAL', 'category_description' => 'test', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['category_name' => 'POSTMAN', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['category_name' => 'SQL', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['category_name' => 'GIT', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['category_name' => 'DEV TOOLS', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['category_name' => 'HTTP', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ];

        DB::table('categories')->insert($categories);
    }
}
