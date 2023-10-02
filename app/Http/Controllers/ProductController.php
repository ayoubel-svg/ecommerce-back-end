<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductRessource;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return ProductRessource::collection($products);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "required",
            "name" => "required",
            "quantity" => "required",
            "category" => "required",
            "price" => "required",
            "description" => "required"
        ]);
        $categories = Category::all();
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        foreach ($categories as $category) {
            if ($category->name == $request->category) {
                $product->category_id = $category->id;
                break;
            }
        }
        $product->quantity = $request->quantity;
        $product->save();

        if ($request->hasFile("image")) {
            foreach ($request->file("image") as $imageFile) {
                $image_path = Str::random() . "." . $imageFile->getClientOriginalExtension();
                Storage::putFileAs("images", $imageFile, $image_path);
                $image = new Images();
                $image->product_id = $product->id;
                $image->image = $image_path;
                $image->save();
            }
        }
        return $this->success($product, "Product Added Succefuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if (!$product) {
            return $this->error("", "Product Not Found", 400);
        } else {
            return new ProductRessource($product);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        foreach ($categories as $category) {
            if ($category->name == $request->category) {
                $product->category_id = $category->id;
                break;
            }
        }
        $product->quantity = $request->quantity;
        $product->save();

        if ($request->hasFile("image") && $request->file("image") != "") {
            foreach ($request->file("image") as $imageFile) {
                $image_path = Str::random() . "." . $imageFile->getClientOriginalExtension();
                Storage::putFileAs("images", $imageFile, $image_path);
                $image = new Images();
                $image->product_id = $product->id;
                $image->image = $image_path;
                $image->save();
            }
        }
        return $this->success($product, "Product updated Succefuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->success("", "Product Deleted");
    }
}
