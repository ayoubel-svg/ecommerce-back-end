<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Add_Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Shoes",
                "color" => "#06d6a0"
            ],
            [
                "name" => "T-shirts",
                "color" => "#ef476f"
            ],
            [
                "name" => "Pants",
                "color" => "#118ab2"
            ]
        ];
        foreach ($categories as $Category => $val) {
            Category::create($val);
        }
    }
}
