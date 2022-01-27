<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now_time = date('Y-m-d');
        $rows = [
            [
                'category_id'          => 1,
                'sub_category_name'    => "VACCINE",
                'row_status'    => 1,
                "created_at"    => $now_time,
                "updated_at"    => $now_time
            ],
            [
                'category_id'          => 1,
                'sub_category_name'    => "PHARMA",
                'row_status'    => 1,
                "created_at"    => $now_time,
                "updated_at"    => $now_time
            ]
        ];
        SubCategory::insert($rows);
    }
}
