<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'category_name'          => "Avian Products",
                'row_status'    => 1,
                "created_at"    => $now_time,
                "updated_at"    => $now_time
            ],
            [
                'category_name'          => "Ruminant Products",
                'row_status'    => 1,
                "created_at"    => $now_time,
                "updated_at"    => $now_time
            ]
        ];
        Category::insert($rows);
    }
}
