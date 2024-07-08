<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr_ladies = [
            'トップス',
            'ジャケット/アウター',
            'パンツ'
        ];
        $arr_mens = [
            'トップス',
            'ジャケット/アウター',
            '靴'
        ];
        $arr_baby_kids = [
            'ベビー服(男の子用)',
            'ベビー服(女の子用)',
            'キッズ服(男の子用)',
            'キッズ服(女の子用)'
        ];
        $arr_others = [
            'その他'
        ];

        // レディースのサブカテゴリー追加
        for($i = 0; $i < count($arr_ladies); $i++) {
            DB::table('sub_categories')->insert([
                'name' => $arr_ladies[$i],
                'category_id' => 1
            ]);
        }
        // メンズのサブカテゴリー追加
        for($i = 0; $i < count($arr_mens); $i++) {
            DB::table('sub_categories')->insert([
                'name' => $arr_mens[$i],
                'category_id' => 2
            ]);
        }
        // ベビー・キッズのサブカテゴリー追加
        for($i = 0; $i < count($arr_baby_kids); $i++) {
            DB::table('sub_categories')->insert([
                'name' => $arr_baby_kids[$i],
                'category_id' => 3
            ]);
        }
        // その他のサブカテゴリー追加
        for($i = 0; $i < count($arr_others); $i++) {
            DB::table('sub_categories')->insert([
                'name' => $arr_others[$i],
                'category_id' => 4
            ]);
        }
    }
}
