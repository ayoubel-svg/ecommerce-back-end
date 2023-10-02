<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class Add_Images extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pants1 = public_path('pants1.png');
        $extension1 = pathinfo($pants1, PATHINFO_EXTENSION);
        $pants1_1 = public_path('pants1-1.png');
        $extension2 = pathinfo($pants1_1, PATHINFO_EXTENSION);
        $pants1_2 = public_path('pants1-2.png');
        $extension3 = pathinfo($pants1_2, PATHINFO_EXTENSION);
        $pants1_3 = public_path('pants1-3.png');
        $extension4 = pathinfo($pants1_3, PATHINFO_EXTENSION);
        $pants2 = public_path('pants2.png');
        $extension5 = pathinfo($pants2, PATHINFO_EXTENSION);
        $pants2_1 = public_path('pants2-1.png');
        $extension6 = pathinfo($pants2_1, PATHINFO_EXTENSION);
        $pants2_2 = public_path('pants2-2.png');
        $extension7 = pathinfo($pants2_2, PATHINFO_EXTENSION);
        $pants2_3 = public_path('pants2-3.png');
        $extension8 = pathinfo($pants2_3, PATHINFO_EXTENSION);
        $tshirt1 = public_path('tshirt1.png');
        $extension9 = pathinfo($tshirt1, PATHINFO_EXTENSION);
        $tshirt1_1 = public_path('tshirt1-1.png');
        $extension10 = pathinfo($tshirt1_1, PATHINFO_EXTENSION);
        $tshirt1_2 = public_path('tshirt1-2.png');
        $extension11 = pathinfo($tshirt1_2, PATHINFO_EXTENSION);
        $tshirt2 = public_path('tshirt2.png');
        $extension12 = pathinfo($tshirt2, PATHINFO_EXTENSION);
        $tshirt2_1 = public_path('tshirt2-1.png');
        $extension13 = pathinfo($tshirt2_1, PATHINFO_EXTENSION);
        $tshirt2_2 = public_path('tshirt2-2.png');
        $extension14 = pathinfo($tshirt2_2, PATHINFO_EXTENSION);
        $shoes1 = public_path('shoes1.png');
        $extension15 = pathinfo($shoes1, PATHINFO_EXTENSION);
        $shoes1_1 = public_path('shoes1-1.png');
        $extension16 = pathinfo($shoes1_1, PATHINFO_EXTENSION);
        $shoes1_2 = public_path('shoes1-2.png');
        $extension17 = pathinfo($shoes1_2, PATHINFO_EXTENSION);
        $shoes1_3 = public_path('shoes1-3.png');
        $extension18 = pathinfo($shoes1_3, PATHINFO_EXTENSION);
        $shoes2 = public_path('shoes2.png');
        $extension19 = pathinfo($shoes2, PATHINFO_EXTENSION);
        $shoes2_1 = public_path('shoes2-1.png');
        $extension20 = pathinfo($shoes2_1, PATHINFO_EXTENSION);
        $shoes2_2 = public_path('shoes2-2.png');
        $extension21 = pathinfo($shoes2_2, PATHINFO_EXTENSION);
        $shoes2_3 = public_path('shoes2-3.png');
        $extension22 = pathinfo($shoes2_3, PATHINFO_EXTENSION);

        $Images = [
            [
                "image" => Storage::putFileAs("images", $pants1, Str::random() . "." . $extension1),
                "product_id" => 5
            ],
            [
                "image" => Storage::putFileAs("images", $pants1_1, Str::random() . "." . $extension2),
                "product_id" => 5
            ],
            [
                "image" => Storage::putFileAs("images", $pants1_2, Str::random() . "." . $extension3),
                "product_id" => 5
            ],
            [
                "image" => Storage::putFileAs("images", $pants1_3, Str::random() . "." . $extension4),
                "product_id" => 5
            ],
            [
                "image" => Storage::putFileAs("images", $pants2, Str::random() . "." . $extension5),
                "product_id" => 6
            ],
            [
                "image" => Storage::putFileAs("images", $pants2_1, Str::random() . "." . $extension6),
                "product_id" => 6
            ],
            [
                "image" => Storage::putFileAs("images", $pants2_2, Str::random() . "." . $extension7),
                "product_id" => 6
            ],
            [
                "image" => Storage::putFileAs("images", $pants2_3, Str::random() . "." . $extension8),
                "product_id" => 6
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt1, Str::random() . "." . $extension9),
                "product_id" => 3
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt1_1, Str::random() . "." . $extension10),
                "product_id" => 3
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt1_2, Str::random() . "." . $extension11),
                "product_id" => 3
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt2, Str::random() . "." . $extension12),
                "product_id" => 4
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt2_1, Str::random() . "." . $extension13),
                "product_id" => 4
            ],
            [
                "image" => Storage::putFileAs("images", $tshirt2_2, Str::random() . "." . $extension14),
                "product_id" => 4
            ],
            [
                "image" => Storage::putFileAs("images", $shoes1, Str::random() . "." . $extension15),
                "product_id" => 1
            ],
            [
                "image" => Storage::putFileAs("images", $shoes1_1, Str::random() . "." . $extension16),
                "product_id" => 1
            ],
            [
                "image" => Storage::putFileAs("images", $shoes1_2, Str::random() . "." . $extension17),
                "product_id" => 1
            ],
            [
                "image" => Storage::putFileAs("images", $shoes1_3, Str::random() . "." . $extension18),
                "product_id" => 1
            ],
            [
                "image" => Storage::putFileAs("images", $shoes2, Str::random() . "." . $extension19),
                "product_id" => 2
            ],
            [
                "image" => Storage::putFileAs("images", $shoes2_1, Str::random() . "." . $extension20),
                "product_id" => 2
            ],
            [
                "image" => Storage::putFileAs("images", $shoes2_2, Str::random() . "." . $extension21),
                "product_id" => 2
            ],
            [
                "image" => Storage::putFileAs("images", $shoes2_3, Str::random() . "." . $extension22),
                "product_id" => 2
            ],

        ];
        foreach ($Images as $image => $val) {
            Images::create($val);
        }
    }
}
