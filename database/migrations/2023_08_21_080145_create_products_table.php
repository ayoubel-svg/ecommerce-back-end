<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->string("name");
            $table->integer("quantity");
            $table->float("price");
            $table->string("description", 5000);
            $table->integer("bought")->default(0);
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->default("");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
