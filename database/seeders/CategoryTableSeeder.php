<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'レディース',
            'メンズ',
            'キッズ・ベビー',
            'その他'
        ];

        for($i = 0; $i < count($names); $i++) {
            DB::table('categories')->insert([
                'name' => $names[$i]
            ]);
        }
    }
}
