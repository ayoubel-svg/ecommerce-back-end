<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Add_Product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "name" => "Nike Dunk Low",
                "quantity" => 10,
                "description" => "Created for the hardwood but taken to the streets, the '80s b-ball icon returns with perfectly shined overlays and classic team colors. With its iconic hoops design, the Nike Dunk Low channels '80s vintage back onto the streets while its padded, low-cut collar lets you take your game anywhere—in comfort.",
                "price" => 199.99,
                "category_id" => 1
            ],
            [
                "name" => "Nike Air Force 1 '07",
                "quantity" => 5,
                "description" => "Familiar but always fresh, the iconic Air Jordan 1 is remastered for today's sneakerhead culture. This Retro High OG version goes all in with premium leather, comfortable cushioning and classic design details.",
                "price" => 110,
                "category_id" => 1
            ],
            [
                "name" => "Nike Sportswear",
                "quantity" => 20,
                "description" => "This classic cotton tee with our heritage Nike script logo gives you soft comfort for casual, everyday wear. A slight puff to the Swoosh print adds a dose of texture and nostalgia.",
                "price" => 30,
                "category_id" => 2
            ],
            [
                "name" => "Nike Sportswear",
                "quantity" => 30,
                "description" => "The Nike Sportswear T-Shirt sets you up with soft cotton jersey and a classic logo on the chest.",
                "price" => 30,
                "category_id" => 2
            ],
            [
                "name" => "Nike Sportswear Tech Fleece",
                "quantity" => 50,
                "description" => "Ready for cooler weather, the Nike Sportswear Tech Fleece Joggers feature an updated fit perfect for everyday wear. Roomy through the thigh, this tapered design narrows at the knee to give you a comfortable feel without losing the clean, tailored look you love. Tall ribbed cuffs complete the jogger look while a zippered pocket on the right leg provides secure small-item storage and elevate the look.",
                "price" => 110,
                "category_id" => 3
            ],
            [
                "name" => "Nike Club Fleece",
                "quantity" => 8,
                "description" => "Say hello to one of our favorites, Club Fleece—an essential for running, jumping and laughing your way through the year. Smooth on the outside, brushed soft on the inside, this lightweight fleece is an easy layer when you want a little extra warmth.A classic look that's easy to pull on means fun times coming your way, fast!",
                "price" => 50,
                "category_id" => 3
            ],
        ];
        foreach ($products as $product => $val) {
            Product::create($val);
        }
    }
}
